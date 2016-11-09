<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('muser');
	}
	function index(){
		$username =$this->input->post('username',TRUE);
		$password =$this->input->post('password',TRUE);
		$this->db->where('username', $username);
		$this->db->where('password', md5($password));
		$query =$this->db->get('user');
		if ($query->num_rows() == 1) {
			foreach($query->result() as $row) {
			$id=$row->id_user;
			}
		}
		$user= $this->muser->cek_user($username,$password);
		if($user == TRUE){
			$data = array( 
			'username'=> $username,
			'id'=>$id,
			'signin' => TRUE );
			$this->session->set_userdata($data);
			redirect('user/dashboard','refresh');
		}else{
			$data['notif']="<div class='alert alert-danger' role='alert'>username atau password yang anda masukan salah<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
			$this->load->view('home',$data);
		}
	}

	function logout(){
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('signin');
		redirect(site_url()); // sesudah logout di redirect ke halaman utama
	}

}