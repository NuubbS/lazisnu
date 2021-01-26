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
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login &mdash; Lazisnu';
            $this->load->view('auth/login', $data);
        } else {
            // cek email dan password
            $this->_login();
        }
    }

    private function _login()
    {
        // post
        $post = $this->input->post(null, true);
        $query = $this->user_m->login($post);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $params = array(
                'user_id' => $row->user_id,
                'role_id' => $row->role_id
            );
            // cek aktifasi user
            if ($row->status_id != 0) {
                $this->session->set_userdata($params);
                redirect('dashboard');
            } else {
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('eror-login', "Periksa kembali username dan password anda !");
            redirect('auth');
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
        $post = $this->input->post(null, True);
        if (isset($post['regis'])) {
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('eror-register', 'Ada kesalahan dalam input data, periksa kembali dengan teliti 
            !');
                $data['title'] = 'Register &mdash; Lazisnu';
                $this->load->view('auth/register', $data);
            } else {
                $data = [
                    'nama' => htmlspecialchars($this->input->post('nama', true)),
                    'email' => htmlspecialchars($this->input->post('email', true)),
                    'gambar' => 'default_user.jpg',
                    'password' => sha1($this->input->post('password')),
                    'role_id' => 3, //default member
                    'status_id' => 1
                ];
                $this->user_m->add_user($data);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('sukses-register', "Registrasi Akun Berhasil ! \n Periksa akun Emal anda untuk melakukan verifikai !");
                    redirect('auth');
                } else {
                    $this->session->set_flashdata('eror-register', 'Ada kesalahan dalam input data, periksa kembali dengan teliti !');
                    $data['title'] = 'Register &mdash; Lazisnu';
                    $this->load->view('auth/register', $data);
                }
            }
        } else {
            $data['title'] = 'Register &mdash; Lazisnu';
            $this->load->view('auth/register', $data);
        }
    }

    public function logout()
    {
        $params = array('user_id', 'role_id');
        $this->session->unset_userdata($params);
        redirect('auth');
    }
}
