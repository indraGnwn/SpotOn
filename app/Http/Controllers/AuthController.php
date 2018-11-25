<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class AuthController extends Controller 
{
	/**
	* Login
	*/
	public function login(Request $request)
	{	
		$email = $request->input('email');
		$password = $request->input('password');
		$user = User::where('email', $email)->first();

		if(Hash::check($password, $user->password))
		{
			$api_token = base64_encode(str_random(40));

			$user->update([
				'api_token'=> $api_token
			]);

			return response()->json([
				'success' => true,
				'message' => 'Login Success!',
				'data' => [
					'user' => $user,
					'api_token' => $api_token
				]
			]);

		}else{
			return response()->json([
				'success' => false,
				'message' => 'Login Fail!'
			]);
		}
	}

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
            return response($res);
        }
	}

}

 ?>