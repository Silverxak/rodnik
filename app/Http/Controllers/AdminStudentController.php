<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Exceptions\ImportException;
use App\Import;
use Exception;
use Request;
use App\User;
use App\Group;
use DB;


class AdminStudentController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('isadmin');
	}
	
	public function index()
	{
		$users = User::all()->where('is_admin', 0);	
		$groups = Group::all();	
		return view('admin_student', ['users' => $users, 'groups' => $groups]);
	}

	public function remove()
	{
		$id = Request::input('id');
		$users = User::find($id);
		$users->delete();		
	}

	public function update()
	{
		$id = Request::input('id');
		$users = User::find($id);
		$users->name = Request::input('fio');
		$users->login = Request::input('login');
		$users->visible_pass = empty(Request::input('visible_pass')) ? $users->visible_pass : Request::input('visible_pass');
		$users->password = bcrypt($users->visible_pass);
		$users->save();
	}

	public function import()
	{
		if(!Request::hasFile('file'))
		{
			return response()->json(['success' => false, 'message' => 'Файл не указан']);
		}

		$file = Request::file('file');
		$file_path = $file->getPathname();
		$file_name = $file->getClientOriginalName();
  
		set_time_limit(0);

		try
		{
			Import::studentFromTxtString($file);
		
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

}
