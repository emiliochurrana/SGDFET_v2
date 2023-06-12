@extends('layouts.master')

@section('title', 'Home')
@section('content')
<div id="wrapper">
    <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background-color: #2391bf;background-image: linear-gradient(180deg,#2390be 10%,#2a99c4);">
    <div class="fixed-left">    
        <div class="container-fluid d-flex flex-column p-0">
            <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-user-graduate"></i></div>
                <div class="sidebar-brand-text mx-3"><span>SGDFET</span><small class="text-center border rounded border-white" style="font-size: 10px;font-weight: bold;background-color: rgb(248,248,248);font-style: normal;font-family: ABeeZee, sans-serif;padding: 5px;padding-top: 1px;padding-bottom: 1px;color: rgb(27,147,198);">v.1.0</small></div>
            </a>
            <hr class="sidebar-divider my-0">
            <ul class="nav navbar-nav text-light" id="accordionSidebar">
                @if(auth()->user()->is_admin)
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="{{ ('/dashboard') }}"><i class="fas fa-home"></i><span>Pagina Inicial</span></a>
                </li>
                @elseif(auth()->user()->is_drcurso)
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="{{ ('/dashboardrcurso') }}"><i class="fas fa-home"></i><span>Pagina Inicial</span></a>
                </li>
                @elseif(auth()->user()->is_docente)
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" href="{{ ('/dashboardocente') }}"><i class="fas fa-home"></i><span>Pagina Inicial</span></a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="{{ ('/usuario/estudantes') }}"><i class="fas fa-users"></i><span>Estudantes</span></a>
                </li>
                @endif
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="{{ ('/monografias/index') }}"><i class="fas fa-book"></i><span>Monografias</span></a>
                </li>

                @if(auth()->user()->is_admin)
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="{{ ('/usuario/drcursos') }}"><i class="fas fa-user"></i><span>Dr. Curso</span></a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="{{ ('/usuario/docenteview') }}"><i class="fas fa-users"></i><span>Docentes</span></a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="{{ ('/usuario/visitante') }}"><i class="fas fa-users"></i><span>Visitantes</span></a>
                </li>
                @endif
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="{{ ('/defesa/index') }}"><i class="fas fa-book-reader"></i><span>Defesas</span></a>
                </li>
                @if(auth()->user()->is_drcurso)
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="{{ ('/usuario/docentes') }}"><i class="fas fa-users"></i><span>Docentes</span></a>
                </li>
                @endif
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="{{ ('/comentarios') }}"><i class="fa fa-comments-o"></i><span>Comentarios</span></a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="{{ ('/noticias') }}"><i class="fa fa-newspaper-o"></i><span>Noticias</span></a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="{{ ('/galeria') }}"><i class="fa fa-slideshare"></i><span>Galeria</span></a>
                </li>
                @if(auth()->user()->is_drcurso || auth()->user()->is_admin)
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="{{ ('/usuario/estudanteview') }}"><i class="fas fa-users"></i><span>Estudante</span></a>
                </li>
                @endif
            </ul>
            <div class="text-center d-none d-md-inline">
                <button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button>
            </div>
        </div>
    </div>
    </nav>
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                    <ul class="nav navbar-nav flex-nowrap ml-auto">
                        <!--<li class="nav-item dropdown show d-sm-none no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="true" href="#"><i class="fas fa-search"></i></a>
                            <div class="dropdown-menu show dropdown-menu-right p-3 animated--grow-in" role="menu" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto navbar-search w-100">
                                    <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                        <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                    </div>
                                </form>
                            </div>
                        </li>-->
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" style="color: rgb(255,255,255);">Mais</a>
                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" role="presentation" href="https://www.up.ac.mz" target="_blank">Pagina Oficial da UP</a>
                                <a class="dropdown-item" role="presentation" href="https://fet.up.ac.mz" target="_blank">FET</a>
                            </div>
                        </li>
                        <!--<li class="nav-item dropdown no-arrow mx-1" role="presentation">
                            <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="badge badge-danger badge-counter">3+</span><i class="fas fa-bell fa-fw" style="color: #ffffff;"></i></a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in" role="menu">
                                    <h6 class="dropdown-header">alerts center</h6>
                                    <a class="d-flex align-items-center dropdown-item" href="#">
                                        <div class="mr-3">
                                            <div class="bg-primary icon-circle"><i class="fas fa-file-alt text-white"></i></div>
                                        </div>
                                        <div><span class="small text-gray-500">December 12, 2019</span>
                                            <p>A new monthly report is ready to download!</p>
                                        </div>
                                    </a>
                                    <a class="d-flex align-items-center dropdown-item" href="#">
                                        <div class="mr-3">
                                            <div class="bg-success icon-circle"><i class="fas fa-donate text-white"></i></div>
                                        </div>
                                        <div><span class="small text-gray-500">December 7, 2019</span>
                                            <p>$290.29 has been deposited into your account!</p>
                                        </div>
                                    </a>
                                    <a class="d-flex align-items-center dropdown-item" href="#">
                                        <div class="mr-3">
                                            <div class="bg-warning icon-circle"><i class="fas fa-exclamation-triangle text-white"></i></div>
                                        </div>
                                        <div><span class="small text-gray-500">December 2, 2019</span>
                                            <p>Spending Alert: We have noticed unusually high spending for your account.</p>
                                        </div>
                                    </a>
                                    <a class="text-center dropdown-item small text-gray-500" href="#">Show All Alerts</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                            <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-envelope fa-fw" style="color: #ffffff;"></i><span class="badge badge-danger badge-counter">7</span></a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in" role="menu">
                                    <h6 class="dropdown-header">alerts center</h6>
                                    <a class="d-flex align-items-center dropdown-item" href="#">
                                        <div class="dropdown-list-image mr-3"><img class="rounded-circle" src="../img/avatars/avatar4.jpeg">
                                            <div class="bg-success status-indicator"></div>
                                        </div>
                                        <div class="font-weight-bold">
                                            <div class="text-truncate"><span>Hi there! I am wondering if you can help me with a problem I have been having.</span></div>
                                            <p class="small text-gray-500 mb-0">Emily Fowler - 58m</p>
                                        </div>
                                    </a>
                                    <a class="d-flex align-items-center dropdown-item" href="#">
                                        <div class="dropdown-list-image mr-3"><img class="rounded-circle" src="../img/avatars/avatar2.jpeg">
                                            <div class="status-indicator"></div>
                                        </div>
                                        <div class="font-weight-bold">
                                            <div class="text-truncate"><span>I have the photos that you ordered last month!</span></div>
                                            <p class="small text-gray-500 mb-0">Jae Chun - 1d</p>
                                        </div>
                                    </a>
                                    <a class="d-flex align-items-center dropdown-item" href="#">
                                        <div class="dropdown-list-image mr-3"><img class="rounded-circle" src="../img/avatars/avatar3.jpeg">
                                            <div class="bg-warning status-indicator"></div>
                                        </div>
                                        <div class="font-weight-bold">
                                            <div class="text-truncate"><span>Last month report looks great, I am very happy with the progress so far, keep up the good work!</span></div>
                                            <p class="small text-gray-500 mb-0">Morgan Alvarez - 2d</p>
                                        </div>
                                    </a>
                                    <a class="d-flex align-items-center dropdown-item" href="#">
                                        <div class="dropdown-list-image mr-3"><img class="rounded-circle" src="../img/avatars/avatar5.jpeg">
                                            <div class="bg-success status-indicator"></div>
                                        </div>
                                        <div class="font-weight-bold">
                                            <div class="text-truncate"><span>Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren good...</span></div>
                                            <p class="small text-gray-500 mb-0">Chicken the Dog · 2w</p>
                                        </div>
                                    </a><a class="text-center dropdown-item small text-gray-500" href="#">Show All Alerts</a>
                                </div>
                            </div>
                            <div class="shadow dropdown-list dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown"></div>
                        </li>-->
                        <div class="d-none d-sm-block topbar-divider"></div>
                        <li class="nav-item dropdown no-arrow" role="presentation">
                            <div class="nav-item dropdown no-arrow">
                                <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">
                                    <span class="d-none d-lg-inline">{{auth()->user()->name}}</span>
                                    <img class="border rounded-circle img-perfil" src="/ficheiros/docentes/fotos/{{auth()->user()->docenteUser->foto}}">
                                </a>
                                <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu">
                                    <a class="dropdown-item" role="presentation" href="/usuario/perfil/{{auth()->user()->id}}"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a>
                                    <!--<a class="dropdown-item" role="presentation" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a>
                                    <a class="dropdown-item" role="presentation" href="#"><i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Activity log</a>-->
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" role="presentation" href="{{ ('/usuario/logout') }}"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="container-fluid">
                <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <h3 class="mb-0 font-weight-bold" style="font-family: Roboto, sans-serif;color: #0e56e1;">Estatisticas</h3>
                    <!--<a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generate Report</a>-->
                </div>
                <div class="row">
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-warning py-2" style="background-color: #819ef2;">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-center text-warning font-weight-bold text-xs mb-1" style="color: #0e56e1;"><span style="color: #ffffff;font-size: 12px;">Total Estudantes Inscritos&nbsp;&nbsp;</span></div>
                                        <div class="text-center text-dark font-weight-bold h5 mb-0">
                                            <span id="estudantes" style="color: #ffffff;"></span>
                                        </div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-users fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-warning py-2" style="background-color: #1e96c9;">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-center text-warning font-weight-bold text-xs mb-1" style="color: #0e56e1;"><span style="color: #ffffff;font-size: 12px;">Total Docentes Inscritos&nbsp;&nbsp;</span></div>
                                        <div class="text-center text-dark font-weight-bold h5 mb-0">
                                            <span id="docentes" style="color: #ffffff;"></span>
                                        </div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-users fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-warning py-2" style="background-color: #06c8e4;">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-center text-warning font-weight-bold text-xs mb-1" style="color: #06c8e4;"><span style="color: #ffffff;font-size: 12px;">Total Defesas marcadas&nbsp;&nbsp;</span></div>
                                        <div class="text-center text-dark font-weight-bold h5 mb-0">
                                            <span id="defesas" style="color: #ffffff;"></span>
                                        </div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-book-reader fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-warning py-2" style="background-color: #0e56e1;">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-center text-warning font-weight-bold text-xs mb-1" style="color: #0e56e1;"><span style="color: #ffffff;font-size: 12px;">Total Monografias publicadas&nbsp;&nbsp;</span></div>
                                        <div class="text-center text-dark font-weight-bold h5 mb-0">
                                            <span id="monografias" style="color: #ffffff;"></span>
                                        </div>
                                    </div>
                                    <div class="col-auto col-xl-2"><i class="fas fa-book fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
      function animate(obj, initVal, lastVal, duration) {
         let startTime = null;

      //obtém o carimbo de data/hora atual e o atribui à variável currentTime
      let currentTime = Date.now();

      
    //passa o timestamp atual para a função step
      const step = (currentTime ) => {

      //se a hora inicial for nula, atribui a hora atual a startTime
      if (!startTime) {
         startTime = currentTime ;
      }

      //calcula o valor a ser usado no cálculo do número a ser exibido
      const progress = Math.min((currentTime - startTime)/ duration, 1);

      
        //calcula o que será exibido usando o valor obtido acima
      obj.innerHTML = Math.floor(progress * (lastVal - initVal) + initVal);

      //verificando se o contador não excede o último valor (lastVal)
      if (progress < 1) {
         window.requestAnimationFrame(step);
      } else {
            window.cancelAnimationFrame(window.requestAnimationFrame(step));
         }
      };
      //inicia a animação
         window.requestAnimationFrame(step);
      }
      let text1 = document.getElementById('estudantes');
      let text2 = document.getElementById('docentes');
      let text3 = document.getElementById('defesas');
      let text4 = document.getElementById('monografias');
      const load = () => {
         animate(text1, 0, '{{count($estudantes)}}', 1000);
         animate(text2, 0, '{{count($docentes)}}', 1000);
         animate(text3, 0, '{{count($defesas)}}', 1000);
         animate(text4, 0, '{{count($monografias)}}', 1000);
      }
   </script>
                <div class="row">
                    <div class="col-lg-7 col-xl-8">
                        <div class="card shadow mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="font-weight-bold m-0">Evolução&nbsp;das Defesas por mês<br></h6>
                                <!--<div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in" role="menu">
                                        <p class="text-center dropdown-header">dropdown header:</p>
                                        <a class="dropdown-item" role="presentation" href="#">&nbsp;Action</a>
                                        <a class="dropdown-item" role="presentation" href="#">&nbsp;Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" role="presentation" href="#">&nbsp;Something else here</a>
                                    </div>
                                </div>-->
                            </div>
                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas data-bs-chart="{&quot;type&quot;:&quot;line&quot;,&quot;data&quot;
                                        :{&quot;labels&quot;:[&quot;Janeiro&quot;,&quot;Fevereiro&quot;,
                                            &quot;Março&quot;,&quot;Abril&quot;,&quot;Maio&quot;,&quot;Junho&quot;,
                                            &quot;Julho&quot;,&quot;Agosto&quot;,&quot;Setembro&quot;,
                                            &quot;Outubro&quot;,&quot;Novembro&quot;,&quot;Dezembro&quot;],&quot;datasets&quot;
                                            :[{&quot;label&quot;:&quot;Defesas&quot;,&quot;fill&quot;
                                                :true,&quot;data&quot;
                                                :[&quot;{{count($def_jan)}}&quot;,&quot;{{count($def_feb)}}&quot;,&quot;{{count($def_mar)}}&quot;,
                                                &quot;{{count($def_apr)}}&quot;,&quot;{{count($def_may)}}&quot;,&quot;{{count($def_jun)}}&quot;,
                                                &quot;{{count($def_jul)}}&quot;,&quot;{{count($def_aug)}}&quot;,&quot;{{count($def_sep)}}&quot;,
                                                &quot;{{count($def_out)}}&quot;,&quot;{{count($def_nov)}}&quot;,&quot;{{count($def_dec)}}&quot;],&quot;backgroundColor&quot;
                                                :&quot;rgba(78, 115, 223, 0.05)&quot;,&quot;borderColor&quot;
                                                :&quot;rgba(78, 115, 223, 1)&quot;}]},&quot;options&quot;
                                                :{&quot;maintainAspectRatio&quot;
                                                    :false,&quot;legend&quot;
                                                    :{&quot;display&quot;:false},&quot;title&quot;
                                                    :{},&quot;scales&quot;:{&quot;xAxes&quot;
                                                        :[{&quot;gridLines&quot;
                                                        :{&quot;color&quot;
                                                            :&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;
                                                            :&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;
                                                            :false,&quot;drawTicks&quot;
                                                            :false,&quot;borderDash&quot;
                                                            :[&quot;2&quot;],&quot;zeroLineBorderDash&quot;
                                                            :[&quot;2&quot;],&quot;drawOnChartArea&quot;
                                                            :false},&quot;ticks&quot;
                                                            :{&quot;fontColor&quot;
                                                                :&quot;#858796&quot;,&quot;padding&quot;
                                                                :20}}],&quot;yAxes&quot;
                                                            :[{&quot;gridLines&quot;
                                                                :{&quot;color&quot;
                                                                    :&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;
                                                                :&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;
                                                                :false,&quot;drawTicks&quot;
                                                                :false,&quot;borderDash&quot;
                                                                :[&quot;3&quot;],&quot;zeroLineBorderDash&quot;
                                                                :[&quot;2&quot;]},&quot;ticks&quot;
                                                                :{&quot;fontColor&quot;
                                                                    :&quot;#858796&quot;,&quot;padding&quot;
                                                                    :20}}]}}}"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-xl-4">
                        <div class="card shadow mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="font-weight-bold m-0">Estatisticas no gráfico circular</h6>
                                <!--<div class="dropdown no-arrow">
                                    <button class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in" role="menu">
                                        <p class="text-center dropdown-header">dropdown header:</p>
                                        <a class="dropdown-item" role="presentation" href="#">&nbsp;Action</a>
                                        <a class="dropdown-item" role="presentation" href="#">&nbsp;Another action</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" role="presentation" href="#">&nbsp;Something else here</a>
                                    </div>
                                </div>-->
                            </div>
                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas data-bs-chart="{&quot;type&quot;:&quot;doughnut&quot;,&quot;data&quot;:{&quot;labels&quot;
                                            :[&quot;Estudantes&quot;,&quot;Docentes&quot;,&quot;Defesas&quot;,&quot;Monografias&quot;],&quot;datasets&quot;
                                            :[{&quot;label&quot;:&quot;&quot;,&quot;backgroundColor&quot;
                                                :[&quot;#4e73df&quot;,&quot;#1cc88a&quot;,&quot;#36b9cc&quot;,&quot;#0e56e1&quot;],&quot;borderColor&quot;
                                                :[&quot;#ffffff&quot;,&quot;#ffffff&quot;,&quot;#ffffff&quot;,&quot;#ffffff&quot;],&quot;data&quot;
                                                :[&quot;{{count($estudantes)}}&quot;,&quot;{{count($docentes)}}&quot;,&quot;{{count($defesas)}}&quot;,&quot;{{count($monografias)}}&quot;]}]},&quot;options&quot;
                                                :{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false},&quot;title&quot;:{}}}"></canvas>
                                </div>
                                <div class="text-center small mt-4">
                                    <span class="mr-2"><i class="fas fa-circle" style="color:#4e73df"></i>&nbsp;Estudantes</span>
                                    <span class="mr-2"><i class="fas fa-circle" style="color:#1cc88a"></i>&nbsp;Docentes</span>
                                    <span class="mr-2"><i class="fas fa-circle" style="color:#36b9cc"></i>&nbsp;Defesas</span>
                                    <span class="mr-2"><i class="fas fa-circle" style="color:#0e56e1"></i>&nbsp;Monografias</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection