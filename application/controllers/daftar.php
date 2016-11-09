<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Daftar extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('muser');
	}
	function index(){
		$nama=$this->input->post('nama',TRUE);
		$username =$this->input->post('username',TRUE);
		$email=$this->input->post('email',TRUE);
		$pass=$this->input->post('password',TRUE);
		$password=md5($pass);
		$this->muser->tambah_user($nama,$email,$username,$password);
		$data['notif']="<div class='alert alert-success' role='alert'>anda berhasil terdaftar.silahkan login ke akun anda<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
			$this->load->view('home',$data);
	}

	function logout(){
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('signin');
		redirect(site_url()); // sesudah logout di redirect ke halaman utama
	}

}