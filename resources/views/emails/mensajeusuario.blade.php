


<div>Este correo contiene el respaldo de que usted ha generado la encuesta covid-19 Bailac San Ltda. </div>
<div>Fecha: <span style="color: #3F7FBF">{{ now() }}</span> </div>
<div>RUT: <span style="color: #3F7FBF">{{ $rut }}</span> </div>
<div>Nombre: <span style="color: #3F7FBF"> {{ $nombre }} </span></div>
<div>Correo: <span style="color: #3F7FBF"> {{ $correo }} </span></div>
<div>Edad: <span style="color: #3F7FBF"> {{ $edad }} </span></div>
<div>Cargo: <span style="color: #3F7FBF"> {{ $cargo }} </span></div>
<div>Faena o Área Negocio: <span style="color: #3F7FBF">{{ $anegocio }}</span> </div>
<div>Dirección (Hogar): <span style="color: #3F7FBF">{{ $direccion }}</span> </div>
<div>Ciudad: <span style="color: #3F7FBF">{{ $ciudad }}</span> </div>
<div>Teléfono Contacto: <span style="color: #3F7FBF">{{ $telefono }}</span> </div>
<div>En los últimos 14 días viajó a otro país:<span style="color: #3F7FBF"> {{ $paises }} </span> </div>
@if($cual_pais)
    <div>Cuáles?: <span style="color: #3F7FBF"> {{ $cual_pais }} </span> </div>
    <div>Durante su viaje ¿hubo alguna escala en país/ciudad afectada por Coronavirus?: <span style="color: #3F7FBF"> {{ $escala }} </span> </div>
    @if($escala_pais)
        <div>Indique país/ciudad en el cual realizó escala: <span style="color: #3F7FBF"> {{ $escala_pais }} </span> </div>
    @endif
@endif
<div>¿Se encuentra de visita en el país?: <span style="color: #3F7FBF">{{ $visita_pais }}</span> </div>
@if($procedencia)
    <div>Se encuentra de visita procedente de: <span style="color: #3F7FBF">{{ $procedencia }} </span> con fecha de llegada: <span style="color: #3F7FBF">{{ $fecha_procedencia }}  </span></div>
@endif
@if($sintomas)
    <div>En los últimos 15 días ha tenido o tiene los siguientes síntomas:  <span style="color: #3F7FBF">{{ $sintomas }} </span> </div>
@endif
<div>¿Ha consultado algún médico?: <span style="color: #3F7FBF">{{ $medico }}</span> </div>
@if($tratamiento)
    <div>Indique que afección se le diagnosticó y tratamiento: <span style="color: #3F7FBF"> {{ $tratamiento }} </span> </div>
@endif
<div>¿Ha tenido contacto con una persona sospechosa o confirmada como positivo para Coronavirus?: <span style="color: #3F7FBF">{{ $positivo }}</span> </div>
<div>¿Ha tenido contacto estrecho con personal del área de la Salud? Ej. Hermano, esposo(a), hijo(a): <span style="color: #3F7FBF">{{ $salud }}</span> </div>
<div>¿Se ha trasladado en las últimas 24 horas en el transporte público?: <span style="color: #3F7FBF">{{ $transporte }}</span> </div>
<div>¿Usted Pertenece a un grupo de riesgo?: <span style="color: #3F7FBF">{{ $riesgo }}</span> </div>
@if($diagnostico)
    <div>Indique: <span style="color: #3F7FBF"> {{ $diagnostico }} </span> </div>
@endif
