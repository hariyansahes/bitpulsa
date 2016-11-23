<?php if( !defined('BASEPATH') ) exit( 'No direct script access allowed' );
// application/controllers/test.php

class Test extends CI_Controller 
{
	public function index()
	{
		// load library
		$this->load->library('Coinbase_api');
		
		// get the account balance
		
		echo $this->coinbase_api->getBalance();
		echo $this->coinbase_api->createButton("Pulsa", "0.20", "USD","ano21")->embedHtml;
	}
	function bagi(){
		$btc=0.037/743.05;
		$num = number_format($btc,7);
		echo $num;
	}
}