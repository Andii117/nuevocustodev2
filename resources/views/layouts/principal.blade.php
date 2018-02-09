<!DOCTYPE html>
{{--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]--}}
{{--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]--}}
{{--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]--}}
{{--[if gt IE 8]><!--}}
<html class="no-js">
<!--<![endif]-->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    {{-- Favicon --}}
    <link rel="shortcut icon" src="{{url('assets/img/logo_empresa.png')}}" type="image/x-icon">
    {{-- Bootstrap core CSS --}}
    {!! Html::style('assets/plugins/bootstrap/css/bootstrap.min.css') !!}
    {{-- Fonts from Font Awsome --}}
    {!! Html::style('assets/css/font-awesome.min.css') !!}
    {{-- CSS Animate --}}
    {!! Html::style('assets/css/animate.css') !!}
    {{-- Custom styles for this theme --}}
    {!! Html::style('assets/css/main.css') !!}
    {{-- Fonts --}}
    {!! Html::style('assets/css/googleapiesSourceSansPro.css') !!}
    {!! Html::style('assets/css/googleapisOpenSans.css') !!}
    {{-- Feature detection --}}
    {!! Html::script('assets/js/modernizr-2.6.2.min.js') !!}
    {{-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries --}}
    {{--[if lt IE 9]>
    {!! Html::script('assets/js/html5shiv.js') !!}
    {!! Html::script('assets/js/respond.min.js') !!}
    <![endif]--}}

    {{--CSS de cada seccion--}}
    @yield('cargarcss')

</head>

