<?php namespace App\Http\Controllers;

use App\iptable;

use Request;

class TreningController extends Controller {

	public function index()
	{

		// $ip = '127.0.0.192';
		// $mask = '255.255.255.0';
		// echo long2ip(sprintf('%u', ip2long($ip) & ip2long($mask)));


		var_dump($ip = Request::ip());
		//$iplist = iptable::all();

		// function applyNetMask($ip, $mask)
		// {
		//     if ( is_string($ip  ) ) $ip   = ip2long($ip  );
		//     if ( is_string($mask) ) $mask = ip2long($mask);
		    
		//     return long2ip(sprintf('%u', $ip & $mask));
		// }

		// //echo $ip = Request::ip();
		// //echo $iplist[0]->adds;

		// foreach ($iplist as $ips) {
		// 	var_dump(applyNetMask($ips->adds, $ips->mask));
		// }

		// echo count($iplist);



		// function isLocalIp( $ip )
		// {
		// 	$iplist = iptable::all();
		// 	$mask_db = $iplist[0]->mask;
		// 	$ip_db = $iplist[0]->adds;
		//     if ( strval($ip_db) === applyNetMask($ip, strval($mask_db)  ) ) return true;
		    
		//     return false;
		// }

		// echo 'client is ', isLocalIp($ip) ? 'local' : 'world', PHP_EOL;

		// (applyNetMask('192.168.1.1', '255.255.255.0') === applyNetMask('127.0.0.1', '255.255.255.0')) ? 'YES' : 'NO';
		// var_dump(applyNetMask('127.1.1.1', '255.255.255.0'));
		// var_dump(applyNetMask('127.0.0.1', '255.255.255.0'));


		return view('trening');
	}

}

