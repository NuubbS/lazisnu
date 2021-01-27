<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		check_unlogin();
		$this->load->model('user_m');
	}

	public function index()
	{
		$data['title'] = 'Dashboard &mdash; Lazisnu';
		$id = 1;
		$data['user'] = $this->user_m->get_data($id);
		$this->template->load('template', 'content/dashboard', $data);
	}
}
