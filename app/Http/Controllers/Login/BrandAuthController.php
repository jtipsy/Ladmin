<?php

namespace App\Http\Controllers\Login;

use App\Models\FrontUser;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class BrandAuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectTo = '/37fb591be38db52dd1d5f04b689008f6';
	protected $username = 'username';
    protected $guard = 'front';

    public function __construct()
    {
        $this->middleware('guest:front', ['except' => 'logout']);
        if(isEmail(request('username'))) {
            $this->username = 'email';
        }
    }
	
    public function showLoginForm()
    {
        return view('login.login');
    }
	
}
