<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function index()
	{
		$data['title'] = 'Dashboard &mdash; Lazisnu';
		$this->load->view('template/header', $data);
		$this->load->view('content/dashboard');
		$this->load->view('template/footer');
	}
}
