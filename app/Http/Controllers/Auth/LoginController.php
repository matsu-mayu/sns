<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;


class LoginController extends Controller
{
   
    use AuthenticatesUsers;
    
    protected $redirectTo = '/top';
    
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function username()
    {
    //  emailの代わりに使用したいカラム名を指定する
    return 'name';
    }
    
    protected function loggedOut(Request $request) {
        return redirect(route('login'));
    }
}
