    @extends('layouts.master')

    @section('title', 'Novo Docente')

    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background-color: #2391bf;background-image: linear-gradient(180deg,#2390be 10%,#2a99c4);">
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
                    @endif
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" href="{{ ('/defesa/index') }}"><i class="fas fa-book-reader"></i><span>Defesas</span></a>
                    </li>
                    @if(auth()->user()->is_drcurso)
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" href="{{ ('/usuario/docentes') }}"><i class="fas fa-users"></i><span>Docentes</span></a>
                    @endif
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" href="{{ ('/comentarios') }}"><i class="fa fa-comments-o"></i><span>Comentarios</span></a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" href="{{ ('/noticias') }}"><i class="fa fa-newspaper-o"></i><span>Noticias</span></a>
                        @if(auth()->user()->is_admin)
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" href="{{ ('/usuario/docenteview') }}"><i class="fas fa-users"></i><span>Docentes</span></a>
                    </li>
                    @endif
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" href="{{ ('/galeria') }}"><i class="fa fa-slideshare"></i><span>Galeria</span></a>
                    </li>
                    </li>
                    @if(auth()->user()->is_drcurso || auth()->user()->is_admin)
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" href="{{ ('/usuario/estudanteview') }}"><i class="fas fa-users"></i><span>Estudante</span></a>
                    </li>
                    @endif
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
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
                            <li class="nav-item dropdown show d-sm-none no-arrow">
                                <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="true" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu show dropdown-menu-right p-3 animated--grow-in" role="menu" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary py-0" type="button">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" style="color: rgb(255,255,255);">Mais</a>
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item" role="presentation" href="#">First Item</a>
                                    <a class="dropdown-item" role="presentation" href="#">Second Item</a>
                                    <a class="dropdown-item" role="presentation" href="#">Third Item</a>
                                    <span class="dropdown-item-text" role="presentation">Text Item</span>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
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
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow" role="presentation">
                            <div class="nav-item dropdown no-arrow">
                                <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">
                                    <span class="d-none d-lg-inline">{{auth()->user()->name}}</span>
                                    @if(auth()->user()->is_docente)
                                        <img class="border rounded-circle img-profile" src="/ficheiros/docentes/fotos/{{auth()->user()->docenteUser->foto}}">
                                        @elseif(auth()->user()->is_drcurso)
                                        <img class="border rounded-circle img-profile" src="/ficheiros/docentes/fotos/{{auth()->user()->drcursoUser->foto}}">
                                        @elseif(auth()->user()->is_admin)
                                        <img class="border rounded-circle img-profile" src="/ficheiros/docentes/fotos/{{auth()->user()->drcursoUser->foto}}">
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
                        <h2 data-aos="zoom-in" data-aos-duration="800" data-aos-delay="800" style="color: #3ba2dc;margin-top: 20px;margin-right: 20px;margin-bottom: 0px;margin-left: 20px;">Novo Docente<br></h2>
                        <hr style="background-color: #3ba2dc;margin-top: 5px;">
                        <main>
                            <div class="alert alert-success beautiful" role="alert" style="width: 100%;background-color: rgb(254,163,163);padding-top: 7px;padding-bottom: 7px;">
                                @if(session('msgErrorStore'))
                                <Strong>{{session('msgErrorStore')}}</Strong>
                                @endif
                            </div>
                            <div class="alert alert-success beautiful" role="alert" style="width: 100%;background-color: rgb(254,163,163);padding-top: 7px;padding-bottom: 7px;">
                                @if(session('msgErrorPass'))
                                <Strong>{{session('msgErrorPass')}}</Strong>
                                @endif
                            </div>
                            <div class="alert alert-success beautiful" role="alert" style="width: 100%;background-color: rgb(254,163,163);padding-top: 7px;padding-bottom: 7px;">
                                @if(session('msgPass'))
                                <Strong>{{session('msgPass')}}</Strong>
                                @endif
                            </div>
                        </main>

                        <form style="padding: 40px;" method="post" role="form" action="{{ ('/usuario/docente') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group d-flex justify-content-center align-items-center">
                                <label style="margin-right: 5px;">Nome*</label>
                                <input class="shadow form-control" type="text" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="800" autofocus="" autocomplete="on" required="" placeholder="Nome Completo" style="background-color: #ffffff;" name="name">
                            </div>
                            <div class="form-group" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="800" style="background-color: #f8fbfb;">
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <span class="input-group-addon btn btn-default btn-file">
                                        <span class="fileinput-new">Imagem</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" accept="image/*" name="foto">
                                    </span>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    <div class="form-control" data-trigger="fileinput">
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group d-flex justify-content-center align-items-center">
                                <label style="margin-right: 5px;">Email*</label>
                                <input class="shadow form-control" type="email" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="800" name="email" placeholder="exemplo@gmail.com" style="background-color: #ffffff;margin-right: 10px;" required="" autocomplete="on">
                                <label style="margin-right: 5px;">Curso*</label>
                                <input class="shadow form-control" value="{{auth()->user()->drcursoUser->curso}}" type="text" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="800" name="curso" style="background-color: #ffffff;margin-right: 10px;">
                            </div>
                            <div class="form-group d-flex justify-content-center align-items-center">
                                <label style="margin-right: 5px;">Senha*</label>
                                <input class="shadow form-control" type="password" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="800" placeholder="Senha" name="password" style="background-color: #ffffff;margin-right: 20px;">
                                <label style="margin-right: 5px;width: 350px;">Confirmar Senha*</label>
                                <input class="shadow form-control" type="password" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="800" style="background-color: #ffffff;" name="confirm_password" placeholder="Confimar a senha" required="">
                            </div>
                            <div class="form-group" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="800" style="background-color: #f8fbfb;">
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <span class="input-group-addon btn btn-default btn-file">
                                        <span class="fileinput-new">Curriculum</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" accept="pdf/*" name="curriculum">
                                    </span>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    <div class="form-control" data-trigger="fileinput">
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check" style="padding-bottom: 10px;">
                                    <input class="form-check-input" type="checkbox" value="1" id="formCheck-1" name="is_active">
                                    <label class="form-check-label" for="formCheck-1" style="color: #999999;">Activo</label>
                                </div>
                            </div>
                            <div class="form-group d-flex justify-content-end align-items-center">
                                <button class="btn shadow" data-aos="fade-right" data-aos-duration="800" data-aos-delay="800" type="submit" style="margin-right: 20px;color: #ffffff;background-color: #0ccf94;">Cadastrar</button>
                                <button class="btn shadow" data-aos="fade-right" data-aos-duration="800" data-aos-delay="800" type="reset" style="background-color: rgb(63,155,195);margin-right: 20px;color: #ffffff;">Limpar Campos</button>
                                <a class="btn shadow" data-aos="fade-right" data-aos-duration="800" data-aos-delay="800" type="button" href="{{ ('/usuario/docentes') }}" style="background-color: #da2d22;color: #ffffff;">Cancelar</a>
                            </div>
                            <label class="d-flex" style="margin-top: 20px;padding: 10px;padding-left: 20px;background-color: #aff5ff;">Obs: O * representa campos obrigatórios<br></label>
                        </form>

                    </div>
                </div>
            </div>