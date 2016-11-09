<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Madmin extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function cek_admin($username,$password){
		$this->db->where('username',$username);
		$this->db->where('password',md5($password));
		$query = $this->db->get('admin');
		if($query->num_rows() > 0) {
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	function getadmin()
	{
		$q=$this->db->get('admin');
		return $q;
	}
	function ambil_admin($id_user)
	{
		$this->db->where('id_admin',$id_user);
		$q=$this->db->get('admin');
		return $q;
	}
	function get_admin($num, $offset)
	{
		$q=$this->db->get('admin', $num, $offset);
		return $q;
	}
	function edit_admin($id,$photo,$username,$email,$password){
		$this->db->where('id_admin',$id);
		if ($photo==NULL&&$password==NULL) {
			$data = array(
			'username' => $username,
			'email' => $email
		 );
		}elseif ($password==NULL) {
			$data = array(
			
			'username' => $username,
			'photo' => $photo,
			'email' => $email
		 );
		}elseif ($photo==NULL) {
			$data = array(
			
			'username' => $username,
			'password' => md5($password),
			'email' => $email
			);
		}else{
			$data = array(
			'username' => $username,
			'photo' => $photo,
			'password' => md5($password),
			'email' => $email
			);
		}
		$this->db->update('admin',$data);	
	}
	function hapus_admin($id){
		$this->db->where('id_admin',$id);
        $this->db->delete('admin');
	}


}


?>