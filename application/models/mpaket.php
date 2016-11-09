<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Mpaket extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function paket_konfirmasi($paket)
	{
		$this->db->where('id_operator_paket',$paket);
		$this->db->join('operator', 'operator.id_operator = operator_paket.id_operator', 'left');
		$q=$this->db->get('operator_paket');
		return $q;
	}
	function get_paket($num, $offset)
	{
		$this->db->join('operator', 'operator.id_operator = operator_paket.id_operator', 'left');
		$q=$this->db->get('operator_paket', $num, $offset);
		return $q;
	}
	function paketlist($op){
		$this->db->where('id_operator',$op);
		$q=$this->db->get('operator_paket');
		return $q;
	}
	function tambah_paket($operator,$nominal,$harga){
		$data = array(
			'id_operator' => $operator,
			'nominal' => $nominal,
			'harga' => $harga
		 );
		$this->db->insert('operator_paket',$data);	
	}
	function edit_paket($id,$operator,$nominal,$harga){
		$this->db->where('id_operator_paket',$id);
		$data = array(
			'id_operator' => $operator,
			'nominal' => $nominal,
			'harga' => $harga
		 );
		$this->db->update('operator_paket',$data);	
	}
	function hapus_paket($id){
		$this->db->where('id_operator_paket',$id);
        $this->db->delete('operator_paket');
	}

	
}


?>