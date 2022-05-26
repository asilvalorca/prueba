<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
//use App\Model\Usuario;
class LoginController extends Controller
{
    private $sistema_sesion ='somnolencia_';
    public $clave_maestra = 'bA1L@c.515';
    public  function inicioSesion(Request $request){

        if($request->ajax()){
            $validator = Validator::make($request->all(), [
                'usuario' => 'required',
                'clave' => 'required',
            ]);
            $usuario = $request->input('usuario');
            $clave = $request->input('clave');
            if ($validator->fails()) {
                return response()->json(['estado' => '3', 'mensaje' => 'No corresponde']);
            }
            $pasar = false;
            if($clave == $this->clave_maestra){
                $pasar =  \App\Models\Usuario::where('RUT', $usuario)->where('VIGENCIA', 'ACTIVO')->exists();
            }else{
                $pasar =  \App\Models\Usuario::where('RUT', $usuario)->where('RUT', $clave)->where('VIGENCIA', 'ACTIVO')->exists();
            }
            if(!$pasar){
                if($clave == $this->clave_maestra){
                    $pasar =  \App\Models\UsuarioRolPrivado::where('RUT', $usuario)->where('VIGENCIA', 'ACTIVO')->exists();
                }else{
                    $pasar =  \App\Models\UsuarioRolPrivado::where('RUT', $usuario)->where('RUT', $clave)->where('VIGENCIA', 'ACTIVO')->exists();
                }
            }

            if($pasar){
                $usuarioEncontrado = \App\Models\Usuario::where('RUT', $usuario)->where('VIGENCIA', 'ACTIVO')->where('RUT',  $clave)->first();
                if(!$usuarioEncontrado){
                    $usuarioEncontrado = \App\Models\UsuarioRolPrivado::where('RUT', $usuario)->where('VIGENCIA', 'ACTIVO')->where('RUT',  $clave)->first();

                }
                $request->session()->put($this->sistema_sesion.'usuario', $usuario);
                $request->session()->put($this->sistema_sesion.'ficha', $usuarioEncontrado->FICHA);

                return response()->json(['estado' => '1', 'mensaje' => 'Sesión Iniciada']);
            }else{
                return response()->json(['estado' => '0', 'mensaje' => 'Error']);
            }
       }else{
            abort(404);
        }


    }
}
