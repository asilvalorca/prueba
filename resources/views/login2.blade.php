<!DOCTYPE html>
<html lang="en">
<head>
	<title>SigeCasso</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="favicon-wi-control.png" id="favicon-normal">
    <meta content="favicon-wi-control.png" id="favicon-notification">
    <meta content="favicon-wi-control.png" id="favicon-boss-mode">
    <link href="{{  asset('img/196x196.png') }}" rel="icon" sizes="192x192">
    <link href="{{  asset('img/favicon-sigecasso.png') }}" rel="SHORTCUT ICON">
    <link href="{{  asset('img/196x196.png') }}" rel="apple-touch-icon-precomposed">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="login_2/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_2/vendor/bootstrap/css/bootstrap.min.css" >
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_2/fonts/font-awesome-4.7.0/css/font-awesome.min.css"  >
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_2/fonts/iconic/css/material-design-iconic-font.min.css" >
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_2/vendor/animate/animate.css" >
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_2/vendor/css-hamburgers/hamburgers.min.css" >
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_2/vendor/animsition/css/animsition.min.css" >
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_2/vendor/select2/select2.min.css" >
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_2/vendor/daterangepicker/daterangepicker.css" >
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_2/css/util.css" >
	<link rel="stylesheet" type="text/css" href="login_2/css/main.css" >
<!--===============================================================================================-->

</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" id='form1' action="{{route('sesion')}}">
					<span class="login100-form-title p-b-26">
						<img src="login_2/images/logo.png" class="img-fluid" alt="Responsive image">
					</span>
					<span class="login100-form-title p-b-48" >
                        Somnolencia Candelaria
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="usuario" id="usuario" >
						<span class="focus-input100" data-placeholder="Ingrese su rut sin puntos ni guion"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" id="clave" name="clave">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type='button' id='enviar'>
								Acceder al Formulario
							</button>
						</div>
					</div>

					<div class="text-center p-t-115">
						<div  style="font-size: 9px; color:white">Desarrollado por Departamento Sistemas Bailac SAN Ltda.</div>
						<div  style="font-size: 9px; color:white"> Copyright © 2020</div>
					</div>
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="{{  asset('login_2/vendor/jquery/jquery-3.2.1.min.js') }}" ></script>
<!--===============================================================================================-->
	<script src="login_2/vendor/animsition/js/animsition.min.js" ></script>
<!--===============================================================================================-->
	<script src="login_2/vendor/bootstrap/js/popper.js" ></script>
	<script src="login_2/vendor/bootstrap/js/bootstrap.min.js" ></script>
<!--===============================================================================================-->
	<script src="login_2/vendor/select2/select2.min.js" ></script>
<!--===============================================================================================-->
	<script src="login_2/vendor/daterangepicker/moment.min.js" ></script>
	<script src="login_2/vendor/daterangepicker/daterangepicker.js" ></script>
<!--===============================================================================================-->
	<script src="login_2/vendor/countdowntime/countdowntime.js" ></script>
<!--===============================================================================================-->
    <script src="login_2/js/main.js" ></script>
    <script src="{{ asset('js/login.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

</body>
</html>
