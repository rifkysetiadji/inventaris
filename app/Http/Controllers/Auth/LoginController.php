<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {
        $field=$this->field($request);
        $message=[
            "{$this->username()}.exits"=>'Username atau password salah '
        ];
        $request->validate([
            $this->username() => "required|string|exists:users,{$field}",
            'password' => 'required|string',
        ],$message);
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        $field=$this->field($request);
        return [
            $field=>$request->get($this->username()),
            'password'=>$request->get('password')
        ];
    }


    public function field(Request $request){
        $email=$this->username();

        return filter_var($request->get($email),FILTER_VALIDATE_EMAIL) ? $email: 'username';
    }
}
