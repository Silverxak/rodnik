<?php namespace App\Http\Controllers;

class MarkController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('ipcheck');
	}

	public function index()
	{
		return view('mark');
	}

}
