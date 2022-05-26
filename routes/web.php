<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
   // return view('welcome');
    return view('login2');
});

Route::get('login', function () {
    //return view('welcome');
    return view('login2');
});
Route::get('/descargarexcel', function () {
    //return view('welcome');
    return view('excel');
});

Route::get('/mail', function () {
    /*//return view('welcome');
    $data['nombre'] = 'Andres Silva';
    $data['sintomas'] = 'tos';
    $data['nombre']= 'tos';
    $data['rut']= 'tos';
    $data['anegocio']= 'tos';
    $data['sintomas'] = 'tos';
    $to = [['email' => 'andres.silva@bailac.cl', 'name' => 'gmail'],
       ['email' => 'a.silvalorca@gmail.com', 'name' => 'bailac']];
 Mail::to($to)
        ->send(new \App\Mail\EnvioCorreo($data));
        */
        $arrayCorreo = array();
    $correos = \App\Models\EnvioCorreo::where('ID_ANEGOCIO', 22)->where('ESTADO', 1)->get();
            foreach($correos as $correo){
                array_push($arrayCorreo, array("email"=> $correo->CORREO, "name"=> $correo->NOMBRE));
    }
    print_r($arrayCorreo);

});
Route::get('/excel','RegistroController@excel')->name("excel");
Route::get('/excel2','RegistroController@excel2')->name("excel2");
Route::get('/registro','RegistroController@index')->name("registro");
Route::post('/guardarinforme','RegistroController@guardarInforme')->name("guardarinforme");
Route::post('/marcarmensaje','RegistroController@marcarMensaje')->name("marcarMensaje");
Route::post('/login/sesion', 'LoginController@inicioSesion')->name("sesion");

Route::get('/prueba','InicioController@prueba')->name("prueba");
Route::get('/iniciosesion','UsuarioController@inicioSesion')->name("inicioSesion");
