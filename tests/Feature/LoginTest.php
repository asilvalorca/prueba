<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    /** @test */
    public function loginStatus(){
        // Valida que la url exista y devuelva un status 200
        echo "\n Debe responder con status 200";
        $response = $this->get('/');
        $response->assertStatus(200);

    }
    /** @test */
    public function loginView(){
        // Valida que la vista exista y corresponda a la del login
         echo "\n Debe tener asignada la vista login2";
        $view = "login2";
        $response = $this->get('/');
        $response->assertViewIs($view);

    }
    /** @test */
    public function chekLoginInput(){
        // Valida que la vista  tenga los inputs correspondientes a los campos de login
        echo "\n Debe tener input de usuario y de password";

       $response = $this->get('/');
       $titulo = "Somnolencia Candelaria";
       $response->assertSeeText($titulo);
       $response->assertSee('<input class="input100" type="text" name="usuario" id="usuario" >');//input de usuario
       $response->assertSee('<input class="input100" type="password" id="clave" name="clave">');//input de clave

   }

   /** @test */
   public function SignInAjax(){
    // Valida que se pueda hacer una peticion ajax para iniciar sesion
        echo "\n Debe retornar un status 200";

        $credentials = [
            "usuario" => "user@mail.com",
            "clave" => null
        ];

        $response = $this->ajaxPost('/login/sesion', $credentials);
        $response->assertStatus(200);
    }

    /** @test */
    public function SignInFail(){
        // Valida que se si la peticion ajax no es correcta no se pueda iniciar sesion

        echo "\n Debe retornar un status 404";

        $credentials = [
            "usuario" => "user@mail.com",
            "clave" => null
        ];
        $response = $this->post('/login/sesion', $credentials);
        $response->assertStatus(404);
    }
    /** @test */
    public function SignInUserVoid(){
        // Valida que el usuario no sea vacio
        echo "\n Debe retornar un array y tener estado valor 3 cuando usuario esta vacio";

        $credentials = [
            "usuario" => null,
            "clave" => ''
        ];

        $response = $this->ajaxPost('/login/sesion', $credentials)->assertStatus(200)->decodeResponseJson();
        $this->assertTrue(is_array($response));
        $this->assertEquals(3, $response['estado']);

        /* ->assertJson([
            'estado' => '3',
            'mensaje' => 'No corresponde',
            'error' => false,
            'message' => 'Some data',
        ]); */

    }
/** @test */
    public function SignInPassVoid(){

         // Valida que la clave no sea vacia
        echo "\n Debe retornar un array y tener estado valor 3 cuando password esta vacia";

        $credentials = [
            "usuario" => 'usuario',
            "clave" => null
        ];

        $response = $this->ajaxPost('/login/sesion', $credentials)->assertStatus(200)->decodeResponseJson();
        $this->assertTrue(is_array($response));
        $this->assertEquals(3, $response['estado']);

        /* ->assertJson([
            'estado' => '3',
            'mensaje' => 'No corresponde',
            'error' => false,
            'message' => 'Some data',
        ]); */
    }


    /** @test */
    public function SignInInvalidUserPass(){
        // Valida que no inicie sesion con usuario y password invalidos
        echo "\n Debe retornar retornar estado 0 y un mensaje de error cuando usuario no es valido";

        $credentials = [
            "usuario" => '168781516',
            "clave" => '168781516'
        ];

        $response = $this->ajaxPost('/login/sesion', $credentials)->assertStatus(200)->decodeResponseJson();
        $this->assertTrue(is_array($response));
        $this->assertEquals(0, $response['estado']);
        $this->assertEquals('Error', $response['mensaje']);


        /* ->assertJson([
            'estado' => '3',
            'mensaje' => 'No corresponde',
            'error' => false,
            'message' => 'Some data',
        ]); */
    }
    /** @test */
    public function SignInValidUserPass(){
    // Valida que  inicie sesion con usuario y password validos
        echo "\n Debe retornar retornar estado 1 y un mensaje sesion iniciada";

        $credentials = [
            "usuario" => '168781512',
            "clave" => '168781512'
        ];

        $response = $this->ajaxPost('/login/sesion', $credentials)->assertStatus(200)->decodeResponseJson();
        $this->assertTrue(is_array($response));
        $this->assertEquals(1, $response['estado']);
        $this->assertEquals('Sesión Iniciada', $response['mensaje']);

    }
}
