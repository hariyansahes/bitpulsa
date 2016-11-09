<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('madmin');
	}
	function index(){
		if($this->session->userdata('masuk'))
		redirect('administrator/dashboard','refresh');
		$this->load->view('admin/login');
	}
	function login(){
		$username =$this->input->post('username',TRUE);
		$password =$this->input->post('password',TRUE);
		$this->db->where('username', $username);
		$this->db->where('password', md5($password));
		$query =$this->db->get('admin');
		if ($query->num_rows() == 1) {
			foreach($query->result() as $row) {
			$id=$row->id_admin;
			}
		}
		$user= $this->madmin->cek_admin($username,$password);
		if($user == TRUE){
			$data = array( 
			'username'=>$username,
			'id'=>$id,
			'masuk' => TRUE );
			$this->session->set_userdata($data);
			redirect('administrator/dashboard','refresh');
		}else{
			$this->session->set_flashdata('nama',$username);
			$this->session->set_flashdata('login_message', '<divclass="error">Username atau Password Anda Tidak Sesuai</div>');
			redirect('admin');
		}
	}
	function logout(){
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('masuk');
		redirect(site_url()); // sesudah logout di redirect ke halaman utama
	}

}