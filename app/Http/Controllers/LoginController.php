<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    public function store (Request $request){
        //Validar información recolectada
        $mesagges = makeMessages();

        $this->validate($request,[
            'correo'=> ['required','email'],
            'contrasena'=> ['required']
        ],$mesagges);

        auth()->logout();

        if (!auth()->attempt(['email'=>$request->correo, 'password'=>$request->contrasena])){
            return back()->with('message','ingrese un correo para iniciar sesion');
        }
        return view('home');
    }

}
