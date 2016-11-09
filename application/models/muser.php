<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Muser extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function cek_user($username,$password){
		$this->db->where('username',$username);
		$this->db->where('password',md5($password));
		$query = $this->db->get('user');
		if($query->num_rows() > 0) {
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	function tambah_user($nama,$email,$username,$password){
		$data = array(
			'username' => $username,
			'email'=>$email,
			'password'=>$password,
			'nama'=>$nama,
			'photo'=>"avatar5.png"
		 );
		$this->db->insert('user',$data);	
	}
	function ambil_user($id_user)
	{
		$this->db->where('id_user',$id_user);
		$q=$this->db->get('user');
		return $q;
	}
	function get_user($num, $offset)
	{
		$q=$this->db->get('user', $num, $offset);
		return $q;
	}
	function edit_user($id,$photo,$nama,$username,$email,$password){
		$this->db->where('id_user',$id);
		if ($photo==NULL&&$password==NULL) {
			$data = array(
			'nama' => $nama,
			'username' => $username,
			'email' => $email
		 );
		}elseif ($password==NULL) {
			$data = array(
			'nama' => $nama,
			'username' => $username,
			'photo' => $photo,
			'email' => $email
		 );
		}elseif ($photo==NULL) {
			$data = array(
			'nama' => $nama,
			'username' => $username,
			'password' => md5($password),
			'email' => $email
			);
		}else{
			$data = array(
			'nama' => $nama,
			'username' => $username,
			'photo' => $photo,
			'password' => md5($password),
			'email' => $email
			);
		}
		$this->db->update('user',$data);	
	}
	function hapus_user($id){
		$this->db->where('id_user',$id);
        $this->db->delete('user');
	}
	
}


?>