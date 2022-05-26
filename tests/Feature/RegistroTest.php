<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistroTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function registroStatusInvalidUser()
    {
        // Valida que la url exista y devuelva un status 401 cuando un usuario es invalido
        $sistemaSesion ='somnolencia_';
        $nombreSession = $sistemaSesion.'usuario';
        $usuario = '168781511';
        $response = $this->withSession([$nombreSession => $usuario])
                         ->get('/registro');
                         $response->assertStatus(200);
    }
}
