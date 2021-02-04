<?php
class UserCrud_m extends CI_model
{
    function __construct()
    {
        parent::__construct();
    }

    public function simpan_user($data)
    {
        if ($this->db->insert("user_crud", $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function hapus_user($id)
    {
        if (@$this->db->set('keterangan_id', 3)->where('user_id', $id)->delete("user_crud")) {
            return true;
        } else {
            return false;
        }
    }

    public function update_user($user_id, $data)
    {
        if (@$this->db->where('user_id', $user_id)->update('user_crud', $data)) {
            return true;
        } else {
            return false;
        }
    }
}
