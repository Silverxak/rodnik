<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Import;
use App\Exceptions\ImportException;
use Exception;
use Request;
use App\Test;
use DB;

class TestController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('isadmin');
	}
	
	public function index()
	{
      $testlist = Test::all()->sortBy('id');
      return view('test', ['testlist'=>$testlist]);
	}

	public function history()
	{
		return view('history');
	}

	public function import()
	{
		if(!Request::hasFile('file'))
		{
			return response()->json(['success' => false, 'message' => 'Файл не указан']);
		}

		$file = Request::file('file');
		$file_path = $file->getPathname();

		set_time_limit(0);

		try
		{
			Import::testFromXmlString(file_get_contents($file_path));
		
			return response()->json(['success' => true]);
		}
		catch(ImportException $e)
		{
			return response()->json(['success' => false, 'message' => $e->getMessage()]);
		}
		catch(Exception $e)
		{	
			throw $e;
			return response()->json(['success' => false, 'message' => 'Неизвестная ошибка']);
		}
	}

	public function remove()
	{
		$id = Request::input('id');
		Test::destroy($id);
	}
}
