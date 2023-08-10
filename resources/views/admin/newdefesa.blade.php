@extends('layouts.master')

@section('title', 'Nova Defesa')
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
                    <a class="nav-link" href="{{ ('/dashboardocente') }}"><i class="fas fa-home"></i><span>Pagina Inicial</span></a>
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
                    <a class="nav-link active" href="{{ ('/defesa/index') }}"><i class="fas fa-book-reader"></i><span>Defesas</span></a>
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
            <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
        </div>
    </div>
    </nav>
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                <div class="container-fluid">
                    <button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button">
                        <i class="fas fa-bars"></i>
                    </button>
                    <ul class="nav navbar-nav flex-nowrap ml-auto">
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" style="color: rgb(255,255,255);">Mais</a>
                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" role="presentation" href="https://www.up.ac.mz" target="_blank">Pagina Oficial da UP</a>
                                <a class="dropdown-item" role="presentation" href="https://fet.up.ac.mz" target="_blank">FET</a>
                            </div>
                        </li>
                        <!--<li class="nav-item dropdown no-arrow mx-1" role="presentation">
                            <div class="nav-item dropdown no-arrow">
                                <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">
                                    <span class="badge badge-danger badge-counter">3+</span>
                                    <i class="fas fa-bell fa-fw" style="color: #ffffff;"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in" role="menu">
                                    <h6 class="dropdown-header">alerts center</h6>
                                    <a class="d-flex align-items-center dropdown-item" href="#">
                                        <div class="mr-3">
                                            <div class="bg-primary icon-circle">
                                                <i class="fas fa-file-alt text-white"></i>
                                            </div>
                                        </div>
                                        <div><span class="small text-gray-500">December 12, 2019</span>
                                            <p>A new monthly report is ready to download!</p>
                                        </div>
                                    </a>
                                    <a class="d-flex align-items-center dropdown-item" href="#">
                                        <div class="mr-3">
                                            <div class="bg-success icon-circle">
                                                <i class="fas fa-donate text-white"></i>
                                            </div>
                                        </div>
                                        <div><span class="small text-gray-500">December 7, 2019</span>
                                            <p>$290.29 has been deposited into your account!</p>
                                        </div>
                                    </a>
                                    <a class="d-flex align-items-center dropdown-item" href="#">
                                        <div class="mr-3">
                                            <div class="bg-warning icon-circle">
                                                <i class="fas fa-exclamation-triangle text-white"></i>
                                            </div>
                                        </div>
                                        <div><span class="small text-gray-500">December 2, 2019</span>
                                            <p>Spending Alert: We've noticed unusually high spending for your account.</p>
                                        </div>
                                    </a>
                                    <a class="text-center dropdown-item small text-gray-500" href="#">Show All Alerts</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                            <div class="nav-item dropdown no-arrow">
                                <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">
                                    <i class="fas fa-envelope fa-fw" style="color: #ffffff;"></i>
                                    <span class="badge badge-danger badge-counter">7</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in" role="menu">
                                    <h6 class="dropdown-header">alerts center</h6>
                                    <a class="d-flex align-items-center dropdown-item" href="#">
                                        <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle" src="../assets/img/avatars/avatar4.jpeg">
                                            <div class="bg-success status-indicator"></div>
                                        </div>
                                        <div class="font-weight-bold">
                                            <div class="text-truncate">
                                                <span>Hi there! I am wondering if you can help me with a problem I've been having.</span>
                                            </div>
                                            <p class="small text-gray-500 mb-0">Emily Fowler - 58m</p>
                                        </div>
                                    </a>
                                    <a class="d-flex align-items-center dropdown-item" href="#">
                                        <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle" src="../assets/img/avatars/avatar2.jpeg">
                                            <div class="status-indicator"></div>
                                        </div>
                                        <div class="font-weight-bold">
                                            <div class="text-truncate">
                                                <span>I have the photos that you ordered last month!</span>
                                            </div>
                                            <p class="small text-gray-500 mb-0">Jae Chun - 1d</p>
                                        </div>
                                    </a>
                                    <a class="d-flex align-items-center dropdown-item" href="#">
                                        <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle" src="../assets/img/avatars/avatar3.jpeg">
                                            <div class="bg-warning status-indicator"></div>
                                        </div>
                                        <div class="font-weight-bold">
                                            <div class="text-truncate">
                                                <span>Last month's report looks great, I am very happy with the progress so far, keep up the good work!</span>
                                            </div>
                                            <p class="small text-gray-500 mb-0">Morgan Alvarez - 2d</p>
                                        </div>
                                    </a>
                                    <a class="d-flex align-items-center dropdown-item" href="#">
                                        <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle" src="../assets/img/avatars/avatar5.jpeg">
                                            <div class="bg-success status-indicator"></div>
                                        </div>
                                        <div class="font-weight-bold">
                                            <div class="text-truncate">
                                                <span>Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</span>
                                            </div>
                                            <p class="small text-gray-500 mb-0">Chicken the Dog · 2w</p>
                                        </div>
                                    </a>
                                    <a class="text-center dropdown-item small text-gray-500" href="#">Show All Alerts</a>
                                </div>
                            </div>
                            <div class="shadow dropdown-list dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown"></div>
                        </li>-->
                        <div class="d-none d-sm-block topbar-divider"></div>
                        <li class="nav-item dropdown no-arrow" role="presentation">
                            <div class="nav-item dropdown no-arrow">
                                <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">
                                    <span class="d-none d-lg-inline">{{auth()->user()->name}}</span>
                                    @if(auth()->user()->is_docente)
                                    <img class="border rounded-circle img-perfil" src="/ficheiros/docentes/fotos/{{auth()->user()->docenteUser->foto}}">
                                    @elseif(auth()->user()->is_drcurso)
                                    <img class="border rounded-circle img-perfil" src="/ficheiros/docentes/fotos/{{auth()->user()->drcursoUser->foto}}">
                                    @elseif(auth()->user()->is_admin)
                                    <img class="border rounded-circle img-perfil" src="/ficheiros/docentes/fotos/{{auth()->user()->drcursoUser->foto}}">
                                    @endif
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
                <div class="card shadow">
                    <h3 data-aos="zoom-in" data-aos-duration="800" data-aos-delay="800" style="color: #3ba2dc;margin-bottom: 0px;margin-top: 20px;margin-right: 20px;margin-left: 20px;">Nova Defesa</h3>
                    <hr style="background-color: #3ba2dc;">
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $("input[name='num_estudante']").blur(function() {

                                var $name = $("input[name='name']");
                                var $id_estudante = $("input[name='id_estudante']");
                                var $supervisor = $("input[name='supervisor']");
                                var $nivel = $("input[name='nivel']");
                                var $curso = $("input[name='curso']");
                                var $regime = $("input[name='regime']");
                                var $tema = $("input[name='tema']");
                                var $foto = $("input[name='foto']");
                                var $monografia = $("input[name='monografia']");
                                var username = $(this).val();

                                $.getJSON("{{route('getestudante')}}", {
                                        username
                                    },
                                    function(json) {
                                        $name.val(json.name);
                                        $id_estudante.val(json.id_estudante);
                                        $supervisor.val(json.supervisor);
                                        $nivel.val(json.nivel);
                                        $curso.val(json.curso);
                                        $regime.val(json.regime);
                                        $tema.val(json.tema);
                                        $foto.val(json.foto);
                                        $monografia.val(json.monografia);
                                    });

                            });
                        });
                    </script>
                    <main>
                        <div class="container-fluid" role="alert" style="width: 100%;padding-top: 8px;padding-bottom: 8px;">
                            <div class="mensagem-error">
                                @if(session('msgErrorStore'))
                                <p class="msg"><Strong>{{ session('msgErrorStore') }}</Strong></p>
                                @endif
                            </div>
                        </div>
                        <div class="container-fluid" role="alert" style="width: 100%;padding-top: 8px;padding-bottom: 8px;">
                            <div class="mensagem-error">
                                @if(session('msgInput'))
                                <p class="msg"><Strong>{{session('msgInput')}}</Strong></p>
                                @endif
                            </div>
                        </div>
                        <div class="container-fluid" role="alert" style="width: 100%;padding-top: 8px;padding-bottom: 8px;">
                            <div class="mensagem-error">
                                @if(session('msgMonografia'))
                                <p class="msg"><Strong>{{session('msgMonografia')}}</Strong></p>
                                @endif
                            </div>
                        </div>
                        <div class="container-fluid" role="alert" style="width: 100%;padding-top: 8px;padding-bottom: 8px;">
                            <div class="mensagem-error">
                                @if(session('msgErrorName'))
                                <p class="msg"><Strong>{{session('msgErrorName')}}</Strong></p>
                                @endif
                            </div>
                        </div>
                    </main>
                    <form class="needs-validation" style="padding: 30px;padding-top: 10px;" role="form" method="post" action="{{ route('storedefesa') }}" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="form-group d-md-flex d-lg-flex d-xl-flex">
                            <label style="margin-right: 5px;width: 400px;">Numero de estudante*</label>
                            <input class="shadow form-control" type="text" data-aos="zoom-in" data-aos-duration="800" id="num_estudante" data-aos-delay="800" autofocus="" required placeholder="Busque pelo numero do estudante" style="background-color: #ffffff;margin-right:20px;" name="num_estudante">
                            <label style="margin-right: 5px;">Foto*</label>
                            <input class="shadow form-control" type="text" data-aos="zoom-in" data-aos-duration="800" id="foto" data-aos-delay="800" required autofocus="" placeholder="Foto do estudante" style="background-color: #ffffff;" name="foto">
                        </div>

                        <div class="form-group d-md-flex d-lg-flex d-xl-flex">
                            <input class="shadow form-control" type="hidden" name="id_estudante" readonly>
                            <label style="margin-right: 5px;">Nome*</label>
                            <input class="shadow form-control" type="text" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="800" required id="name" autofocus="" placeholder="Nome do Estudante" style="background-color: #ffffff; margin-right: 20px;" name="name">
                            <label style="margin-right: 5px;">Regime*</label>
                            <input class="shadow form-control" type="text" data-aos="zoom-in" data-aos-duration="800" id="regime" required data-aos-delay="800" autofocus="" autocomplete="on" placeholder="Regime" style="background-color: #ffffff;" name="regime">
                        </div>

                        <div class="form-group d-md-flex d-lg-flex d-xl-flex">
                            <label style="margin-right: 5px;">Tema*</label>
                            <input class="shadow form-control" type="text" data-aos="zoom-in" id="tema" data-aos-duration="800" required data-aos-delay="800" name="tema" placeholder="Tema da monografia" autofocus="" autocomplete="on" style="background-color: #ffffff;margin-right: 20px;">
                            <label style="margin-right: 5px;">Curso*</label>
                            <input class="shadow form-control" type="text" data-aos="zoom-in" id="curso" data-aos-duration="800" required data-aos-delay="800" autofocus="" autocomplete="on" placeholder="Curso" style="background-color: #ffffff;" name="curso">
                        </div>

                        <div class="form-group d-md-flex d-lg-flex d-xl-flex">
                            <label style="margin-right: 5px;">Descrição*<br></label>
                            <textarea class="shadow form-control form-control-sm" data-aos="zoom-in" id="descricao" required data-aos-duration="800" data-aos-delay="800" placeholder="Resumo" name="descricao" autofocus="" style="background-color: #ffffff;margin-right: 20px;"></textarea>
                            <label style="margin-right: 5px;">Nivel*</label>
                            <input class="shadow form-control" type="text" data-aos="zoom-in" id="nivel" required data-aos-duration="800" data-aos-delay="800" autofocus="" autocomplete="on" placeholder="Nivel" style="background-color: #ffffff;" name="nivel">
                        </div>

                        <div class="form-group d-md-flex d-lg-flex d-xl-flex">
                            <label style="margin-right: 5px;">Supervisor*</label>
                            <input class="shadow form-control" type="text" data-aos="zoom-in" required data-aos-duration="800" data-aos-delay="800" id="supervisor" name="supervisor" placeholder="Nome do supervisor" autofocus="" autocomplete="on" style="background-color: #ffffff;margin-right: 20px;">
                            <label class="text-nowrap" style="margin-right: 5px;">Sala*</label>
                            <input class="shadow form-control" type="text" data-aos="zoom-in" id="sala" required data-aos-duration="800" data-aos-delay="800" autocomplete="on" placeholder="Nome da Sala" style="background-color: #ffffff;" name="sala">
                        </div>
                        <div class="form-group d-md-flex d-lg-flex d-xl-flex">
                            <label style="margin-right: 5px;">Oponente*</label>
                            <select class="shadow form-control" data-aos="zoom-in" id="oponente" required data-aos-duration="800" data-aos-delay="800" style="background-color: #ffffff; margin-right: 20px;" name="oponente">
                                <optgroup label="Oponente">
                                    <option>Seleccione</option>
                                    @foreach($docentes as $docente)
                                    <option value="{{$docente->name}}">{{$docente->name}}</option>
                                    @endforeach
                                </optgroup>
                            </select>

                            <label style="margin-right: 5px;">Presidente*</label>
                            <select class="shadow form-control" data-aos="zoom-in" id="presidente" required data-aos-duration="800" data-aos-delay="800" style="background-color: #ffffff;" name="presidente">
                                <optgroup label="Presidente">
                                    <option>Seleccione</option>
                                    @foreach($docentes as $docente)
                                    <option value="{{$docente->name}}">{{$docente->name}}</option>
                                    @endforeach
                                </optgroup>
                            </select>

                        </div>
                        <div class="form-group d-md-flex d-lg-flex d-xl-flex">
                            <label class="text-nowrap" style="margin-right: 5px;">Data*</label>
                            <input class="shadow form-control" data-aos="zoom-in" id="data" required data-aos-duration="800" data-aos-delay="800" type="date" name="data" style="background-color: #ffffff;margin-right: 20px;">
                            <label class="text-nowrap" style="margin-right: 5px;">Hora*</label>
                            <input class="shadow form-control" id="hora" data-aos="zoom-in" required data-aos-duration="800" data-aos-delay="800" type="time" name="hora" style="background-color: #ffffff;">
                            <input class="shadow form-control" id="monografia" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="800" type="hidden" name="monografia" style="background-color: #ffffff;">
                        </div>
                        <div class="form-group d-md-flex d-lg-flex d-xl-flex justify-content-end align-items-center">
                            <button class="btn btn-sm d-flex align-items-center btn-actualizar shadow" data-aos="fade-right" data-aos-duration="800" data-aos-delay="800" type="submit"><ion-icon name="add"></ion-icon>&nbsp;Cadastrar</button>
                            <button class="btn btn-sm d-flex align-items-center btn-limpar shadow" data-aos="fade-right" data-aos-duration="800" data-aos-delay="800" type="reset">Limpar Campos</button>
                            <a class="btn btn-sm d-flex align-items-center shadow btn-cancelar" data-aos="fade-right" data-aos-duration="800" href="{{ ('/defesa/index') }}" data-aos-delay="800" type="button"><ion-icon name="close-outline"></ion-icon>&nbsp;Cancelar</a>
                        </div>
                        <label class="d-flex" style="margin-top: 20px;padding: 10px;padding-left: 20px;background-color: #aff5ff;">Obs: O * representa campos obrigatórios<br></label>

                    </form>
                    <script type="text/javascript">
                        document.addEventListener("DOMContentLoaded", function() {
                            const forms = document.querySelectorAll('.needs-validation');
                            Array.prototype.slice.call(forms).forEach((form) => {
                                form.addEventListener('submit', (event) => {
                                    if (!form.checkValidity()) {
                                        event.preventDefault();
                                        event.stopPropagation();
                                        // alert('Por favor carregue os ficheiros');
                                    }
                                    form.classList.add('was-validated');
                                }, false);
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
        @endsection