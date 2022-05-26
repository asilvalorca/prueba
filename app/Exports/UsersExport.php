<?php

namespace App\Exports;

use App\Models\Registro;

use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection,WithHeadings
{
    public function headings(): array
    {


       /* return [
            'Fecha',
            'Rut',
            'Nombre',
            'Email',
            'Edad',
            'Cargo',
            'Faena',
            'Ha Visitado otro Pais',
            'Pais ha visitado',
            'Hizo escala en otro pais',
            'Pais Escala',
            'Se encuentra de visita en el pais',
            'Pais Procedencia',
            'Fecha Llegada',
            'Sintomas',
            'Ha visitado medico',
            'Tratamiento medico',
            'Contacto cercano positivo',
            'Contacto personal area salud',
            'Se ha movilizado en transporte publico',
            'Pertenece a grupo de riesgo',
            'Grupo de riesgo',
            'Direccion',
            'Ciudad',
            'Telefono',
            'Declaro',
            'Hora Envio',

        ];
        */
        return [
            'Fecha',
            'Rut',
            'Nombre',
            'Email',
            'Edad',
            'Cargo',
            'Faena',
            'Turno',
            'Tiene vista cansada',
            'Rigidez o torpeza en los movimientos',
            'Siente poco firme o inseguro al estar de pie',
            'Cansancio en las piernas',
            'Durmió menos de 5 horas',
            'Se siente mareado',
            'Ha realizado actividad física más de lo habitual',
            'Pesadez en la cabeza',
            'Hombros entumecidos',
            'Se siente mal',
            'Direccion',
            'Ciudad',
            'Telefono',
            'Hora Envio',

        ];

    }
    public function collection()
    {

        $now = new \DateTime();
        $now =  $now->format('Y-m-d');
        $nuevafecha = strtotime ( '-1 day' , strtotime ( $now ) ) ;
        $nuevafecha = date ( 'Y-m-d' , $nuevafecha );

        $registros = DB::table('somnolencia_registro AS r')
                        ->join('somnolencia_trabajador AS t', 't.RUT', '=', 'r.rut')
                        ->join('somnolencia_anegocio AS a', 'r.id_anegocio', '=', 'a.ID_ANEGOCIO')
                        ->select('r.fecha', 'r.rut', DB::raw('CONCAT(t.NOMBRE," ",t.APELLIDO_PATERNO," ",t.APELLIDO_MATERNO) as NOMBRE'),
                                    'r.correo','r.edad','t.CARGO', 'a.NOMBRE_ANEGOCIO' ,'r.turno','r.vista_cansada' ,'r.rigidez_movimientos' ,'r.poca_firmeza' ,
                                    'r.cansancio_piernas' ,'r.durmio_menos' ,'r.mareado' ,'r.actividad_fisica'  ,'r.pesadez_cabeza' , 'r.hombros_entumecidos', 'r.siente_mal','r.direccion','r.ciudad','r.telefono','r.fecha_creacion'
                            )
                            ->where('r.fecha', '>=', $nuevafecha)
                            ->where('t.VIGENCIA', '=', 'ACTIVO')
                        ->get();

         return $registros;

    }
}
