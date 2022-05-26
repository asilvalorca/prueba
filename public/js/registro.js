$('#edad').on("keypress",function(){
    console.log($(this).val());
});


$("input[name='paises']").on("click",function(){

    if($(this).val()=='SI'){
    $(".valida-8").show();
    }else{
    $(".valida-8").hide();
    }
    });
    $("input[name='escala']").on("click",function(){

    if($(this).val()=='SI'){
    $(".valida-82").show();
    }else{
    $(".valida-82").hide();
    }
    });
    $("input[name='visita_pais']").on("click",function(){

       if($(this).val()=='SI'){
        $(".valida-9").show();
       }else{
        $(".valida-9").hide();
       }
    });
    $("input[name='medico']").on("click",function(){
       if($(this).val()=='SI'){
        $(".valida-11").show();
       }else{
        $(".valida-11").hide();
       }
    });

    $("input[name='positivo']").on("click",function(){
       if($(this).val()=='SI'){
        $(".valida-12").show();
       }else{
        $(".valida-12").hide();
       }
    });

    $("input[name='salud']").on("click",function(){
       if($(this).val()=='SI'){
        $(".valida-13").show();
       }else{
        $(".valida-13").hide();
       }
    });

    $("input[name='riesgo']").on("click",function(){
       if($(this).val()=='SI'){
        $(".valida-15").show();
       }else{
        $(".valida-15").hide();
       }
    });
function clickBoton(){
var pasar = 1;
var texto = '';

    $(".validar").each(function(i,v){

        if($(this).val()==''){
            texto = texto+" Debe Ingresar "+$(this).data("nombre")+"</br>";

             pasar = 0;

        }

    });


    if( pasar == 0){

        Swal.fire({
            icon: 'error',
            title: 'Error',
            html: texto,
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Cerrar'
        }).then((result) => {
            if (result.value) {
                pasar = 0;
                return false;
            }
        });
            return false;
    }
    if($("#declaro").prop('checked')){

    }else{
         pasar = 0;

        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Debe marcar que declara que las respuestas son verídicas !',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Cerrar'
        }).then((result) => {
            if (result.value) {
                 pasar = 0;
                return false;
            }
        });
         pasar = 0;
        return false;
    }

    if( pasar == 0){
        return false;
    }
    sintomas = [];
    eleccion = [];
    $("#visible_envio").hide();
   $("#oculdar_envio").show();
   $("#enviar").prop('disabled', true);
    $("input[name='sintomas[]']").each(function(i,v){
       if($(this).prop('checked') ) {
        sintomas.push($(this).val());
       }else{

       }

   });
   $("input[name='elecccion-riesgo[]']").each(function(i,v){
       if($(this).prop('checked') ) {
        eleccion.push($(this).val());
       }else{

       }

   });

   var data = $("#form1").serializeArray(); // convert form to array
    data.push({name: "sintoma", value: sintomas});
    data.push({name: "eleccion", value: eleccion});
    console.log($("#form1").serializeArray());
    $.ajax({
        url: $("#form1").attr("action"),
        type: "POST",

        data: data,

    }).done(function(resp) {

        $("#visible_envio").show();
        $("#oculdar_envio").hide();
        $("#enviar").prop('disabled', false);
        console.log(resp);
        if (resp["estado"] == 0) {
                console.log("problema de usuario y contraseña");
            } else if (resp["estado"] == 1) {
                Swal.fire({
                    icon: 'success',
                    title: 'exito',
                    text: 'Guardado con exito!',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Cerrar'

                }).then((result) => {
                if (result.value) {
                    location.href = "login";
                }
                })

            } else if (resp["estado"] == 2) {
                console.log("Faltan datos");
            }
        })
        .fail(function(resp) {
            $("#enviar").prop('disabled', false);
            $("#visible_envio").show();
            $("#oculdar_envio").hide();
            Swal.fire({
                icon: 'warning',
                title: 'Problema',
                text: 'avisar al depto de sistemas!',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Cerrar'

            });
        });
}
