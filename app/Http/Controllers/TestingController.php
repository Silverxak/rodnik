<?php namespace App\Http\Controllers;

class TestingController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('ipcheck');
	}
	
	public function index()
	{
		return view('testing');
	}

	public function test()
	{
		return view('test_in_process');
	}

}
