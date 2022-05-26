<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;


class RegistroController extends Controller
{
    private $sistema_sesion ='somnolencia_';
    public function index(){
        if( session($this->sistema_sesion.'usuario')!='' ){
            $cantidadUsuarios = DB::table('somnolencia_trabajador AS t')
            ->join('somnolencia_anegocio AS a', 't.NUM_ANEGOCIO', '=', 'a.NUM_ANEGOCIO')
            ->where('RUT', 'like',session($this->sistema_sesion.'usuario'))
            ->where('VIGENCIA', 'like','ACTIVO')
            ->orderBy('t.FECHA_INICIO', 'desc')
            ->limit(1)
            ->count();

            if($cantidadUsuarios == 0){
                abort(401);
            }

            $trabajadores = DB::table('somnolencia_trabajador AS t')
            ->join('somnolencia_anegocio AS a', 't.NUM_ANEGOCIO', '=', 'a.NUM_ANEGOCIO')
            ->where('RUT', 'like',session($this->sistema_sesion.'usuario'))
            ->where('VIGENCIA', 'like','ACTIVO')
            ->orderBy('t.FECHA_INICIO', 'desc')
            ->limit(1)
            ->get();



            foreach($trabajadores as $trabajador){
                $data['nombre'] = $trabajador->NOMBRE." ".$trabajador->APELLIDO_PATERNO." ".$trabajador->APELLIDO_MATERNO;
                $data['cargo'] = $trabajador->CARGO;
                $data['rut'] = $trabajador->RUT;
                $data['anegocio'] = $trabajador->NOMBRE_ANEGOCIO;
                $data['id_anegocio'] = $trabajador->ID_ANEGOCIO;
                $data['correo'] = $trabajador->CORREO;
                $data['vacuna'] = "";
                $data['fecha_vacuna'] = "";
                $data['tipo_vacuna'] = "";

            }

           // print_r($data);

            $now = new \DateTime();
            $data['fecha'] =  $now->format('d-m-Y');
            $data['fecha_max'] =  $now->format('Y-m-d');
            return view('form',  $data);
        }else{
            abort(404);
        }

    }