<body>
<section id="container">
    <header id="header">
        <!--logo start-->
        <div class="brand">
            <a href="{{route('home.home')}}">
                <!--logo custode-->
                <!DOCTYPE  PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     width="300px" height="250px" viewBox="50 200 999 999" enable-background="new 0 0 612 792" xml:space="preserve">
                        <g id="XMLID_462_">
                            <g>
                                <g>
                                    <g>
                                        <defs>
                                            <path id="SVGID_1_" d="M160.011,301.7c0,0-56.9,24.186-62.712,47.431c-11.437,45.465-6.657,175.667-6.657,175.667
                                                l-99.078-29.433l-17.342-154.948l53.712-85.025l86.896-4.593h10.779L160.011,301.7z"/>
                                        </defs>
                                        <clipPath id="SVGID_2_">
                                            <use xlink:href="#SVGID_1_"  overflow="visible"/>
                                        </clipPath>
                                        <path id="XMLID_464_" clip-path="url(#SVGID_2_)" fill="#8FA5D1" d="M158.981,361.599h-9.468
                                            c0-41.057-25.312-66.744-60.18-66.744c-34.871,0-60.181,25.688-60.181,66.744h-9.468c-8.249-0.092-7.03,0.094-7.218,6.657
                                            v89.053c0,14.061-1.125,34.4,12.843,34.4h133.672c13.967,0,21.278-20.34,21.278-34.4v-89.053
                                            C180.26,354.286,172.948,361.599,158.981,361.599z M105.175,467.805H73.491l6.092-49.588
                                            c-6.186-3.47-10.405-13.593-10.405-21.279c0-11.342,9.094-22.217,20.341-22.217c11.248,0,20.341,8.344,20.341,19.595
                                            c0,7.779-4.406,20.998-10.78,24.465L105.175,467.805z M48.182,361.599c0-41.057,20.718-47.715,41.151-47.715
                                            c20.53,0,41.151,6.564,41.151,47.715H48.182z"/>
                                    </g>
                                </g>
                            </g>
                        </g>
                    <g>
                        <path fill="#0B2E5C" d="M116.827,400.784c0-17.781,12.073-34.955,33.403-34.955c21.332,0,34.41,18.589,34.41,36.977
                            c0,9.698,0,10.911-2.414,11.113l-26.362,1.414c-1.409,0.201-2.415-1.213-2.415-2.425v-14.952c0-2.425-1.609-4.042-3.22-4.042
                            c-1.408,0-3.22,1.617-3.22,4.042v53.746c0,2.425,1.811,4.041,3.42,4.041c1.408,0,3.019-1.616,3.019-4.041v-12.931
                            c0-1.213,0.805-2.021,2.214-2.021l26.764,1.414c1.408,0.203,2.213,1.213,2.213,2.425c0,13.739,0,46.472-35.216,46.472
                            c-19.316,0-32.599-15.153-32.599-38.592v-47.685H116.827z"/>
                        <path fill="#0B2E5C" d="M191.481,367.85c0-1.213,0.604-2.021,1.61-2.021h25.354c1.006,0,1.61,0.607,1.61,1.617v77.185
                            c0,3.03,1.812,4.04,3.22,4.04c1.61,0,3.22-1.01,3.22-4.04v-77.185c0-1.01,0.605-1.617,1.409-1.617h26.16
                            c1.006,0,1.81,0.607,1.81,1.414v118.404c0,0.808-0.603,1.415-1.609,1.415H230.52c-1.207,0-2.415-7.072-3.622-7.072
                            c-0.403,0-1.007,0.404-2.214,1.616c-3.621,3.436-7.043,5.456-14.286,5.456c-8.252,0-18.917-6.87-18.917-21.015V367.85
                            L191.481,367.85z"/>
                        <path fill="#0B2E5C" d="M302.154,407.855c-1.006,0.203-1.608-0.605-1.608-1.818c0-6.264-1.409-9.495-4.427-9.495
                            c-1.61,0-3.019,1.414-3.019,3.637c0,4.244,6.036,10.306,17.104,20.408c11.873,10.507,16.903,19.195,16.903,32.127
                            c0,17.376-8.653,34.349-33.203,34.349c-13.481,0-31.592-7.477-31.592-41.423c0-1.009,0.603-1.818,1.408-1.818l21.934-1.414
                            c0.805,0,1.408,0.606,1.61,1.414c0.402,7.274,2.816,11.72,5.835,11.72c1.812,0,2.816-1.414,2.816-3.436
                            c0-4.85-7.646-12.527-18.916-22.023c-8.25-6.668-15.495-17.579-15.495-32.734c0-17.982,14.287-31.52,32.197-31.52
                            c24.147,0,34.41,18.791,34.41,38.794c0,1.01-1.006,1.818-2.013,1.818L302.154,407.855z"/>
                        <path fill="#0B2E5C" d="M337.165,399.37c0-0.808-0.402-1.414-1.207-1.414c-4.226,0-4.629,0-4.629-1.414v-29.5
                            c0-0.607,0.403-1.213,0.807-1.213c4.628,0,5.03,0,5.03-1.414v-17.781c0-0.808,0.604-1.414,1.408-1.414h28.978
                            c2.013,0,2.013,0.404,2.013,1.818v16.973c0,1.212,0.604,1.818,1.608,1.818c6.238,0,6.844,0,6.844,1.414v29.299
                            c0,0.807-0.605,1.414-1.409,1.414c-6.238,0-7.043,0-7.043,1.617v53.14c0,0.807,0.604,1.615,1.207,1.615
                            c7.043,0,7.847,0,7.847,1.213c0,11.518,0,31.52-20.525,31.52c-12.074,0-20.928-7.476-20.928-31.722V399.37L337.165,399.37z"/>
                        <path fill="#0B2E5C" d="M383.448,397.147c0-18.589,13.885-31.319,34.612-31.319c20.726,0,34.611,12.527,34.611,32.329v57.384
                            c0,18.791-13.886,31.52-34.611,31.52c-20.526,0-34.612-12.931-34.612-31.52V397.147z M414.839,450.288
                            c0,2.425,1.006,4.04,3.221,4.04c2.213,0,3.22-1.615,3.22-4.04v-48.089c0-2.222-1.208-4.041-3.22-4.041
                            c-2.215,0-3.221,1.819-3.221,4.041V450.288z"/>
                        <path fill="#0B2E5C" d="M497.744,487.062c-1.005,0-3.017-5.052-3.823-5.052c-0.403,0-1.005,0.404-2.415,1.414
                            c-2.816,2.222-7.043,3.638-11.672,3.638c-10.062,0-21.531-7.072-21.531-40.209v-42.229c0-30.712,12.476-38.794,22.94-38.794
                            c4.628,0,8.451,1.414,11.269,4.243c1.005,1.01,1.609,1.414,2.013,1.414c0.201,0,0.604-0.404,0.604-1.615V334.51
                            c0-1.01,0.806-2.021,1.812-2.021h26.16c1.006,0,1.811,0.606,1.811,1.616v151.137c0,1.01-1.006,1.818-1.811,1.818h-25.355V487.062z
                             M495.128,403.007c0-3.031-1.811-5.254-3.823-5.254c-1.812,0-2.615,1.82-2.615,3.839v50.717c0,1.211,0,3.838,2.615,3.838
                            c0.805,0,1.609-0.405,2.213-1.01c0.807-0.809,1.61-2.021,1.61-3.839V403.007z"/>
                        <path fill="#0B2E5C" d="M531.952,398.562c0-23.842,18.312-32.733,34.612-32.733c22.738,0,35.818,17.578,35.818,37.38v12.325
                            c0,1.01-0.806,1.819-1.812,1.819h-33.605c-0.806,0-1.208,0.606-1.208,1.616v31.723c0,3.233,1.408,4.445,3.22,4.445
                            c1.409,0,3.221-1.212,3.221-4.242v-12.327c0-0.808,0.603-1.615,1.812-1.615l25.958,1.414c1.207,0.201,2.012,1.01,2.012,2.222
                            v12.931c0,25.863-17.708,33.541-36.222,33.541c-21.531,0-33.807-15.355-33.807-38.391L531.952,398.562L531.952,398.562z
                             M565.759,405.431c0,0.606,0.604,1.01,1.208,1.01c4.628,0,5.232,0,5.232-1.01c0-12.932-0.202-14.346-3.422-14.346
                            c-1.609,0-3.019,1.213-3.019,4.244V405.431z"/>
                    </g>
                    <polygon id="XMLID_1_" opacity="0.13" fill="#95A4CF" enable-background="new    " points="29.808,361.222 47.712,361.222
                        47.994,353.257 29.808,358.411 "/>
                    <polygon id="XMLID_6_" opacity="0.13" fill="#95A4CF" enable-background="new    " points="30.465,360.193 47.431,360.193
                        47.431,352.225 30.465,357.381 "/>
                    <path id="XMLID_2_" opacity="0.13" fill="#95A4CF" enable-background="new    " d="M91.583,373.691l0.657-2.904
                        c0,0-12.278-0.848-19.593,5.998c-7.311,6.843-8.813,13.592-9.093,18.748c-0.281,4.499,0.28,11.902,4.781,17.437
                        c4.779,5.904,9.56,8.999,9.56,8.999l0.751-3.563c0,0-3.749-1.405-8.528-11.53c-3.47-7.312-1.313-15.843-1.313-15.843
                        s2.062-7.403,6.655-11.718C81.178,373.879,91.583,373.691,91.583,373.691z"/>
                    <path id="XMLID_7_" opacity="0.13" fill="#95A4CF" enable-background="new    " d="M91.864,373.034l0.657-2.906
                        c0,0-13.029-0.748-21.466,6.75c-7.497,6.657-8.813,13.594-9.094,18.747c-0.279,4.502,0.281,11.905,4.781,17.439
                        c4.78,5.904,10.779,10.123,10.779,10.123l0.752-3.562c0,0-4.875-2.531-9.655-12.563c-3.469-7.312-1.313-15.843-1.313-15.843
                        s2.063-7.403,6.656-11.718C79.678,373.879,91.864,373.034,91.864,373.034z"/>
                    <polygon id="XMLID_3_" opacity="0.13" fill="#95A4CF" enable-background="new    " points="74.71,443.245 68.709,470.149
                        87.551,470.149 88.771,468.273 72.741,468.273 76.398,438.276 "/>
                    <polygon id="XMLID_8_" opacity="0.13" fill="#95A4CF" enable-background="new    " points="73.96,443.245 67.961,471.086
                        86.896,471.086 88.115,468.742 72.084,468.742 77.334,430.029 "/>
                    <polygon id="XMLID_5_" opacity="0.13" fill="#95A4CF" enable-background="new    " points="80.146,490.959 88.771,490.959
                        88.771,470.149 87.364,473.053 87.457,489.552 "/>
                    <polygon id="XMLID_4_" opacity="0.13" fill="#95A4CF" enable-background="new    " points="79.584,491.146 88.958,491.146
                        89.052,468.742 87.646,473.053 88.208,490.02 "/>
                    <linearGradient id="XMLID_11_" gradientUnits="userSpaceOnUse" x1="-177.511" y1="1094.5671" x2="-167.6477" y2="1094.5671" gradientTransform="matrix(0.9374 0 0 -0.9374 182.352 1453.3496)">
                        <stop  offset="0" style="stop-color:#FFFFFF;stop-opacity:0"/>
                        <stop  offset="1" style="stop-color:#95A4CF"/>
                    </linearGradient>
                    <path id="XMLID_9_" opacity="0.31" fill="url(#XMLID_11_)" enable-background="new    " d="M21.559,366.473
            c0,0-1.218,82.209,0,106.861c0.375,8.25,6.093,15,2.344,14.813c-3.094-0.186-9.093-5.153-7.78-14.246
            c1.03-7.312,0-107.428,0-107.428H21.559L21.559,366.473z"/>
                    <rect id="_x3C_Sector_x3E_" x="0.938" y="290.825" fill="none" width="765.849" height="206.226"/>
        </svg>
                <!--fin logo custode-->
            </a>
        </div>
        <!--logo end-->
        <div class="toggle-navigation toggle-left">
            <button type="button" class="btn btn-default" id="toggle-left" data-toggle="tooltip" data-placement="right" title="Toggle Navigation">
                <i class="fa fa-bars"></i>
            </button>
        </div>
        <div class="user-nav">
            <ul>
                <li class="profile-photo">
                    <img src="assets/img/avatar.png" alt="" class="img-circle">
                </li>
                <li class="dropdown settings">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        {!! Auth::User()->name !!}
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu animated fadeInDown">
                        <li>
                            <i class="fa fa-pencil-square-o" aria-hidden="true"> {!!link_to_route('usuarios.edit_usuario_actual', 'Editar Perfil')!!}</i>
                        </li>
                        <li>
                            <i class="fa fa-power-off"> {!!link_to_route('home.logout', ' Cerrar session')!!}</i>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </header>
    <!--sidebar left start-->
    <aside class="sidebar">
        <div id="leftside-navigation" class="nano">
            <ul class="nano-content">
                <li class="active">
                    <a href="{{route('home.home')}}" style="padding-bottom: 0em !important;"><i class="glyphicon glyphicon-home"></i><span>HOME</span></a>
                </li>
                <li class="active">
                    <a href="{{route('funcionarios.index')}}" style="padding-bottom: 0.3em !important;"><i class="fa fa-users"></i><span>FUNCIONARIOS</span></a>
                </li>
                <li class="active">
                    <a href="{{route('secciones.index')}}" style="padding-bottom: 0.3em !important;"><i class="fa  fa-list"></i><span>SECCIONES</span></a>
                </li>
                <li class="active">
                    <a href="{{route('cargos.index')}}" style="padding-bottom: 0.3em !important;"><i class="fa  fa-list"></i><span>CARGOS</span></a>
                </li>
                <li class="active">
                    <a href="{{route('invitados.index')}}" style="padding-bottom: 0.3em !important;" ><i class="fa fa-users"></i><span>INVITADOS</span></a>
                </li>
                <li class="active">
                    <a href="{{route('usuarios.index')}}" style="padding-bottom: 0.3em !important;"><i class="fa fa-users"></i><span>USUARIOS</span></a>
                </li>
                <li class="active">
                    <a href="{{route('horariogeneral.show')}}" style="padding-bottom: 0.3em !important;"><i class="fa fa-clock-o"></i><span>HORARIOS</span></a>
                </li>
                <li class="active">
                    <a href="{{route('licencias.index')}}" style="padding-bottom: 0.3em !important;"><i class="fa  fa-files-o"></i><span>LICENCIAS</span></a>
                </li>
                <li class="active">
                    <a href="{{route('GestionAreas.index')}}" style="padding-bottom: 0.3em !important;"><i class="fa fa-list"></i><span>GESTION DE PUERTAS</span></a>
                </li>
                 <li class="active">
                    <a href="{{route('area')}}" style="padding-bottom: 0.3em !important;"><i class="fa fa-list"></i><span>CONTROL DE PUERTAS</span></a>
                </li>
                <li class="active">
                    <a href="{{route('estadisticas')}}" style="padding-bottom: 0.3em !important;"><i class="fa fa-list"></i><span>ESTADISTICAS</span></a>
                </li>
                <li class="active">
                    <a href="{{route('auditorias')}}" style="padding-bottom: 0.3em !important;"><i class="fa fa-list"></i><span>AUDITORIAS</span></a>
                </li>
                <li class="active">
                    <a href="{{route('home.inicial')}}" style="padding-bottom: 0em !important;"><i class="fa fa-gears"></i><span>CONFIGUARION INICIAL</span></a>
                </li>
            </ul>
        </div>
        </nav>

    </aside>
    <!--sidebar left end-->
    <!--main content start-->
    <section class="main-content-wrapper">
        <section id="main-content" >
                @include('alertas.alertas')
                @yield('content')
                </div>
        </section>
    </section>
</section>
{{--Global JS--}}
{!! Html::script('assets/js/jquery-1.10.2.min.js') !!}
{!! Html::script('assets/plugins/bootstrap/js/bootstrap.min.js') !!}
{!! Html::script('assets/plugins/waypoints/waypoints.min.js') !!}
{!! Html::script('assets/js/application.js') !!}
{!! Html::script("assets/plugins/chartjs/Chart.js") !!}
{{--Java Scrip de cada seccion--}}
@yield('cargarjs')



</body>

</html>