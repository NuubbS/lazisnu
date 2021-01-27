<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function login($post)
    {
        $this->db->from('user');
        $this->db->where('email', $post['email']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();
        return $query;
    }

    public function get_data($id = null)
    {
        $this->db->from('user');
        if ($id) {
            $this->db->where('role_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function update_user($user_id, $data)
    {
        if (@$this->db->where('user_id', $user_id)->update('user', $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function add_user($data)
    {
        if ($this->db->insert("user", $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
}
