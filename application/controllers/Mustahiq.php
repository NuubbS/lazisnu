<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mustahiq extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_unlogin();
        $this->load->model('user_m');
    }

    public function index()
    {
        $data['title'] = 'Mustahiq &mdash; Lazisnu Kesamben';
        $this->template->load('template', 'content/mustahiq', $data);
    }
}
