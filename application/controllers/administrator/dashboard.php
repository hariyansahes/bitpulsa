<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	
		function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('masuk'))redirect(base_url(),'refresh');
		$this->load->model('madmin');
		$this->load->model('mtransaksi');
		$this->load->model('muser');
		$this->load->model('moperator');
		$this->load->model('mpaket');
		$this->load->library('pagination');
		 $this->load->library('table');
		 $this->load->library('Coinbase_api');
	}
	function index()
	{
		$rates = $this->coinbase_api->getExchangeRate();
         $harga_btc=round($rates->btc_to_usd ,2, PHP_ROUND_HALF_UP);
		
		$id_user=$this->session->userdata('id');
		$data['profil']=$this->madmin->ambil_admin($id_user);
		$data['j_trans']=$this->db->count_all('transaksi');
		$data['j_user']=$this->db->count_all('user');
		$data['j_op']=$this->db->count_all('operator_paket');
		$data['j_rate']=$harga_btc;
		$data['content']='admin/home';
		$this->load->view('admin/dashboard',$data);
	}

	/* ------ fungsi operator -------*/
	function operator()
	{
		//pengaturan pagination
		 $jml = $this->db->get('operator');
		 
 		$config['base_url'] = base_url().'administrator/dashboard/operator';
 		$config['total_rows'] = $jml->num_rows();
 		$config['per_page'] = 6;
 		$config['num_links'] = 2;
  		$config['uri_segment'] = 4; //3 merupakan posisi pagination dalam url
  		$config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin">';
		$config['full_tag_close'] = '</ul></div>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&larr; SEBELUMNYA';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = 'SELANJUTNYA &rarr;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] =  '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$this->pagination->initialize($config);
 		$data['halaman'] = $this->pagination->create_links();
 		//end pagination

		$id_user=$this->session->userdata('id');
		$data['profil']=$this->madmin->ambil_admin($id_user);
		$data['operator']=$this->moperator->get_operator($config['per_page'],$this->uri->segment(4));
		$data['content']='admin/operator';
		$this->load->view('admin/dashboard',$data);
	}
	function tambah_operator()
	{
		$operator=$this->input->post('operator',TRUE);
		$this->moperator->tambah_operator($operator);
		redirect('administrator/dashboard/operator');
	}
	function edit_operator()
	{
		$id=$this->input->post('id',TRUE);
		$operator=$this->input->post('operator',TRUE);
		$this->moperator->edit_operator($id,$operator);
		redirect('administrator/dashboard/operator');
	}
	function hapus_operator()
	{
		$id=$this->uri->segment(4);
		$this->moperator->hapus_operator($id);
		redirect('administrator/dashboard/operator');
	}

	/* ------ end operator -------*/
	/* ------ fungsi paket pulsa -------*/
	function paket_pulsa()
	{
		//pengaturan pagination
		 $jml = $this->db->get('operator_paket');
		 
 		$config['base_url'] = base_url().'administrator/dashboard/paket_pulsa';
 		$config['total_rows'] = $jml->num_rows();
 		$config['per_page'] = 6;
 		$config['num_links'] = 2;
  		$config['uri_segment'] = 4; //3 merupakan posisi pagination dalam url
  		$config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin">';
		$config['full_tag_close'] = '</ul></div>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&larr; SEBELUMNYA';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = 'SELANJUTNYA &rarr;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] =  '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$this->pagination->initialize($config);
 		$data['halaman'] = $this->pagination->create_links();
 		//end pagination

		$id_user=$this->session->userdata('id');
		$data['profil']=$this->madmin->ambil_admin($id_user);
		$data['operator']=$this->moperator->all_operator();
		$data['paket']=$this->mpaket->get_paket($config['per_page'],$this->uri->segment(4));
		$data['content']='admin/paket_pulsa';
		$this->load->view('admin/dashboard',$data);
	}
	function tambah_paket()
	{
		$operator=$this->input->post('operator',TRUE);
		$nominal=$this->input->post('nominal',TRUE);
		$harga=$this->input->post('harga',TRUE);
		$this->mpaket->tambah_paket($operator,$nominal,$harga);
		redirect('administrator/dashboard/paket_pulsa');
	}
	function edit_paket()
	{
		$id=$this->input->post('id',TRUE);
		$operator=$this->input->post('operator',TRUE);
		$nominal=$this->input->post('nominal',TRUE);
		$harga=$this->input->post('harga',TRUE);
		$this->mpaket->edit_paket($id,$operator,$nominal,$harga);
		redirect('administrator/dashboard/paket_pulsa');
	}
	function hapus_paket()
	{
		$id=$this->uri->segment(4);
		$this->mpaket->hapus_paket($id);
		redirect('administrator/dashboard/paket_pulsa');
	}

	/* ------ end paket -------*/
	/* ------ fungsi user -------*/
	function user()
	{
		//pengaturan pagination
		 $jml = $this->db->get('user');
		 
 		$config['base_url'] = base_url().'administrator/dashboard/user';
 		$config['total_rows'] = $jml->num_rows();
 		$config['per_page'] = 6;
 		$config['num_links'] = 2;
  		$config['uri_segment'] = 4; //3 merupakan posisi pagination dalam url
  		$config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin">';
		$config['full_tag_close'] = '</ul></div>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&larr; SEBELUMNYA';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = 'SELANJUTNYA &rarr;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] =  '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$this->pagination->initialize($config);
 		$data['halaman'] = $this->pagination->create_links();
 		//end pagination

		$id_user=$this->session->userdata('id');
		$data['profil']=$this->madmin->ambil_admin($id_user);
		$data['user']=$this->muser->get_user($config['per_page'],$this->uri->segment(4));
		$data['content']='admin/user';
		$this->load->view('admin/dashboard',$data);
	}
	function edit_user()
	{
		$config = array(
    		'allowed_types' => 'jpg|jpeg|gif|png',
      		'upload_path' => './adm/img/',
      		'max_size'=>'2000');
    		$this->load->library('upload', $config);
			$this->upload->do_upload();
			if (! $this->upload->data()) {
				$photo="";
			}else{
				$image_data = $this->upload->data();
    		$photo = $image_data['file_name'];	
			}
		$id=$this->input->post('id',TRUE);
		$nama=$this->input->post('nama',TRUE);
		$username=$this->input->post('username',TRUE);
		$email=$this->input->post('email',TRUE);
		$password=$this->input->post('password',TRUE);
		$this->muser->edit_user($id,$photo,$nama,$username,$email,$password);
		redirect('administrator/dashboard/user');
	}
	function hapus_user()
	{
		$id=$this->uri->segment(4);
		$this->muser->hapus_user($id);
		redirect('administrator/dashboard/user');
	}

	/* ------ end user -------*/
	/* ------ fungsi admin -------*/
	function admin()
	{
		//pengaturan pagination
		 $jml = $this->db->get('admin');
		 
 		$config['base_url'] = base_url().'administrator/dashboard/admin';
 		$config['total_rows'] = $jml->num_rows();
 		$config['per_page'] = 6;
 		$config['num_links'] = 2;
  		$config['uri_segment'] = 4; //3 merupakan posisi pagination dalam url
  		$config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin">';
		$config['full_tag_close'] = '</ul></div>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&larr; SEBELUMNYA';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = 'SELANJUTNYA &rarr;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] =  '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$this->pagination->initialize($config);
 		$data['halaman'] = $this->pagination->create_links();
 		//end pagination

		$id_user=$this->session->userdata('id');
		$data['profil']=$this->madmin->ambil_admin($id_user);
		$data['admin']=$this->madmin->get_admin($config['per_page'],$this->uri->segment(4));
		$data['content']='admin/admin';
		$this->load->view('admin/dashboard',$data);
	}
	function edit_admin()
	{
		$config = array(
    		'allowed_types' => 'jpg|jpeg|gif|png',
      		'upload_path' => './adm/img/',
      		'max_size'=>'2000');
    		$this->load->library('upload', $config);
			$this->upload->do_upload();
			if (! $this->upload->data()) {
				$photo="";
			}else{
				$image_data = $this->upload->data();
    		$photo = $image_data['file_name'];	
			}
		$id=$this->input->post('id',TRUE);
		$username=$this->input->post('username',TRUE);
		$email=$this->input->post('email',TRUE);
		$password=$this->input->post('password',TRUE);
		$this->madmin->edit_admin($id,$photo,$username,$email,$password);
		redirect('administrator/dashboard/admin');
	}
	/* ------ end admin -------*/
	function transaksi()
	{
		//pengaturan pagination
		 $jml = $this->db->get('transaksi');
		 
 		$config['base_url'] = base_url().'administrator/dashboard/transaksi';
 		$config['total_rows'] = $jml->num_rows();
 		$config['per_page'] = 6;
 		$config['num_links'] = 2;
  		$config['uri_segment'] = 4; //3 merupakan posisi pagination dalam url
  		$config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin">';
		$config['full_tag_close'] = '</ul></div>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&larr; SEBELUMNYA';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = 'SELANJUTNYA &rarr;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] =  '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$this->pagination->initialize($config);
 		$data['halaman'] = $this->pagination->create_links();
 		//end pagination

		$id_user=$this->session->userdata('id');
		$data['profil']=$this->madmin->ambil_admin($id_user);
		$data['transaksi']=$this->mtransaksi->get_transaksi($config['per_page'],$this->uri->segment(4));
		$data['content']='admin/transaksi';
		$this->load->view('admin/dashboard',$data);
	}
	/* ------ end transaksi -------*/


}

