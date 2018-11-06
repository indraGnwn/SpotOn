<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller 
{
	/**
	* Register new user
	*/
	public function register(Request $request)
	{
		$hasher = app()->make('hash');

		$nama = $request->input('nama');
		$email = $request->input('email');
		$password = $hasher->make($request->input('password'));
		$api_token = sha1(time());

		$register = User::create([
			'nama' => $nama,
			'email' => $email,
			'password' => $password,
			'api_token' => $api_token
		]);

		 if ($register) {
            $res['success'] = true;
            $res['message'] = 'Success register!';
            $res['data'] = $register;
            return response($res);
        }else{
            $res['success'] = false;
            $res['message'] = 'Failed to register!';
            $res['data'] = $register;
            return response($res);
        }
	}
}

 ?>