<?php namespace App\Http\Controllers;

class StudentController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('ipcheck');
	}
	public function index()
	{
		return view('student');
	}

}
