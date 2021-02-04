<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Munfiq extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Munfiq &mdash; Lazisnu Kesamben';
        $this->template->load('template', 'content/munfiq', $data);
    }
}
