<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->load->view('user/layouts/header');
		$this->load->view('user/pages/index');
		$this->load->view('user/layouts/footer');
	}
}
