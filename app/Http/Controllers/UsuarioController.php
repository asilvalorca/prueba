<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    private $sistema_sesion ='combustible_';
    public function cerrarSession(Request $request){
       
        $request->session()->forget(['combustible_id_usuario', 'combustible_usuario']);
        return redirect('/');
    }
    public function inicioSesion(Request $request){
       
       
            $usuario = $request->input('usuario');
            $id = $request->input('id_usuario');
            
            $pasar = false;
         
            $pasar =  \App\Model\Usuario::where('usuario', $usuario)->where('id_user', $id)->where('estado', '1')->exists();
            

            if($pasar){
                
               
                $request->session()->put($this->sistema_sesion.'usuario', $usuario);
                $request->session()->put($this->sistema_sesion.'id_usuario', $id);

                return redirect('/principal');
            }else{
                return redirect('/');
            }
            
    }
}
