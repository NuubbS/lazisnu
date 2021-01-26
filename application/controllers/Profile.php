<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Profile &mdash; Lazisnu';
        $this->template->load('template', 'content/profile', $data);
    }
}
