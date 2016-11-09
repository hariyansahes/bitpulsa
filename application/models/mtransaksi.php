<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Mtransaksi extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function input($text,$id,$status,$total_btc,$nomor,$paket,$id_user,$tanggal,$hash)
	{
		$data = array(
			'transaksi_code' => $id,
			'status'=>$status,
			'total'=>$total_btc,
			'nomor'=>$nomor,
			'id_user'=>$id_user,
			'id_paket'=>$paket,
			'tanggal'=>$tanggal,
			'hash'=>$hash,
			'log'=>$text
		 );
		$this->db->insert('transaksi',$data);
	}
	function get_transaksi($num, $offset)
	{
		$this->db->join('user', 'user.id_user = transaksi.id_user', 'left');
		$this->db->join('operator_paket', 'operator_paket.id_operator_paket = transaksi.id_paket', 'left');
		$q=$this->db->get('transaksi', $num, $offset);
		return $q;
	}
	
	function get_user_transaksi($id_user)
	{
		$this->db->join('operator_paket', 'operator_paket.id_operator_paket = transaksi.id_paket', 'left');
		$this->db->where('id_user', $id_user); 
		$q=$this->db->get('transaksi');
		return $q;
	}
		


}


?>