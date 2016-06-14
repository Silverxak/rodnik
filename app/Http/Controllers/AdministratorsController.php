<?php namespace App\Http\Controllers;

use App\Administrators;
use Request;

class AdministratorsController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('isadmin');
	}

	public function index()
	{
      $admlist = Administrators::all()->where('is_admin', 1)->sortBy('id');
      return view('administrators', ['admlist'=>$admlist]);
	}

	public function add()
	{
		$admlist = Administrators::all();
		$admlist = new Administrators;
		$admlist->name = Request::input('name');
		$admlist->login = Request::input('login');
		$admlist->password = bcrypt(Request::input('password'));
		$admlist->is_admin = 1;
		$admlist->visible_pass = null;
		$admlist->group_id = 1;
		$admlist->save();
	}

	public function edit()
	{
		$id = Request::input('id');
		$admlist = Administrators::find($id);
		$admlist->name = Request::input('name');
		$admlist->login = Request::input('login');
		$admlist->password = bcrypt(Request::input('password'));
		$admlist->save();
	}

	public function delete()
	{
		$id = Request::input('id');
		$admlist = Administrators::find($id);
		$admlist->delete();
	}

}
