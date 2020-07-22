<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->helper(array('url'));
    }

    public function index()
    {
        $this->load->view('Customer/v_beranda');
    }
}
