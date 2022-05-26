<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnvioCorreo extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $nombre;
    public $rut;
    public $edad;
    public $cargo;
    public $anegocio;
    public $correo;
    public $paises;
    public $cual_pais;
    public $escala;
    public $escala_pais;
    public $visita_pais;
    public $medico;
    public $procedencia;
    public $tratamiento;
    public $fecha_procedencia;
    public $diagnostico;
    public $direccion;
    public $telefono;
    public $positivo;
    public $salud;
    public $riesgo;
    public $sintomas;
    public $ciudad;
    public $transporte;
    public $tipo;

    public $contacto_pcr;
    public $miembro_familia_pcr;
    public $alerta_covid;

    public function __construct($data)
    {
       $this->nombre = $data['nombre'];
       $this->rut = $data['rut'];
       $this->edad = $data['edad'];
       $this->cargo = $data['cargo'];
       $this->correo = $data['correo'];
       $this->anegocio = $data['anegocio'];
       $this->paises = $data['paises'];
       $this->cual_pais = $data['cual_pais'];
       $this->escala = $data['escala'];
       $this->escala_pais = $data['escala_pais'];
       $this->visita_pais = $data['visita_pais'];
       $this->medico = $data['medico'];
       $this->tratamiento = $data['tratamiento'];
       $this->procedencia = $data['procedencia'];
       $this->sintomas = $data['sintomas'];
       $this->fecha_procedencia = $data['fecha_procedencia'];
       $this->diagnostico = $data['diagnostico'];
       $this->telefono = $data['telefono'];
       $this->positivo = $data['positivo'];
       $this->salud = $data['salud'];
       $this->ciudad = $data['ciudad'];
       $this->direccion = $data['direccion'];
       $this->riesgo = $data['riesgo'];
       $this->transporte = $data['transporte'];
       $this->tipo = $data['tipo'];
       $this->contacto_pcr = $data['contacto_pcr'];
       $this->miembro_familia_pcr = $data['miembro_familia_pcr'];
       $this->alerta_covid = $data['alerta_covid'];
    }



    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->tipo ==1){
            return $this->view('emails.mensajeusuario2')
        ->from('sigecasso@bailac.cl', 'Sigecasso')
        ->subject("Respaldo Encuesta Covid-19 Bailac San Ltda");

        }else if($this->tipo ==2){
            return $this->view('emails.mensaje2')
        ->from('sigecasso@bailac.cl', 'Sigecasso')
        ->subject("Alerta de encuesta electrónica Covid-19");
        }

    }
}
