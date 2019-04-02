<?php

namespace App\Http\Controllers\Accesos;

use App\Http\Controllers\Controller;
use App\Models\mUsuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class AccesoController extends Controller
{
    //
    public function index()
    {           
        $title = 'Bienvenido';
        
        return view("Login/vbLogin",compact('title'));
    }

    public function acceso(Request $request)
    {           
        $data = request()->all();        
        $usuario = DB::table('user')->where('user_email', $data['user_email'])->value('user_password');
        if (Hash::check($data['user_password'], $usuario)) {
            $login = DB::table('user')->where('user_email', $data['user_email'])->first();
            $request->session()->put('eUsuario', $login);            
            return redirect()->route("unidad_index");
        }
        $data = request()->validate([
            'user_email'=> ['required','email'],
            'user_password'=> 'required'
        ],[
            'user_email.required'=>'el Correo es Obligatorio',
            'user_password.required'=>'el Password es Obligatorio'
        ]);
        return back()->withErrors(['user_email'=>"Estas credenciales no estan en nuestro Registro"]);
    }

    public function cerrar_sesion(Request $request){
        $request->session()->forget('eUsuario');
        return redirect()->route("login_index");        
    }
    
}
