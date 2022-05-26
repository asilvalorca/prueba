


<div>Un trabajador de su unidad de negocio ha indicado en encuesta electrónica Covid-19 un síntoma o condición relacionada a la enfermedad.</div>
<div>Faena o Área Negocio: <span style="color: #3F7FBF">{{ $anegocio }}</span> </div>
<div>Nombre: <span style="color: #3F7FBF"> {{ $nombre }} </span></div>
<div>Telefono: <span style="color: #3F7FBF"> {{ $telefono }} </span></div>
</br>
<div style='margin-top: 20px; font-weight: bold'>Condición Relacionada </div>
@if($cual_pais)
    <div>En los últimos 14 días viajó a otro país:<span style="color: #3F7FBF"> {{ $cual_pais }} </span> </div>
@endif
@if($escala_pais)
    <div>Durante el viaje hizo escala en:<span style="color: #3F7FBF"> {{ $escala_pais }}  </span></div>
@endif
@if($procedencia)
    <div>Se encuentra de visita procedente de: <span style="color: #3F7FBF">{{ $procedencia }} </span> con fecha de llegada: <span style="color: #3F7FBF">{{ $fecha_procedencia }}  </span></div>
@endif
@if($sintomas)
    <div>En los últimos 15 días ha tenido o tiene los siguientes síntomas:  <span style="color: #3F7FBF">{{ $sintomas }} </span> </div>
@endif
@if($diagnostico)
    <div>Consultó un médico y el diagnóstico fue: <span style="color: #3F7FBF"> {{ $diagnostico }} </span> </div>
@endif
@if($salud == 'SI')
    <div>Ha tenido contacto estrecho con personal de salud</div>
@endif
@if($positivo == 'SI')
    <div>Ha tenido contacto con una persona sospechosa o confirmada como positivo para Coronavirus </div>
@endif
@if($alerta_covid == 'SI')
    <div>Ha sido notificado como un caso de ALERTA COVID </div>
@endif

