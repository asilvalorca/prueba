<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class InicioController extends Controller
{
    private $sistema_sesion ='combustible_';

    public function index(){
        $pasar = false;

       $pasar = \App\Model\Usuario::where('usuario',  session($this->sistema_sesion.'usuario'))->where('id_user', session($this->sistema_sesion.'id_usuario'))->exists();
        if( session($this->sistema_sesion.'usuario')!='' and $pasar){
             return view('inicio');
        }else{
            echo 'no ha iniciado sesion';
            return redirect('/');
        }
    }
    public function dataTablaEquipos(){
       $arg = array();
       $usuario = \App\Model\Usuario::where('id_user', session($this->sistema_sesion.'id_usuario'))->First();
       

        foreach ($usuario->anegocios as $anegocio) {


            foreach($anegocio->equipos as $equipo){
                $ultimo_carguio = DB::connection('mysql')
                ->table('maquinaria_carguio')
                ->where('MAQUINARIA', '=', $equipo->id)
                ->orderBy('FECHA', 'desc')
                ->First();
                $fecha = '';
                $uso_actual = '';
                $carguio = '';
                $cargador = '';
                if( $ultimo_carguio){
                    $fecha = $ultimo_carguio->FECHA;
                    $fecha = explode("-",$fecha);
                     $fecha = $fecha[2]."-".$fecha[1]."-".$fecha[0];
                    $uso_actual = $ultimo_carguio->USO_ACTUAL;
                    $carguio = $ultimo_carguio->CARGUIO;
                   
                    $Personal = DB::connection('compras')
                    ->table('compras_personal')
                    ->where('RUT', 'like', '%'.$ultimo_carguio->CARGADOR.'%')
                    ->First();
                    if($Personal){
                        $cargador = $Personal->NOMBRES." ".$Personal->APELLIDOPAT;
                    }
                }

               $array_equipo = array('patente'=> $equipo->patente,
                                    'marca'=> $equipo->marca,
                                    'modelo'=> $equipo->modelo,
                                    'anegocio'=> $anegocio->anegocio,
                                    'estanque'=> $equipo->capacidad,
                                    'tipo_equipo'=> $equipo->tipoEquipos[0]->tipo,
                                    'id'=> $equipo->id,
                                    'fecha_ultimo_carguio'=> $fecha,
                                    'uso_actual'=> $uso_actual,
                                    'carguio'=> $carguio,
                                    'cargador'=> $cargador,
                                    'nombre'=> $equipo->tipoEquipos[0]->tipo." ".$equipo->marca." ".$equipo->modelo." (".$equipo->patente.")",

                );
                array_push($arg, $array_equipo);
            }
          
        }
        return response()->json($arg);

    }
    public function prueba(){
        $arg = array();
        $usuario = \App\Model\Usuario::where('id_user', 95)->First();


         foreach ($usuario->anegocios as $anegocio) {


             foreach($anegocio->equipos as $equipo){

                $array_equipo = array('patente'=> $equipo->patente,
                                     'marca'=> $equipo->marca,
                                     'modelo'=> $equipo->modelo,
                                     'anegocio'=> $anegocio->anegocio,
                                     'estanque'=> $equipo->capacidad,
                                     'tipo_equipo'=> $equipo->tipoEquipos[0]->tipo,

                 );
                 array_push($arg, $array_equipo);
             }
            return response()->json(array("data"=>$arg));
         }

     }
     public function guardarcarguio(Request $request){
        $arg = array();
        $fecha =  explode("-", $request->input('fecha_carguio'));
        $fecha = $fecha[2]."-".$fecha[1]."-".$fecha[0];
        $id_equipo = $request->input('id_equipo');
        $equipo = \App\Model\Equipo::find($id_equipo);
        $carguio = new \App\Model\Carguio;

        $carguio->MAQUINARIA = $request->input('id_equipo');
        $carguio->RENDIMIENTO = $request->input('rendimiento');
        $carguio->AREA_NEGOCIO = $equipo->anegocio;
        $carguio->CARGUIO = $request->input('cantidad_cargada');
        $carguio->FECHA = $fecha;
        $carguio->INGRESADO = now();
        $carguio->USO_ACTUAL = $request->input('uso_actual');
        $carguio->TIPO_COMPROBANTE = $request->input('tipo_comprobante');
        $carguio->COMPROBANTE = $request->input('comprobante');
        $carguio->PROVEEDOR = $request->input('proveedor');
        $personalSinDigito = substr( $request->input('personal'), 0, -1);
        $carguio->CARGADOR = $personalSinDigito;
        $carguio->FORMA_PAGO = $request->input('forma_pago');
        $carguio->INGRESA = session($this->sistema_sesion.'usuario');
        
        if($carguio->save()){
            return response()->json(array("estado"=>1,
            "mensaje"=>'Ingresado con exito'));
        }else{
            return response()->json(array("estado"=>0,
            "mensaje"=>'Problema con el ingreso'));
        }
     }
}

