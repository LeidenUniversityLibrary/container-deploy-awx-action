<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\App;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     * NOTE: this is ignored while using SAML login. The redirect after the login is set in the .env file:
     * 'SAML2_LOGIN_URL='
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //Override default login form and use ULCN's.
    public function login()
    {
        if(App::isLocal()){
            return redirect(config('app.url'));
        }

        return redirect(config('app.url') . '/saml2/' . config('saml2.uuid') . '/login');
    }


    public function logout()
    {
        if(App::isLocal()){
            return redirect(config('app.url'));
        }

        return redirect(config('app.url') . '/saml2/' . config('saml2.uuid') . '/logout');
    }
}
