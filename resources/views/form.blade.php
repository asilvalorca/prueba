<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Somnolencia Candelaria</title>

    <!-- <link rel="stylesheet" type="text/css" href="login_2/vendor/bootstrap/css/bootstrap.min.css" >
  -->  <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert2.min.css') }}">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!--  <script src="https://code.jquery.com/jquery-3.x-git.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
-->
<script>


function clickBoton() {
        var pasar = 1;
        var texto = "";



        $(".validar").each(function (i, v) {
            if ($(this).val() == "") {
                texto =
                    texto +
                    " Debe Ingresar " +
                    $(this).data("nombre") +
                    "</br>";

                pasar = 0;
            }
        });

        if (pasar == 0) {
          $("#contenido_modal").html(texto);
          $("#modal_alert").modal("show");
          $("#aceptar_modal").hide();
            return false;
        }


        if ($("#declaro").prop("checked")) {
        } else {
            pasar = 0;
            $("#contenido_modal").html("Debe marcar que declara que las respuestas son verídicas !");
             $("#modal_alert").modal("show");
             $("#aceptar_modal").hide();

            pasar = 0;
            return false;
        }

        if (pasar == 0) {
            return false;
        }

        $("#visible_envio").hide();
        $("#oculdar_envio").show();
        $("#enviar").prop("disabled", true);


        var data = $("#form1").serializeArray(); // convert form to array

        console.log($("#form1").serializeArray());
        $.ajax({
            url: $("#form1").attr("action"),
            type: "POST",

            data: data,
        })
            .done(function (resp) {
                $("#visible_envio").show();
                $("#oculdar_envio").hide();
                $("#enviar").prop("disabled", false);
                console.log(resp);
                if (resp["estado"] == 0) {
                    console.log("problema de usuario y contraseña");
                } else if (resp["estado"] == 1) {
                  $("#contenido_modal").html("Guardado con exito");
                  $("#cerrar_modal").hide();
                  $("#aceptar_modal").show();
                  $("#modal_alert").modal("show");
                  $("#titulo_modal").html("Exito")

                } else if (resp["estado"] == 2) {
                    console.log("Faltan datos");
                }
            })
            .fail(function (resp) {
                console.log(resp);
                $("#enviar").prop("disabled", false);
                $("#visible_envio").show();
                $("#oculdar_envio").hide();

                $("#contenido_modal").html("avisar al depto de sistemas!");
                $("#aceptar_modal").hide();
                  $("#modal_alert").modal("show");
                });
    }
</script>
</head>

