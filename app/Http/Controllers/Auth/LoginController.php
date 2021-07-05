<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function email()
    {
        return 'email';
    }

    //FUNCION PARA VERIFICAR CORREO, CONTRASENA Y ESTADO ACTIVO PARA ACCEDER AL SISTEMA
    protected function credentials(Request $request)
    {
        return ['email' => $request->{$this->email()}, 'password' => $request->password, 'estado' => 1];

        if(Auth::attempt( $credentials,false ))
        {
            return back()->withErrors([$this->email()=>'Estas credenciales no concuerdan con nuestros registros']);
        }
    }
    

    //Redirigir segun ROL al dashboard correspondiente
    public function authenticated($request , $user){
        if($user->hasRole('Admin')){
            return redirect()->route('users.activos') ;
        }
        if($user->hasRole('Inspector')){
            return redirect()->route('profile.inspector') ;
        }
        elseif($user->hasRole('Profesor')){
            return redirect()->route('profile.profesor') ;
        }
    }
}
