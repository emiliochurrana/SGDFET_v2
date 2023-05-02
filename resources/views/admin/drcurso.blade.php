@extends('layouts.master')

@section('title', 'DrCurso')

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
                        <a class="nav-link active" href="{{ ('/usuario/drcursos') }}"><i class="fas fa-user"></i><span>Dr. Curso</span></a>
                    </li>
                    @endif
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" href="{{ ('/defesa/index') }}"><i class="fas fa-book-reader"></i><span>Defesas</span></a>
                    </li>
                    @if(auth()->user()->is_drcurso)
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" href="{{ ('/usuario/docentes') }}"><i class="fas fa-users"></i><span>Docentes</span></a>
                    @endif
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" href="{{ ('/comentarios') }}"><i class="fa fa-comments-o"></i><span>Comentarios</span></a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" href="{{ ('/noticias') }}"><i class="fa fa-newspaper-o"></i><span>Noticias</span></a>
                        @if(auth()->user()->is_admin)
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" href="{{ ('/usuario/docenteview') }}"><i class="fas fa-users"></i><span>Docentes</span></a>
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
                            <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="true" href="#">
                                <i class="fas fa-search"></i>
                            </a>
                            <div class="dropdown-menu show dropdown-menu-right p-3 animated--grow-in" role="menu" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto navbar-search w-100">
                                    <div class="input-group">
                                        <input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
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
                                            <p>Spending Alert: We've noticed unusually high spending for your account.</p>
                                        </div>
                                    </a><a class="text-center dropdown-item small text-gray-500" href="#">Show All Alerts</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                            <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-envelope fa-fw" style="color: #ffffff;"></i><span class="badge badge-danger badge-counter">7</span></a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in" role="menu">
                                    <h6 class="dropdown-header">alerts center</h6>
                                    <a class="d-flex align-items-center dropdown-item" href="#">
                                        <div class="dropdown-list-image mr-3"><img class="rounded-circle" src="../assets/img/avatars/avatar4.jpeg">
                                            <div class="bg-success status-indicator"></div>
                                        </div>
                                        <div class="font-weight-bold">
                                            <div class="text-truncate"><span>Hi there! I am wondering if you can help me with a problem I've been having.</span></div>
                                            <p class="small text-gray-500 mb-0">Emily Fowler - 58m</p>
                                        </div>
                                    </a>
                                    <a class="d-flex align-items-center dropdown-item" href="#">
                                        <div class="dropdown-list-image mr-3"><img class="rounded-circle" src="../assets/img/avatars/avatar2.jpeg">
                                            <div class="status-indicator"></div>
                                        </div>
                                        <div class="font-weight-bold">
                                            <div class="text-truncate"><span>I have the photos that you ordered last month!</span></div>
                                            <p class="small text-gray-500 mb-0">Jae Chun - 1d</p>
                                        </div>
                                    </a>
                                    <a class="d-flex align-items-center dropdown-item" href="#">
                                        <div class="dropdown-list-image mr-3"><img class="rounded-circle" src="../assets/img/avatars/avatar3.jpeg">
                                            <div class="bg-warning status-indicator"></div>
                                        </div>
                                        <div class="font-weight-bold">
                                            <div class="text-truncate"><span>Last month's report looks great, I am very happy with the progress so far, keep up the good work!</span></div>
                                            <p class="small text-gray-500 mb-0">Morgan Alvarez - 2d</p>
                                        </div>
                                    </a>
                                    <a class="d-flex align-items-center dropdown-item" href="#">
                                        <div class="dropdown-list-image mr-3"><img class="rounded-circle" src="../assets/img/avatars/avatar5.jpeg">
                                            <div class="bg-success status-indicator"></div>
                                        </div>
                                        <div class="font-weight-bold">
                                            <div class="text-truncate"><span>Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</span></div>
                                            <p class="small text-gray-500 mb-0">Chicken the Dog · 2w</p>
                                        </div>
                                    </a><a class="text-center dropdown-item small text-gray-500" href="#">Show All Alerts</a>
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
                    <div class="card-header py-3">
                        <h2 class="d-xl-flex mr-auto" style="color: #3ba2dc;font-family: Roboto, sans-serif;">Drs. do curso</h2>
                    </div>
                    <main>
                        <!--   Mensagem de sucesso metodo store   -->
                        <div class="alert alert-success beautiful" role="alert" style="width: 100%;padding-top: 8px;padding-bottom: 8px;">
                            @if(session('msgSucessStore'))
                            <Strong>{{ session('msgSucessStore') }}</Strong>
                            @endif
                        </div>

                        <!--    Mensagem de sucesso metodo update   -->
                        <div class="alert alert-success beautiful" role="alert" style="width: 100%;padding-top: 8px;padding-bottom: 8px;">
                            @if(session('msgSucessUpdate'))
                            <Strong>{{ session('msgSucessUpdate') }}</Strong>
                            @endif
                        </div>

                        <!--    Mensagem de sucesso metodo delete  -->
                        <div class="alert alert-success beautiful" role="alert" style="width: 100%;padding-top: 8px;padding-bottom: 8px;">
                            @if(session('msgSucessDelete'))
                            <Strong>{{ session('msgSucessDelete') }}</Strong>
                            @endif
                        </div>
                    </main>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-xl-5 offset-xl-0 justify-content-end align-items-center" style="width: 100%;">
                                <div class="text-md-right justify-content-start align-items-center dataTables_filter" id="dataTable_filter" style="width: 100%;padding-right: 10px;padding-left: 10px;height: 50px;"><label style="width: 100%;"><input class="border rounded border-primary shadow form-control form-control-sm" type="search" aria-controls="dataTable" placeholder="Pesquisa..." style="padding-bottom: 0px;height: 40px;" autocomplete="on" name="search"></label></div>
                            </div>
                            <div class="col-md-6 col-xl-7 offset-xl-0 d-flex justify-content-end align-items-center">
                                <div class="btn-group" role="group">
                                    <a class="btn border rounded" role="button" style="background-color: #3ba2dc;height: 40px;color: #ffffff;" href="{{('/drcurso/create')}}"><i class="fas fa-user-plus"></i>&nbsp; Novo Dr. Curso<br></a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive" data-aos="fade-up" data-aos-duration="800" data-aos-delay="800">
                            <table class="table">
                                <thead>

                                    <tr>
                                        <th style="color: #3a3a3b;">Nome</th>
                                        <th style="color: #3a3a3b;">Email</th>
                                        <th style="color: #3a3a3b;">Nome do&nbsp;Usuário<br></th>
                                        <th style="color: #3a3a3b;">Curso</th>
                                        <th style="color: #3a3a3b;">Activo</th>
                                        <th style="color: #3a3a3b;">Dr. curso</th>
                                        <th class="text-left" style="color: #3a3a3b;">Acção<br></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($drcurso as $user)

                                    <tr>
                                        <td class="d-flex align-items-center" style="color: #3a3a3b;"><img class="rounded-circle" src="/ficheiros/docentes/fotos/{{$user->drcursoUser->foto}}" width="40px" style="margin-right: 10px;" height="40px">{{$user->name}}</td>
                                        <td style="color: #3a3a3b;">{{$user->email}}</td>
                                        <td style="color: #3a3a3b;">{{$user->username}}</td>
                                        <td style="color: #3a3a3b;">{{$user->drcursoUser->curso}}</td>
                                        <td>@if($user->is_active)<i class="fa fa-check" style="color: #3a3a3b;margin-top: 6px;"></i>@endif</td>
                                        <td>@if($user->is_drcurso)<i class="fa fa-check" style="color: #3a3a3b;margin-top: 6px;"></i>@endif</td>
                                        <td>
                                            <div class="col d-flex align-items-start align-content-start">
                                                <a class="btn btn-sm" type="button" href="/usuario/editdrcurso/{{$user->id}}" style="background-color: #0ccf94;color: rgb(242,244,245);margin-right: 10px;margin-top: 6px;"><icon-icon name="create-outline"></icon>Editar</a>
                                                <form action="/usuario/deletedrcurso/{{ $user->id }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm" type="submit" style="background-color: #f51616;color: rgb(243,246,248);margin-right: 10px;margin-top: 6px;"><icon-icon name="trash-outline"></icon-icon>Eliminar</button>

                                                </form>
                                                <a class="btn btn-sm" type="button" href="/usuario/showdrcurso/{{$user->id}}" style="background-color: #0280c6;color: rgb(243,246,248);margin-top: 6px;">Ver</a>

                                            </div>
                                        </td>
                                    </tr>

                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                        <div class="row">
                            <div class="col-md-6 align-self-center">
                                <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of 27</p>
                            </div>
                            <div class="col-md-6">
                                <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                    <ul class="pagination">
                                        <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>