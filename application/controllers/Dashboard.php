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
		$data['user'] = $this->global_m->view_join_two('user', 'user_role', 'status', 'role_id', 'status_id', array('user.status_id' => 2), 'user_id', 'DESC', 1, 4);
		$data['author'] = $this->global_m->view_join_two_nolimit('user', 'user_role', 'status', 'role_id', 'status_id', array('user.role_id' => 1));
		$this->template->load('template', 'content/dashboard', $data);
	}
}
