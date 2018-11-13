<?php 

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller 
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	* User has login
	*/
	public function userHasLogin()
	{	
		return response()->json([
			'success' => true,
			'message' => 'Authorized',
			'data' => ''
		]);
	}
}

 ?>