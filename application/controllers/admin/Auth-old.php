<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/AuthModel', 'Auth_model');
	}
	public function index()
	{
		$data['title'] = "Login Admin";
		$this->load->view('admin/pages/login', $data);
	}
	public function proses_login()
	{
		$username = $this->input->POST('username');
		$password = $this->input->POST('password');

		$data = array(
			'username' => $username,
			'password' => $password
		);
		$cek_user = $this->Auth_model->login($data);
		if ($cek_user->num_rows() > 0) {

			$this->session->set_userdata($cek_user->row_array());
			redirect(base_url('admin'));
		} else {
			$this->session->set_flashdata('error', 'Username & password tidak cocok');
			redirect(base_url('admin/auth'));
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('admin/auth'));
	}
}
