<?php

date_default_timezone_set('Asia/Jakarta');
// fungsi untuk membatasi hak akses user terlogin

function check_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('user_id');
    if ($user_session) {
        redirect('dashboard');
    }
}

function check_unlogin()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('user_id');
    if (!$user_session) {
        redirect('auth');
    }
}
// fungsi untuk membatasi hak akses user terlogin

function check_admin()
{
    $ci = &get_instance();
    $ci->load->library('fungsi');
    if ($ci->fungsi->user_login()->level_id != 1) {
        redirect('dashboard');
    }
}
