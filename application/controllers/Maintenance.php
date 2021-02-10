<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Maintenance extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_unlogin();
        $this->load->model('user_m');
    }

    public function index()
    {
        $data['title'] = 'Munfiq &mdash; Lazisnu Kesamben';
        $this->load->view('maintenance/index', $data);
    }
}
