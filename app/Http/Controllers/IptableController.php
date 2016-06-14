<?php namespace App\Http\Controllers;

use App\iptable;
use Request;

class IptableController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('isadmin');
	}
	
	public function index()
	{
      $iplist = iptable::all()->sortBy('id');
      return view('iptable', ['iplist'=>$iplist]);
	}

	public function addAddress()
	{
		$iplist = iptable::all();
		$iplist = new iptable;

		$ip = strval(Request::input('adds'));
		$mask = strval(Request::input('mask'));
		$net = ip2long($ip);
		$mask = ip2long($mask);
		$subnet = long2ip(sprintf('%u', $net & $mask));
		$iplist->adds = $subnet;
		$iplist->mask = Request::input('mask');
		$iplist->save();
	}

	public function updateAddress()
	{
		$oldAdds = Request::input('oldAdds');
		$oldMask = Request::input('oldMask');
		$adds = Request::input('adds');
		$mask = Request::input('mask');

		$iplist = iptable::where('adds', '=', $oldAdds)
			->where('mask', '=', $oldMask)
			->firstOrFail();
		$iplist->adds = $adds;
		$iplist->mask = $mask;
		$iplist->save();
	}

	public function deleteAddress()
	{
		$adds = Request::input('adds');
		$mask = Request::input('mask');
		$id = iptable::where('adds', '=', $adds)
			->where('mask', '=', $mask)
			->firstOrFail()
			->id;

		$iplist = iptable::find($id);
		$iplist->delete();
	}
}

