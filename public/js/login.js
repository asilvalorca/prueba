$(document).ready(function(){

    $("#enviar").on("click",function(){
       // alert("enviar");
        $.ajax({
            url: $("#form1").attr("action"),
            type: "POST",

            data: $("#form1").serialize()
        }).done(function(resp) {
            console.log(resp);
                if (resp["estado"] == 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Problema',
                        text: 'Problemas de usuario y/o contraseña!',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Cerrar'

                    });
                    console.log("problema de usuario y contraseña");
                } else if (resp["estado"] == 1) {
                    location.href = "registro";
                } else if (resp["estado"] == 2) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Problema',
                        text: 'Faltan datos!',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Cerrar'

                    });
                    console.log("Faltan datos");
                } else if (resp["estado"] == 3) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Problema',
                        text: 'Faltan datos!',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Cerrar'

                    });
                    console.log("Faltan datos");
                }
            })
            .fail(function(resp) {
                console.log(resp);
            });
    });
});
