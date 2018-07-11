<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Validator;
use App\Models\FrontUser;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectTo = '/37fb591be38db52dd1d5f04b689008f6';
    protected $username = 'username';
    protected $guard = 'front';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:front', ['except' => 'logout']);
       
        if(isEmail(request('username'))) {
            $this->username = 'email';
        }

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
			'name' => 'required|max:255|unique:front_users,username',
            'email' => 'required|email|max:255|unique:front_users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valrid egistration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return FrontUser::create([
            'username' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function createTicket()
    {
        return md5(str_random(10));
    }

}