    public function guardarInforme(request $request){

        $registro = new \App\Models\Registro;

        $registro->rut = $request->input('rut-trabajador');
        $registro->id_anegocio = $request->input('id_anegocio');
        $registro->edad = $request->input('edad');
        $registro->correo = $request->input('your-email');
        $registro->turno = $request->input('turno');
        $registro->vista_cansada = $request->input('vista_cansada');
        $registro->rigidez_movimientos = $request->input('rigidez_movimientos');
        $registro->poca_firmeza = $request->input('poca_firmeza');
        $registro->cansancio_piernas = $request->input('cansancio_piernas');
        $registro->durmio_menos = $request->input('durmio_menos');
        $registro->mareado = $request->input('mareado');
        $registro->actividad_fisica = $request->input('actividad_fisica');
        $registro->pesadez_cabeza = $request->input('pesadez_cabeza');
        $registro->hombros_entumecidos = $request->input('hombros_entumecidos');
        $registro->siente_mal = $request->input('siente_mal');
        $registro->direccion = $request->input('direccion');
        $registro->telefono = $request->input('telefono');
        $registro->ciudad = $request->input('ciudad');
        $registro->declaro = $request->input('declaro');
       // $fecha_vacuna = explode("-",$request->input('fecha_vacuna'));
        //$registro->fecha_vacuna = $fecha_vacuna[2]."-".$fecha_vacuna[1]."-".$fecha_vacuna[0];

        $registro->fecha = now();
        $registro->fecha_creacion = now();


        $data = array();

        $trabajadores = DB::table('somnolencia_trabajador AS t')
        ->join('somnolencia_anegocio AS a', 't.NUM_ANEGOCIO', '=', 'a.NUM_ANEGOCIO')
        ->where('RUT', 'like',session($this->sistema_sesion.'usuario'))
        ->get();


        foreach($trabajadores as $trabajador){
            $data['nombre'] = $trabajador->NOMBRE." ".$trabajador->APELLIDO_PATERNO." ".$trabajador->APELLIDO_MATERNO;
            $data['cargo'] = $trabajador->CARGO;
            $data['rut'] = $trabajador->RUT;
            $data['anegocio'] = $trabajador->NOMBRE_ANEGOCIO;
            $data['id_anegocio'] = $trabajador->ID_ANEGOCIO;
            $data['correo'] = $trabajador->CORREO;

        }
        if($request->input('your-email')!=''){
            $data['correo'] = $request->input('your-email');
            $data['tipo'] = 1;
        }

        $data['edad'] = $request->input('edad');
        $data['turno'] = $request->input('turno');
        $data['vista_cansada'] = $request->input('vista_cansada');
        $data['rigidez_movimientos'] = $request->input('rigidez_movimientos');
        $data['poca_firmeza'] = $request->input('poca_firmeza');
        $data['cansancio_piernas'] = $request->input('cansancio_piernas');
        $data['durmio_menos'] = $request->input('durmio_menos');
        $data['mareado'] = $request->input('mareado');
        $data['actividad_fisica'] = $request->input('actividad_fisica');
        $data['pesadez_cabeza'] = $request->input('pesadez_cabeza');
        $data['hombros_entumecidos'] = $request->input('hombros_entumecidos');
        $data['siente_mal'] = $request->input('siente_mal');


        $arrayCorreo = array();

            $data['tipo'] = 1;
            if($data['correo']!=''){
                $to =  [['email' => $data['correo'], 'name' =>  $data['nombre']]];
                $cco = [      ['email' => 'basura@sistemas.bailac.cl', 'name' => 'Andres Silva'],
                        ];
            }else{
                $to = [
                         ['email' => 'basura@sistemas.bailac.cl', 'name' => 'Andres Silva'],
                        ];
                $cco = [
                ['email' => 'basura@sistemas.bailac.cl', 'name' => 'Andres Silva'],
                ];
            }




            /*
            Mail::to($to)
             ->bcc($cco)
            ->send(new \App\Mail\EnvioCorreo($data));

            $arrayCorreo2 = array();
            $Guardias = DB::table('covid_guardias')
            ->where('rut', 'like',session($this->sistema_sesion.'usuario'))
            ->get();
            if(count($Guardias)>0){
                foreach($Guardias as $guardia){

                    $arrayCorreo2 = array("nombre" => $guardia->nombre, "correo" =>$guardia->correo);
                }

            }



        if( $request->input('sintoma') or $request->input('contacto_pcr')=='SI' or $request->input('alerta_covid')=='SI' or $request->input('miembro_familia_pcr')=='SI' or $request->input('cual_pais') or $request->input('escala_pais') or $request->input('procedencia') or $request->input('positivo')=='SI' or $request->input('salud')=='SI'){
            //$data['sintomas'] = implode(", ", $request->input('sintomas'));
            $data['tipo'] = 2;

            $correos = \App\Models\EnvioCorreo::where('ID_ANEGOCIO', $request->input('id_anegocio'))->where('ESTADO', 1)->get();
            //if (count(correos)
            foreach($correos as $correo){
                array_push($arrayCorreo, array("email"=> $correo->CORREO, "name"=> $correo->NOMBRE));
            }




            if(count($arrayCorreo2) > 0 ){
                //array_push($arrayCorreo, array("email"=> 'a.silvalorca@gmail.com', "name"=> 'ane'));
                array_push($arrayCorreo, array("email"=> $arrayCorreo2['correo'], "name"=> $arrayCorreo2['nombre']));
            }else{
                $correosFijos = \App\Models\CorreoFijo::where('estado', 1)->get();
                foreach($correosFijos as $correoFijo){
                    array_push($arrayCorreo, array("email"=> $correoFijo->correo, "name"=> $correoFijo->nombre));
                }
               // array_push($arrayCorreo, array("email"=> 'cristian.manriquez@bailac.cl', "name"=> 'Cristian Manriquez'));
                //array_push($arrayCorreo, array("email"=> 'bernardo.jimenez@bailac.cl', "name"=> 'Bernardo  Jimenez'));
                //array_push($arrayCorreo, array("email"=> 'mariafabiola.romero@bailac.cl', "name"=> 'Maria Romero'));

            }


            $cco = [['email' => 'rodolfo.zalavari@bailac.cl', 'name' => 'Rodolfo Zalavari'],
            ['email' => 'basura@sistemas.bailac.cl', 'name' => 'Andres Silva'],

                ];


            Mail::to($arrayCorreo)
            ->bcc($cco)
            ->send(new \App\Mail\EnvioCorreo($data));
        }

        */
        if($registro->save()){
            return response()->json(array("estado"=>1,
            "mensaje"=>'Ingresado con exito'));
        }else{
            return response()->json(array("estado"=>0,
            "mensaje"=>'Problema con el ingreso'));
        }

    }

    public  function excel(){
        $now = new \DateTime();
        $now =  $now->format('d-m-Y H:i:s');
      return Excel::download(new UsersExport, 'informe'.$now.'.xlsx');
        //$usersExport = new UsersExport;
    //    return  $usersExport->download('informe'.$now.'.xlsx');
    }
    public  function excel2(){
        $now = new \DateTime();
        $now =  $now->format('d-m-Y');
        $nombre = 'informe'.$now.'xlsx';
        Excel::store(new UsersExport, 'informe.xlsx', 'public');
    }

    public  function correo(){
      Mail::to('andres.silva@bailac.cl');
    }
}
