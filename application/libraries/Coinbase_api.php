<?php if( !defined('BASEPATH') ) exit( 'No direct script access allowed' );
// application/libraries/Coinbase_api.php

class Coinbase_api
{
	public function __construct()
	{
	require_once(dirname(__FILE__) . '/Coinbase/Exception.php');
	require_once(dirname(__FILE__) . '/Coinbase/ApiException.php');
	require_once(dirname(__FILE__) . '/Coinbase/ConnectionException.php');
	require_once(dirname(__FILE__) . '/Coinbase/Coinbase.php');
	require_once(dirname(__FILE__) . '/Coinbase/Requestor.php');
	require_once(dirname(__FILE__) . '/Coinbase/Rpc.php');
	require_once(dirname(__FILE__) . '/Coinbase/OAuth.php');
	require_once(dirname(__FILE__) . '/Coinbase/TokensExpiredException.php');
	require_once(dirname(__FILE__) . '/Coinbase/Authentication.php');
	require_once(dirname(__FILE__) . '/Coinbase/SimpleApiKeyAuthentication.php');
	require_once(dirname(__FILE__) . '/Coinbase/OAuthAuthentication.php');
	require_once(dirname(__FILE__) . '/Coinbase/ApiKeyAuthentication.php');
	}

	// pass method call through if the method exists
	public function __call($method, $arguments)
	{
		if( !method_exists('Coinbase', $method) )
			throw new Exception('Undefined method Coinbase::' . $method . '() called');

		$_API_KEY = "FiRByDP6OLweY64V";
		$_API_SECRET = "ZzFLzMVdmQMDi1gz1KSY1pfxhfVczs2m";
		$obj = Coinbase::withApiKey($_API_KEY, $_API_SECRET);
		return call_user_func_array(array($obj, $method), $arguments);
	}
}