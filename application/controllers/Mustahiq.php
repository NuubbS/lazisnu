<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mustahiq extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Mustahiq &mdash; Lazisnu';
        $this->template->load('template', 'content/mustahiq', $data);
    }
}
