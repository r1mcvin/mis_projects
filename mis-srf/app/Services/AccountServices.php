<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountServices {
	public function auth($username, $password)
	{
		$user = User::where('username', $username)->first();

		if (! $user || !Hash::check($password, $user->password))
		{
			return ['error' => 'Username or Password is incorrect!'];
		}

		$this->create_token($user);
		Auth::login($user);

		session(['department' => $user->department]);
		return ['success' => 'successfully logged in!'];
	}

	public function create_token($user)
	{
		$token = str_shuffle('AEUz!23#o-=Xe823');

		$token_collections = User::where('remember_token', 'like', $token.'%');

		do {
			$token = $token;
		} while ($token_collections->contains($token));

		$user->update(['remember_token' => $token]);
	}

	public function register($data)
	{
		$user = User::where('username', $data['username'])->first();

		if ($user)
		{
			return ['error' => 'Username already exists, please choose another one!'];
		}

		User::create([
			'username' => $data['username'],
			'password' => Hash::make($data['password']),
			'department_id' => $data['department_id'],
			'technician_id' => ($data['technician_id']) ? $data['technician_id'] : null,
			'user_type' => $data['data_type'], 
		]);

		return ['success' => 'Account has been successfully registered!'];
	}
}