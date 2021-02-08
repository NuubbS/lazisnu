<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('main_m');
        check_unlogin();
    }

    public function user_account()
    {
        $data['title'] = 'User Account &mdash; Lazisnu Kesamben';
        $this->template->load('template', 'administrator/user_account', $data);
    }

    function user_account_fetch()
    {
        $this->datatables->search('user.user_id, user.nama, user.email, user_role.role, user.nama, status.status, user.date_created, user.date_updated, user.user_id');
        $this->datatables->select('user.user_id, user.nama, user.email, user_role.role, user.nama, status.status, user.date_created, user.date_updated, user.user_id as as');
        $this->datatables->from('user');
        $this->datatables->join('user_role', 'user.role_id = user_role.role_id');
        $this->datatables->join('status', 'user.status_id = status.status_id');
        $this->datatables->where_in('user.status_id', ['1', '2']);
        $this->datatables->order_by('role', "DESC");
        $m = $this->datatables->get();
        $no = 1;
        foreach ($m as $key => $value) {
            $act = '';
            $act .= sprintf('<button onclick="edit(%s)" class="btn btn-icon btn-sm btn-primary m-1" data-toggle="tooltip" data-placement="top" title="Edit User"><i class="fas fa-user-edit"></i></button>', $value['user_id']);
            $act .= sprintf('<button onclick="detail(%s)" class="btn btn-icon btn-sm btn-info m-1" data-toggle="tooltip" data-placement="top" title="Detail User"><i class="fas fa-diagnoses"></button>', $value['user_id']);
            $m[$key]['as'] = $act;
            $m[$key]['user_id'] = $no;
            $no++;
        }
        $this->datatables->render_no_keys($m);
    }


    function user_account_simpan()
    {
        // user id
        $session_id = $this->session->userdata('user_id');
        //table soal
        $kategori = $this->input->post('intervensi_kategori');
        $nama = $this->input->post('nama');
        $status = $this->input->post('status');

        $data = [
            "nama" => $nama,
            "intervensi_kategori_id" => $kategori,
            "created_time" => date('Y-m-d H:i:s'),
            "created_by" => $session_id,
            "status" => $status
        ];
        $insert_soal_id = $this->model_caseconference->simpan_soal($data);
        if (@$insert_soal_id) {
            $message['messages'] = "Berhasil Menambah Data Soal....";
            $message['status'] = "1";
        } else {
            $message['messages'] = "Gagal Mengeksekusi Query Soal";
            $message['status'] = "0";
        }
        echo json_encode($message);
    }

    // tampil modal where id
    function user_account_edit($id)
    {
        $this->data['role'] = $this->main_m->view('user_role')->result();
        $this->data['user'] = $this->main_m->view_where('user', ['user_id' => $id])->row();

        $this->load->view('administrator/user_update', $this->data);
    }

    function user_account_detail($id)
    {
        $this->data['role'] = $this->main_m->view('user_role')->result();
        $this->data['user'] = $this->main_m->view_where('user', ['user_id' => $id])->row();

        $this->load->view('administrator/user_detail', $this->data);
    }

    // proses update
    function user_account_update()
    {
        //table soal
        $user_id = $this->input->post('user_id');
        $role_id = $this->input->post('role_id');

        $data = [
            "role_id" => $role_id,
            "date_updated" => date('Y-m-d H:i:s'),
        ];

        $update_user_id = $this->user_m->update_user($user_id, $data);
        if (@$update_user_id) {
            $message['messages'] = "Berhasil Update Data user";
            $message['status'] = "1";
        } else {
            $message['messages'] = "Gagal Update Data User";
            $message['status'] = "0";
        }
        echo json_encode($message);
    }

    function user_profile_update()
    {
        //table soal
        $user_id = $this->input->post('user_id');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $no_hp = $this->input->post('no_hp');

        $data = [
            "nama" => $nama,
            "alamat" => $alamat,
            "no_hp" => $no_hp,
            "date_updated" => date('Y-m-d H:i:s'),
        ];

        $update_user_id = $this->user_m->update_user($user_id, $data);
        if (@$update_user_id) {
            $message['messages'] = "Berhasil Update Data user";
            $message['status'] = "1";
        } else {
            $message['messages'] = "Gagal Update Data User";
            $message['status'] = "0";
        }
        echo json_encode($message);
    }

    function user_account_hapus()
    {
        $id = $this->input->post('id');
        $del = $this->model_caseconference->hapus_soal($id);
        if (@$del) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }
}
