<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_m');
    }

    public function index()
    {
        check_login();
        // rules validation
        $this->form_validation->set_rules(
            'email',
            'email',
            'required|trim|valid_email',
            [
                'required' => 'Email harus diisi !',
                'valid_email' => 'Email tidak valid !'
            ]
        );
        $this->form_validation->set_rules(
            'password',
            'password',
            'required|trim',
            [
                'required' => 'Password harus diisi !'
            ]
        );
        $post = $this->input->post(null, True);
        if (isset($post['login'])) {
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('eror', "Periksa kembali username dan password anda !");
                $data['title'] = 'Login &mdash; Lazisnu Kesamben';
                $this->template_auth->load('template_auth', 'auth/login', $data);
            } else {
                // cek email dan password
                $this->_login();
            }
        } else {
            $data['title'] = 'Login &mdash; Lazisnu Kesamben';
            $this->template_auth->load('template_auth', 'auth/login', $data);
        }
    }

    private function _login()
    {
        // post

        if (isset($_POST['login'])) {
            $post = [
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
            ];
            $query = $this->user_m->login($post);
            if ($query->num_rows() > 0) {
                $row = $query->row();
                // cek aktifasi user
                if ($row->status_id == 0) {
                    $this->session->set_flashdata('eror', 'Akun belum melakukan aktifasi pada akun anda! \n Silahkan melaukan aktifasi dengan tautan yang sudah kami kirim ke email anda! ');
                    redirect('auth');
                } else {
                    $params = array(
                        'user_id' => $row->user_id,
                        'role_id' => $row->role_id
                    );
                    $this->session->set_userdata($params);
                    redirect('dashboard');
                }
            } else {
                $this->session->set_flashdata('eror', "Periksa kembali username dan password anda !");
                redirect('auth');
            }
        } else {
            $data['title'] = 'Login &mdash; Lazisnu Kesamben';
            $this->template_auth->load('template_auth', 'auth/login', $data);
        }
    }

    public function register()
    {
        // rules user registration
        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Nama Lengkap harus diisi !'
        ]);
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email sudah digunakan !',
            'required' => 'Email harus diisi !',
            'valid_email' => 'Email tidak valid !'
        ]);
        $this->form_validation->set_rules(
            'password',
            'password',
            'required|trim|min_length[5]|matches[password2]',
            [
                'min_length' => 'Password terlalu pendek',
                'matches' => 'Password tidak sama !'
            ]
        );
        $this->form_validation->set_rules('password2', 'password2', 'required|trim|matches[password]');
        // proses
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('eror', 'Ada kesalahan dalam input data, periksa kembali dengan teliti 
            !');
            $data['title'] = 'Register &mdash; Lazisnu Kesamben';
            $this->template_auth->load('template_auth', 'auth/register', $data);
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($email),
                'gambar' => 'default_user.png',
                'password' => sha1($this->input->post('password')),
                'role_id' => 3, //default member
                'status_id' => 0, //default off
                'keterangan_id' => 1

            ];

            // token untuk aktivasi
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            // proses add data
            $this->user_m->add_user($data);
            $this->db->insert('token', $user_token);

            // kirim token ke email pendaftar
            $this->_sendEmail($token, 'aktivasi');

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('sukses', "Registrasi Akun Berhasil ! \n Silahkan aktifasi akun anda dengan mengklik tautan yang kami kirim ke email anda ! !");
                redirect('auth');
            } else {
                $this->session->set_flashdata('eror', 'Ada kesalahan, periksa kembali dengan teliti !');
                $data['title'] = 'Register &mdash; Lazisnu Kesamben';
                $this->template_auth->load('template_auth', 'auth/register', $data);
            }
        }
    }

    // fungsi untuk kirim email
    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'dancokbeud@gmail.com',
            'smtp_pass' => 'dancokbeud123',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('dancokbeud@gmail.com', 'Lazisnu Kesamben');

        // untuk verivikasi
        if ($type == 'aktivasi') {
            $this->email->to($this->input->post('email'));
            $this->email->subject('Account Verivication');
            $this->email->message('Click this link to verivy your account : <a href="' . base_url() . 'auth/verivy?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activated</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo  $this->email->print_debugger();
            die;
        }
    }

    public function verivy()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token =
                $this->db->get_where('token', ['token' => $token])->row_array();
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('status_id', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('token', ['email' => $email]);
                    $this->session->set_flashdata('sukses', "Aktivasi Akun Berhasil ! \n Silahkan Login unutk melanjutkan !");
                    redirect('auth');
                } else {
                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('token', ['email' => $email]);
                    $this->session->set_flashdata('eror', "Account activation failed");
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('eror', "Account activation failed");
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('eror', "Account activation failed");
            redirect('auth');
        }
    }

    public function forgot()
    {
        $data['title'] = 'Forgot Password &mdash; Lazisnu Kesamben';
        $this->template_auth->load('template_auth', 'auth/forgot', $data);
    }
    public function logout()
    {
        $params = array('user_id', 'role_id');
        $this->session->unset_userdata($params);
        $this->session->set_flashdata('warning', "Anda telah berhasil logout, login untuk kembali !");
        redirect('auth');
    }
}
