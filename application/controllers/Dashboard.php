<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		check_unlogin();
	}

	public function index()
	{
		$data['title'] = 'Dashboard &mdash; Lazisnu';
		$this->template->load('template', 'content/dashboard', $data);
	}
}
