<?php

class Fungsi
{

    protected $ci;

    function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('user_m');
    }

    function user_login()
    {
        $user_id = $this->ci->session->userdata('user_id');
        $user_data = $this->ci->user_m->get_data($user_id)->row();
        return $user_data;
    }
}
