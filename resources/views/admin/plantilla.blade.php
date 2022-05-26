<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>Combustible</title>      
        <meta name="viewport" content="width=device-width, initial-scale=1" />      
        <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}" />
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
         @yield('css')
        <link rel="stylesheet" href="{{ asset('css/sitio.css') }}" />
        <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}" />
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />
    </head>
    <body class="hold-transition sidebar-mini sidebar-collapse">
        <div class="wrapper">
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                @include('admin.baner')
            </nav>
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                @include('admin.menu')
            </aside> 
            <div class="content-wrapper">                
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>@yield('titulo')</h1>
                            </div>
                            <div class="col-sm-6">
                                @yield('miga')
                            </div>
                        </div>
                    </div>
                </section>
                <section class="content">
                    @yield('contenido')                 
                </section>
            </div>         
            <footer class="main-footer">
                @include('admin.footer')
            </footer>
            <aside class="control-sidebar control-sidebar-dark">            
            </aside>
        </div>      
        <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>       
        <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
        <script src="{{ asset('adminlte/dist/js/demo.js') }}"></script>       
        @yield('seccion_script')      
    </body>
</html>
@yield("modal")