<body>

    <div class="container">
        <div class="row">
            <img src="{{  asset('img/logo_bailac-1-1030x135.png') }}" style="width: 30%"  >

        </div>
        <div class="row ">
            <div class="col-sm-8">
                <div style="text-align: center;"><h2>Formulario de Autoevaluación de Somnolencia</h2></div>
            </div>
        </div>


        <div class="col-sm-8">
            <div style="text-align: center; "><h2>Bailac Candelaria</h2></div>
        </div>
        <div class="row">
        <form id='form1' method="post" class="wpcf7-form"  action="{{route('guardarinforme')}}">
          <div class="col-sm-8">
            <label for="validationTooltip01">1.- Fecha(*)</label>
            <input type="text" class="form-control" name="fecha1" readonly value="{{ $fecha }}"  >
          </div>
          <div class="col-sm-8">
          </br>
            <label for="rut-trabajador">2.- RUT (sin puntos, sin guión)</label>
            <input type="text" class="form-control" name="rut-trabajador" readonly value="{{ $rut }}" >
          </div>
          <div class="col-sm-8">
        </br>
            <label for="nombre">3.- Nombre</label>
            <input type="text" class="form-control" name="Nombre" id='Nombre' readonly value="{{ $nombre }}" >
          </div>
          <div class="col-sm-8">
        </br>
            <label for="validationTooltip01">4.- Correo</label>
            <input type="text" class="form-control " data-nombre="Correo"  name="your-email"  value="{{ $correo }}" >
          </div>
          <div class="col-sm-8">
        </br>
            <label for="validationTooltip01">5.- Edad(*)</label>
            <input type="number" name="edad" value="" data-nombre='Edad' class="validar form-control">
          </div>

          <div class="col-sm-8">
        </br>
            <label for="validationTooltip01">6.- Cargo</label>
             <input type="hidden" name="id_anegocio" value="{{ $id_anegocio }}" >
            <input type="text" class="form-control" name="cargo" readonly value="{{ $cargo }}">
          </div>
          <div class="col-sm-8">
        </br>
            <label for="validationTooltip01">7.- Turno</label>
            <select name="turno" value="" data-nombre='Turno' class="validar form-control">
                <option value=''>Seleccionar Turno</option>
                <option value='Turno dia'>Turno Día</option>
                <option value='Turno noche'>Turno Noche</option>
            </select>
        </div>
          <div class="col-sm-8">
            </br>
            <label for="validationTooltip01">8.- Faena</label>
            <input type="text" class="form-control"name="anegocio" readonly value="{{ $anegocio }}">
          </div>
          <div class="col-sm-8">
            </br>
            <label for="validationTooltip01">9.- ¿Siente la vista cansada? Siente picazón, lagrimeo y pesadez en los párpados</label>
          </div>
          <div class="col-sm-8">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="vista_cansada" checked id="vista_cansada_no" value="NO">
              <label class="form-check-label" for="vista_cansada_no">NO</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="vista_cansada" id="vista_cansada_si" value="SI">
              <label class="form-check-label" for="vista_cansada_si">SI</label>
            </div>
          </div>

          <div class="col-sm-8">
            </br>
            <label for="validationTooltip01">10.- ¿Siente rigidez o torpeza en los movimientos? Percibe sus movimientos lentos, su reacción es más lenta de lo habitual. </label>

          </div>

          <div class="col-sm-8">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="rigidez_movimientos" checked id="rigidez_movimientos_no" value="NO">
              <label class="form-check-label" for="rigidez_movimientos_no">NO</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="rigidez_movimientos"  id="rigidez_movimientos_si" value="SI">
              <label class="form-check-label" for="rigidez_movimientos_si">SI</label>
            </div>
          </div>


          <div class="col-sm-8">
        </br>
        <label for="validationTooltip01">11.- ¿Se siente poco firme o inseguro al estar de pie? Sensación de mareo o pérdida de equilibrio </label>

      </div>

      <div class="col-sm-8">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="poca_firmeza" checked id="poca_firmeza_no" value="NO">
          <label class="form-check-label" for="poca_firmeza_no">NO</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="poca_firmeza"  id="poca_firmeza_si" value="SI">
          <label class="form-check-label" for="poca_firmeza_si">SI</label>
        </div>
      </div>

          <div class="col-sm-8">
        </br>
            <label for="validationTooltip01">12.- ¿Tiene cansancio en las piernas? Sensación de pesadez en las piernas, calambres o falta de equilibrio</label>

          </div>

          <div class="col-sm-8">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="cansancio_piernas" checked id="cansancio_piernas_no" value="NO">
              <label class="form-check-label" for="inlineRadio1">NO</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="cansancio_piernas"  id="cansancio_piernas_si" value="SI">
              <label class="form-check-label" for="cansancio_piernas_si">SI</label>
            </div>
          </div>
          <div class="col-sm-8">
        </br>
            <label for="validationTooltip01">13.- ¿Previo al turno durmió menos de 5 horas? Evidencia de somnolencia por falta de sueño</label>

          </div>

          <div class="col-sm-8">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="durmio_menos" checked id="durmio_menos_no" value="NO">
              <label class="form-check-label" for="inlineRadio1">NO</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="durmio_menos"  id="durmio_menos_si" value="SI">
              <label class="form-check-label" for="durmio_menos_si">SI</label>
            </div>
          </div>

          <div class="col-sm-8">
        </br>
            <label for="validationTooltip01">14.- ¿Se siente mareado? Inestabilidad evidente al estar de pie o sentado</label>
          </div>
          <div class="col-sm-8">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="mareado" checked id="mareado_no" value="NO">
                <label class="form-check-label" for="mareado_no">NO</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="mareado" id="mareado_si" value="SI">
                <label class="form-check-label" for="mareado_si">SI</label>
              </div>
           </div>

           <div class="col-sm-8">
               </br>
            <label for="validationTooltip01">15.- ¿Usted ha realizado actividad física más de lo habitual previo a su turno de trabajo? Evidencia de ejercicio físico intenso previo al ingreso al turno o trabajo físico extra laboral.</label>
          </div>
          <div class="col-sm-8">

              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="actividad_fisica" checked id="actividad_fisica_no" value="NO">
                <label class="form-check-label" for="actividad_fisica_no">NO</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="actividad_fisica"   id="actividad_fisica_no" value="SI">
                <label class="form-check-label" for="actividad_fisica_si">SI</label>
              </div>
           </div>
           <div class="col-sm-8">
           </br>
            <label for="validationTooltip01">16.- ¿Siente pesadez en la cabeza? Percepción de embobamiento e incomodidad en la cabeza</label>
          </div>
          <div class="col-sm-8">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="pesadez_cabeza" checked id="pesadez_cabeza_no" value="NO">
                <label class="form-check-label" for="pesadez_cabeza_no">NO</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="pesadez_cabeza" id="pesadez_cabeza_si" value="SI">
                <label class="form-check-label" for="pesadez_cabeza_si">SI</label>
              </div>
           </div>
           <div class="col-sm-8">
        </br>
         <label for="validationTooltip01">17.- ¿Siente los hombros entumecidos? Sensación de frio en los hombros</label>
       </div>
       <div class="col-sm-8">
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="radio" name="hombros_entumecidos" checked id="hombros_entumecidos_no" value="NO">
             <label class="form-check-label" for="hombros_entumecidos_no">NO</label>
           </div>
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="radio" name="hombros_entumecidos" id="hombros_entumecidos_si" value="SI">
             <label class="form-check-label" for="hombros_entumecidos_si">SI</label>
           </div>
        </div>

        <div class="col-sm-8">
        </br>
         <label for="validationTooltip01">18.- ¿Se siente mal? Percepción de malestar y decaimiento general</label>
       </div>
       <div class="col-sm-8">
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="radio" name="siente_mal" checked id="siente_mal_no" value="NO">
             <label class="form-check-label" for="siente_mal_no">NO</label>
           </div>
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="radio" name="siente_mal" id="siente_mal_si" value="SI">
             <label class="form-check-label" for="siente_mal_si">SI</label>
           </div>
        </div>



          <div class="col-sm-8">
        </br>
            <label for="validationTooltip01">Dirección (Hogar)(*)</label>
            <input type="text" class="form-control validar" name="direccion"  data-nombre='Dirección' >
          </div>
          <div class="col-sm-8">
        </br>
            <label for="validationTooltip01">Ciudad(*)</label>
            <input type="text" class="form-control validar"  name="ciudad"  data-nombre='Ciudad' >
          </div>
          <div class="col-sm-8">
        </br>
            <label for="validationTooltip01">Telefono Contacto(*)</label>
            <input type="text" class="form-control validar" type="tel" name="telefono" data-nombre='Teléfono' >
          </div>
          <div class="col-sm-8">
          </br>
         </div>

         <div class="col-sm-12">
           <img src="{{asset('img/Imagen1.jpg')}}" alt="" width="100%">
          </div>
          <div class="col-sm-8">
            *Campos obligatorios
          </div>
          <div class="col-sm-8">
        </br>
           {{--  <p><label> Si contestó "SI" a cualquiera de las preguntas 8, 9, 10, 12, 13 y 15, no debe trasladarse a su lugar de trabajo, y debe tomar contacto en forma inmediata con su supervisor.</label></p> --}}
            <div><label> Declaro que las respuestas son verídicas de acuerdo con mi conocimiento</label></div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="declaro" name="declaro">

              </div>
            </br>
        </br>
              <p><button type="button"  class="btn" id="enviar" onclick="clickBoton()" style='border-style: solid;
        border-top-width: 0;
        border-right-width: 0;
        border-left-width: 0;
        border-bottom-width: 0;
        color: #ffffff;
        border-color: #cea42f;
        background-color: #cea42f;
        border-radius: 2px;
        padding-top: 10px;
        padding-right: 40px;
        padding-bottom: 10px;
        padding-left: 40px;
        font-family: inherit;
        font-weight: inherit;
        line-height: 1;'>  <span id='visible_envio'>Enviar</span>
        <span id='oculdar_envio' style='display:none'><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
  Cargando...</span></button>
          </div>
        </form>
      </div>
    </div>
     <script src="{{  asset('login_2/vendor/jquery/jquery-3.2.1.min.js') }}" ></script>
     <script src="login_2/vendor/bootstrap/js/popper.js" ></script>
      <script src="login_2/vendor/bootstrap/js/bootstrap.min.js" ></script>
     <!--<script src="{{  asset('js/sweetalert2.min.js') }}" ></script>
  ===============================================================================================

    <!--===============================================================================================
      <script src="login_2/vendor/bootstrap/js/popper.js" ></script>
      <script src="login_2/vendor/bootstrap/js/bootstrap.min.js" ></script>

    <!--<script src="{{  asset('js/registro.js') }}"></script>-->
    <script>
  $(document).ready(function () {

      if($("#ventana_mensaje").val()==0){
        $("#modal_mensaje").modal("show");
      }
      $("#entendido").on("click",function(){
        $.ajax({
            url: 'marcarmensaje',
            type: "POST",

        }).done(function(resp){
            console.log(resp);
            $("#modal_mensaje").modal("hide");
        })
      });
    $("#cerrar_modal").on("click",function(){
      $("#modal_alert").modal("hide");
    });
    $("#aceptar_modal").on("click",function(){
      location.href = "login";
    });


    $("#edad").on("keypress", function () {
        console.log($(this).val());
    });




  });
    </script>
<div class="modal fade" id="modal_alert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alerta</h5>

          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
      <div  style="text-align: center;"><h1 id='titulo_modal'>Error</h1></div>
      </br>
      </br>
      <div id='contenido_modal'></div>
      </div>
      </br>
      </br>
      <div class="modal-footer">

        <button type="button" id="cerrar_modal" class="btn btn-primary">Cerrar</button>
        <button type="button" id="aceptar_modal" class="btn btn-primary">Aceptar</button>
      </div>
    </div>
  </div>
</div>
{{-- <input type='hidden' id='ventana_mensaje' value="{{ $mensaje_leido }}"> --}}
<div class="modal hide fade" id="modal_mensaje" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Aviso</h5>


        </div>
        <div class="modal-body" >
        <!--<div  style="text-align: center;"><h1 id='titulo_modal'>Error</h1></div>-->
        </br>
        </br>
        {{-- <div id='contenido_modal'>{{ $texto_mensaje}}</div> --}}
        </div>
        </br>
        </br>
        <div class="modal-footer">


          <button type="button" id="entendido" class="btn btn-primary">Entendido</button>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
