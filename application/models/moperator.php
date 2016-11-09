<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Moperator extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function all_operator()
	{
		$q=$this->db->get('operator');
		return $q;
	}
	function get_operator($num, $offset)
	{
		$q=$this->db->get('operator', $num, $offset);
		return $q;
	}
	function tambah_operator($operator){
		$data = array(
			'nama_operator' => $operator
		 );
		$this->db->insert('operator',$data);	
	}
	function edit_operator($id,$operator){
		$this->db->where('id_operator',$id);
		$data = array(
			'nama_operator' => $operator
		 );
		$this->db->update('operator',$data);	
	}
	function hapus_operator($id){
		$this->db->where('id_operator',$id);
        $this->db->delete('operator');
	}

	
}


?>