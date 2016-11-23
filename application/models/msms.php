<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Msms extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function kirim($text,$nomor,$paket)
	{
		$text = $paket.".".$text;

		$data = array(
			'DestinationNumber' => '081805889090',
			'TextDecoded' => $text,
			'SenderID' => '',
			'CreatorID' => "gammu"
		 );
		$this->db->insert('outbox',$data);
	}
}


?>