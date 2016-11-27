<?php if( !defined('BASEPATH') ) exit( 'No direct script access allowed' );
// application/controllers/test.php

class Callback extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
        $this->load->model('mtransaksi');
        $this->API="http://localhost:4545/api";
	}
    
	public function index()
	{
	

     // $jsonData = file_get_contents("http://localhost:5555/coinbase.json");
	  $jsonData = file_get_contents('php://input');
	   $data = json_decode($jsonData, true);

    $waktu=date('Y-m-d');
    $w=explode("-",$waktu);
    $tanggal=$w[2]."-".$w[1]."-".$w[0];
    $text = print_r($data,true);
    $id=$data['order']['id'];
	$status=$data['order']['status'];
	$total_btc=$data['order']['total_btc']['cents'];
	$custom=$data['order']['custom'];
	$hash=$data['order']['transaction']['hash'];

	 if ($id==NULL) {
    	$id="";
    	    }
     if ($status==NULL) {
    	$status="";
    	    }
     if ($total_btc==NULL) {
    	$total_btc="";
    	    }
    if ($custom!=NULL) {
    	//pecah data di dalam string custom
        $pecah=explode("_",$custom);
       $nomor=$pecah[0];
        $paket=$pecah[1];
       $id_user=$pecah[2];
    }else{ 
        $nomor="";
        $paket="";
        $id_user="";
    }
    $this->mtransaksi->input($text,$id,$status,$total_btc,$nomor,$paket,$id_user,$tanggal,$hash);

    $dt = array(
                'nomor'    =>  $nomor,
                'paket'    =>  $paket
                );
    $this->curl->simple_post($this->API.'/sms', $dt, array(CURLOPT_BUFFERSIZE => 10)); 
            
 
    

	}
}