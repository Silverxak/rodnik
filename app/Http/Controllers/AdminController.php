<?php namespace App\Http\Controllers;

class AdminController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('isadmin');
	}
	
	public function index()
	{
		return view('admin');
	}

}
