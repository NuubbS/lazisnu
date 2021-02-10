<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tutorial extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_unlogin();
        $this->load->model(['usercrud_m', 'chart_m']);
    }

    public function crud()
    {
        $data['status'] = $this->db->get('status')->result();
        $data['role'] = $this->db->get('user_role')->result();
        $data['title'] = 'Tutorial CRUD &mdash; Lazisnu Kesamben';
        $this->template->load('template', 'tutorial/index', $data);
    }

    public function chart()
    {
        $data['title'] = 'Tutorial Chart &mdash; Lazisnu Kesamben';
        $data['user'] = $this->user(true); //untuk meload fungsi user
        $this->template->load('template', 'tutorial/chart', $data);
    }

    public function modal()
    {
        $data['title'] = 'Tutorial modal &mdash; Lazisnu Kesamben';
        $this->template->load('template', 'tutorial/modal', $data);
    }

    function crud_fetch()
    {
        $this->datatables->search('user_crud.user_id, user_crud.nama, user_crud.email,user_crud.alamat,user_crud.no_hp, user_role.role, user_crud.nama, status.status, user_crud.date_created, user_crud.date_updated, user_crud.user_id');
        $this->datatables->select('user_crud.user_id, user_crud.nama, user_crud.email, user_crud.alamat,user_crud.no_hp, user_role.role, user_crud.nama, status.status, user_crud.date_created, user_crud.date_updated, user_crud.user_id as as');
        $this->datatables->from('user_crud');
        $this->datatables->join('user_role', 'user_crud.role_id = user_role.role_id');
        $this->datatables->join('status', 'user_crud.status_id = status.status_id');
        $this->datatables->where_in('user_crud.status_id', ['1', '2']);
        $this->datatables->order_by('role', "DESC");
        $m = $this->datatables->get();
        $no = 1;
        foreach ($m as $key => $value) {
            $act = '';
            $act .= sprintf('<button onclick="edit(%s)" class="btn btn-icon btn-sm btn-warning m-1" data-toggle="tooltip" data-placement="top" title="Edit User"><i class="fas fa-user-edit"></i></button>', $value['user_id']);
            $act .= sprintf('<button onclick="hapus(%s)" class="btn btn-icon btn-sm btn-danger m-1" data-toggle="tooltip" data-placement="top" title="Hapus User"><i class="fas fa-diagnoses"></button>', $value['user_id']);
            $m[$key]['as'] = $act;
            $m[$key]['user_id'] = $no;
            $no++;
        }
        $this->datatables->render_no_keys($m);
    }


    function crud_simpan()
    {
        // user id
        $session_id = $this->fungsi->user_login()->nama;
        //table soal
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $password = sha1($this->input->post('password'));
        $alamat = $this->input->post('alamat');
        $no_hp = $this->input->post('no_hp');
        $role_id = $this->input->post('role_id');
        $status_id = $this->input->post('status_id');

        $data = [
            "nama" => $nama,
            "email" => $email,
            "password" => $password,
            "alamat" => $alamat,
            "no_hp" => $no_hp,
            "role_id" => $role_id,
            // "date_created" => date('Y-m-d H:i:s'),
            "status_id" => $status_id,
            "created_by" => $session_id,
        ];
        // var_dump($data);
        // die;
        $insert_user_crud = $this->usercrud_m->simpan_user($data);
        if (@$insert_user_crud) {
            $message['messages'] = "Berhasil Menambah Data Soal....";
            $message['status'] = "1";
        } else {
            $message['messages'] = "Gagal Mengeksekusi Query Soal";
            $message['status'] = "0";
        }
        echo json_encode($message);
    }

    // tampil modal where id
    function crud_edit($id)
    {
        $this->data['role'] = $this->main_m->view('user_role')->result();
        $this->data['user'] = $this->main_m->view_where('user_crud', ['user_id' => $id])->row();

        $this->load->view('tutorial/form_update_usercrud', $this->data);
    }

    function crud_detail($id)
    {
        $this->data['role'] = $this->main_m->view('user_role')->result();
        $this->data['user'] = $this->main_m->view_where('user', ['user_id' => $id])->row();

        $this->load->view('administrator/user_detail', $this->data);
    }

    // proses update
    function crud_update()
    {
        // user id
        $session_id = $this->fungsi->user_login()->nama;
        //table soal
        $user_id = $this->input->post('user_id');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $alamat = $this->input->post('alamat');
        $no_hp = $this->input->post('no_hp');
        $role_id = $this->input->post('role_id');
        $status_id = $this->input->post('status_id');

        $data = [
            "nama" => $nama,
            "email" => $email,
            "alamat" => $alamat,
            "no_hp" => $no_hp,
            "role_id" => $role_id,
            "date_updated" => date('Y-m-d H:i:s'),
            "status_id" => $status_id,
            "updated_by" => $session_id,
        ];

        $update_user_id = $this->usercrud_m->update_user($user_id, $data);
        if (@$update_user_id) {
            $message['messages'] = "Berhasil Update Data User....";
            $message['status'] = "1";
        } else {
            $message['messages'] = "Gagal Update Data User";
            $message['status'] = "0";
        }
        echo json_encode($message);
    }

    function crud_hapus()
    {
        $id = $this->input->post('id');
        $del = $this->usercrud_m->hapus_user($id);
        if (@$del) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }

    // fungsi grafik jumlah user
    public function user()
    {
        $row = [];
        $user = $this->chart_m->user();
        $grafik['label_user'] = array_column($user, 'bulan');
        $grafik['series_user'] = array_column($user, 'jumlah');
        $grafik['nama_user'] = 'Jumlah User';
        $grafik['min_user'] =  0;
        $grafik['max_user'] =   ($grafik['series_user'] != NULL) ? max($grafik['series_user']) : 0;
        $grafik['interval_user'] = ($grafik['series_user'] != NULL) ? ceil(max($grafik['series_user']) / 10) : 0;
        $data = ['row' => $row, 'grafik' => $grafik, 'md' => @(12 / sizeof($row))];
        return $data;
        // var_dump($data);
    }
}
