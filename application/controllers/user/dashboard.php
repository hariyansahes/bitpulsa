<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	
		function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('signin'))redirect(base_url(),'refresh');
		$this->load->model('muser');
		$this->load->model('mtransaksi');
		$this->load->model('moperator');
		$this->load->model('mpaket');
		$this->load->library('pagination');
		 $this->load->library('table');
		 $this->load->library('Coinbase_api');
	}
	function index()
	{
		$id_user=$this->session->userdata('id');
		$data['profil']=$this->muser->ambil_user($id_user);
		$data['operator']=$this->moperator->all_operator();
		$data['content']='user/beli_pulsa';
		$this->load->view('user/dashboard',$data);
	}
	function beli_pulsa()
	{
		$id_user=$this->session->userdata('id');
		$data['profil']=$this->muser->ambil_user($id_user);
		$data['operator']=$this->moperator->all_operator();
		$data['content']='user/beli_pulsa';
		$this->load->view('user/dashboard',$data);
	}
	function beli_pulsa_submit(){
		$nomor = $this->input->post('nomor');
		$paket = $this->input->post('paket');

		$id_user=$this->session->userdata('id');
		$data['profil']=$this->muser->ambil_user($id_user);
		$data['nomor']=$nomor;
		$data['paket']=$this->mpaket->paket_konfirmasi($paket);
		$data['content']='user/beli_pulsa_submit';
		$this->load->view('user/dashboard',$data);
	}
	function select_paket()
	{
		$op = $this->input->post('operator_id');
		$data['paket']=$this->mpaket->paketlist($op);
		$this->load->view('user/paket',$data);
	}
	function transaksi()
	{
		$id_user=$this->session->userdata('id');
		$data['profil']=$this->muser->ambil_user($id_user);
		$data['transaksi']=$this->mtransaksi->get_user_transaksi($id_user);
		$data['content']='user/transaksi';
		$this->load->view('user/dashboard',$data);
	}
	function logout(){
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('signin');
		redirect(site_url()); // sesudah logout di redirect ke halaman utama
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */