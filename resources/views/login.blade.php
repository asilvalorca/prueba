<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Somnolencia Candelaria</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.x-git.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="{{  asset('js/login.js') }}"></script>
<meta content="favicon-wi-control.png" id="favicon-normal">
<meta content="favicon-wi-control.png" id="favicon-notification">
<meta content="favicon-wi-control.png" id="favicon-boss-mode">
<link href="{{  asset('img/196x196.png') }}" rel="icon" sizes="192x192">
<link href="{{  asset('img/favicon-sigecasso.png') }}" rel="SHORTCUT ICON">
<link href="{{  asset('img/196x196.png') }}" rel="apple-touch-icon-precomposed">
<style>

body{
    color: #fff;
    background-image: url("{{  asset('img/fondo.jpg') }}"); /* The image used */



  background-repeat: no-repeat; /* Do not repeat the image */

    background-color:rgba(0, 0, 0, 0.48);
    background-size: cover;
/*
    width: 99.9%;
    justify-content: center;
    align-items: center;
    */
}
</style>
</head>
<body >
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-auto">
                <form method="POST" id='form1' action="{{route('sesion')}}" style='background: rgba(0, 0, 0, 0.5)!important;'>
                    </br>
                    </br>
                    </br>
                    </br>
                    </br>
                    </br>
                    <img src="{{  asset('img/logo_bailac-1-1030x135.png') }}" style='display: block;
                        margin-left:auto;margin-right:auto;'  height="57">
                    </br>
                    <p style="font-size:21px" class="text-center">Formulario de Detección  Temprana Covid19 </p>
                    </br>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Usuario</label>
                        <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Ingrese su rut sin puntos ni guion">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="clave" name="clave">
                    </div>
                    </br>
                    </br>
                    <button type="button" class="btn btn-primary" id='enviar' style="display:block; margin:auto;">Acceder al Formulario</button>
                    </br>
                    </br>
                    <p style="font-size:11px" class="text-center">Toda la información ingresada es de caracter confindencial e interno, y no será traspasada a terceras personas. </p>
                    </br>
                    </br>
                    <div style="text-align: center"> <span style="font-size: 10px; color: #fff; text-align: center;"> Desarrollado por Departamento Sistemas Bailac SAN Ltda. Copyright © 2020</span>
                    </div>
                    <div class="row justify-content-md-center">
                        <div class="col col-lg-2">

                            <p style=' text-align: center;'>Sigecasso</p>
                        </div>
                    </div>
                    </br>

                </form>
            </div>
        </div>

    </div>



</body>
