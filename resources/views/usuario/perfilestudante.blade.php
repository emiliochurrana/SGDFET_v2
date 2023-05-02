@extends('layouts.user')

@section('title', 'Perfil')

@section('content')

    <section style="background-repeat: no-repeat;background-size: cover;">
        <div class="container" style="background-image: url(&quot;/../img/Background_Page.jpg&quot;);background-repeat: no-repeat;background-size: cover;max-width: 100%;padding-right: 0px;padding-left: 0px;">
            <nav class="navbar navbar-light navbar-expand-md shadow-lg navigation-clean" style="background-color: rgba(255,255,255,0);padding: 8px;">
                <div class="container-fluid">
                    <a class="navbar-brand text-white" href="#" style="background-size: cover;background-position: center;padding-right: 10px;padding-left: 10px;font-family: Roboto, sans-serif;font-weight: bold;">
                        <i class="fas fa-user-graduate"></i>SGDFET&nbsp;&nbsp;
                        <small class="text-center border rounded border-white" style="font-size: 10px;font-weight: bold;background-color: rgb(248,248,248);font-style: normal;font-family: ABeeZee, sans-serif;padding: 5px;padding-top: 1px;padding-bottom: 1px;color: rgb(27,147,198);">v.1.0</small>
                    </a>
                    <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1" style="background-color: rgb(254,252,252);">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navcol-1">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" href="{{('/inicio')}}" style="color: rgb(255,255,255);font-size: 16px;">Inicio</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="dropdown-toggle nav-link text-white" data-toggle="dropdown" aria-expanded="false" href="#" style="font-size: 16px;">Mais&nbsp;</a>
                                <div class="dropdown-menu bg-white" role="menu">
                                    <a class="dropdown-item" style="font-size: 16px;" role="presentation" data-bs-hover-animate="pulse" href="{{('/defesas')}}" style="color: rgb(90,161,220);">Defesas</a>
                                    <a class="dropdown-item" style="font-size: 16px;" role="presentation" data-bs-hover-animate="pulse" href="{{('/monografias')}}" style="color: rgb(90,161,220);">Monografias</a>
                                </div>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-white" href="{{('/sobre/depois')}}" style="font-size: 16px;">Sobre</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <div class="nav-item dropdown no-arrow">
                                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">
                                        <span class="badge badge-danger badge-counter" style="font-size: 12px;">3+</span>
                                        <i class="fas fa-bell fa-fw" style="color: #ffffff;"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in" role="menu">
                                        <h6 class="dropdown-header" style="background-color: #74d0f6;">alerts center</h6>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="mr-3">
                                                <div class="icon-circle" style="background-color: #74d0f6;">
                                                    <i class="fas fa-file-alt text-white"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <span class="small text-gray-500">December 12, 2019</span>
                                                <p>A new monthly report is ready to download!</p>
                                            </div>
                                        </a>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="mr-3">
                                                <div class="bg-success icon-circle">
                                                    <i class="fas fa-donate text-white"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <span class="small text-gray-500">December 7, 2019</span>
                                                <p>$290.29 has been deposited into your account!</p>
                                            </div>
                                        </a>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="mr-3">
                                                <div class="bg-warning icon-circle">
                                                    <i class="fas fa-exclamation-triangle text-white"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <span class="small text-gray-500">December 2, 2019</span>
                                                <p>Spending Alert: We've noticed unusually high spending for your account.</p>
                                            </div>
                                        </a>
                                        <a class="text-center dropdown-item small text-gray-500" href="{{('/notificacoes')}}">Visualizar todas alertas</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow" role="presentation">
                                <div class="nav-item dropdown no-arrow">
                                    <a class="dropdown-toggle text-white nav-link" style="font-size: 16px" data-toggle="dropdown" aria-expanded="false" href="#">
                                        <span style="margin-right: 5px;">{{auth()->user()->name}}</span>
                                        <img class="border rounded-circle img-profile" src="/ficheiros/estudantes/fotos/{{auth()->user()->estudanteUser->foto}}" width="30px" height="30px">
                                    </a>
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu">
                                        <!--<a class="dropdown-item" role="presentation" href="#"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a>
                                        <a class="dropdown-item" role="presentation" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a>
                                        <a class="dropdown-item" role="presentation" href="#"><i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Activity log</a>-->
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" style="font-size: 16px;" role="presentation" href="{{ ('/usuario/logout') }}"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="row" style="padding: 20px;padding-bottom: 20px;">
                <div class="col-12 col-sm-11 col-md-6 col-lg-8 col-xl-7 offset-xl-1" style="padding-right: 300px;">
                    <small class="form-text text-white" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="800" style="font-size: 20px;color: rgb(237,238,239);width: 250px;padding: 10px;padding-right: 0px;padding-left: 0px;font-family: ABeeZee, sans-serif;">Sistema de Gestão de Defesas FET<br></small>
                    <small class="form-text text-justify text-white" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="800" style="color: rgb(229,236,242);font-size: 14px;padding-bottom: 10px;width: 320px;">
                        Agora ficou fácil, agende a sua defesa hoje e&nbsp; deixe tudo nas nossas mãos. Juntos com a tecnologia, por um futuro melhor, Engenheiros bem formados e informados, prontos para servir e responder a demanda da sociedade.<br>
                    </small>
                </div>
                <div class="col-sm-5 col-md-6 col-lg-4 col-xl-4 offset-xl-0 text-center" style="padding-top: 5px;padding-bottom: 15px;">
                    <img data-aos="zoom-in" data-aos-duration="800" data-aos-delay="800" style="width: 160px;height: 210px;background-size: cover;background-repeat: no-repeat;background-position: center;" src="/../img/image1.png" loading="eager">
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-11 offset-xl-1 d-flex d-sm-flex d-md-flex d-lg-flex d-xl-inline-flex justify-content-md-start justify-content-lg-start" style="max-width: 100%;">
                    <small class="form-text text-left text-light" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="800" style="color: #ffffff;font-size: 16px;margin-bottom: 4px;margin-right: 5px;">Submeta já a tua defesa dando um click no&nbsp;botão <br></small>
                    <div class="modal fade centro" role="dialog" tabindex="-1" id="modal">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 style="color: rgb(134,134,135);">Submeta</h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h3 class="titulos" style="color: rgb(127,129,132);">Formulário de Submissão: </h3>
                                    <div class="col text-left d-flex padMar">
                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                            <span class="input-group-addon btn btn-default btn-file">
                                                <span class="fileinput-new">Upload de Declaração de Notas</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" placeholder="click aqui" name="declaracao">
                                            </span>
                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            <div class="form-control" data-trigger="fileinput">
                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                <span class="fileinput-filename"></span>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-xl-12 d-flex">
                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                            <span class="input-group-addon btn btn-default btn-file">
                                                <span class="fileinput-new">Upload de Monografia</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="monografia">
                                            </span>
                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            <div class="form-control" data-trigger="fileinput">
                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                <span class="fileinput-filename"></span>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                            <span class="input-group-addon btn btn-default btn-file">
                                                <span class="fileinput-new">Upload de Curriculum Vitae</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="curriculum">
                                            </span>
                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            <div class="form-control" data-trigger="fileinput">
                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                <span class="fileinput-filename"></span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-sm text-white-50 border rounded btn-Oscuro" type="button" style="background-color: #2a81a6;color: #f4eeee;">Submeter</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-sm text-body border rounded border-success shadow-lg btn-Oscuro" data-bs-hover-animate="tada" data-toggle="modal" data-target="#modal" type="button" style="background-color: #ffffff;">Submeter</button>
                </div>
            </div>
        </div>
    </section>
    <section style="max-width: 100%;padding: 20px;">
    @foreach($estudantes as $estudante)
        <div class="container border rounded shadow" style="padding-bottom: 0px;max-width: 100%;padding-right: 0px;padding-left: 0px;">
            <div class="row" style="padding-top: 0px;padding-bottom: 0px;margin-top: 20px;">
                <div class="col-xl-10 offset-xl-0" style="height: 40px;">
                    <h2 data-aos="zoom-in" data-aos-duration="400" data-aos-delay="400" style="font-family: Roboto, sans-serif;font-weight: bold;color: #68c7ef;margin-left: 20px;">Perfil de {{$estudante->userEstudante->name}}</h2>
                </div>
                <div class="col-xl-2" style="height: 40px;">
                    <div class="form-group d-flex justify-content-end align-items-end" data-aos="zoom-in" data-aos-duration="450" data-aos-delay="450" style="margin-right: 25px;">
                        <a class="btn" href="/usuario/editperfilestudante/{{$estudante->userEstudante->id}}" type="button" style="color: rgb(255,255,255);background-color: #0ccf94;">Editar Perfil</a>
                    </div>
                </div>
                <div class="col-xl-12 offset-xl-0">
                    <hr style="background-color: #3ba2dc;margin-top: 5px;">
                </div>
            </div>
            <div class="row no-gutters text-justify align-items-sm-center" style="padding: 40px;padding-top: 10px;padding-bottom: 20px;max-width: 100%;">
                <div class="col-xl-4 offset-xl-0 d-xl-flex align-items-sm-center align-items-md-center align-items-lg-center justify-content-xl-center align-items-xl-center" data-aos="zoom-in" data-aos-duration="450" data-aos-delay="450" style="height: 100%;">
                    <img class="rounded-circle img-fluid" style="background-size: cover;" src="/ficheiros/estudantes/fotos/{{$estudante->foto}}">
                </div>
                <div class="col" data-aos="zoom-in" data-aos-duration="450" data-aos-delay="450" style="height: 100%;padding-bottom: 0px;">
                    <p data-aos="zoom-in" data-aos-duration="450" data-aos-delay="450" style="color: #000000;"><strong>Nome:</strong> {{$estudante->userEstudante->name}}</p>
                    <p data-aos="zoom-in" data-aos-duration="450" data-aos-delay="450" style="color: #000000;"><strong>Numero do estudante: </strong> {{$estudante->num_estudante}}</p>
                    <p data-aos="zoom-in" data-aos-duration="450" data-aos-delay="450" style="color: #000000;"><strong>Regime: </strong>{{$estudante->regime}}</p>
                    <p data-aos="zoom-in" data-aos-duration="450" data-aos-delay="450" style="color: #000000;"><strong>Nome do usuario: </strong>{{$estudante->userEstudante->username}}</p>
                    <p data-aos="zoom-in" data-aos-duration="450" data-aos-delay="450" style="color: #000000;"><strong>Ano de ingresso: </strong>{{$estudante->ano_ingresso}}</p>
                    <p data-aos="zoom-in" data-aos-duration="450" data-aos-delay="450" style="color: #000000;"><strong>E-mail:</strong> {{$estudante->userEstudante->email}}&nbsp;</p>
                </div>
            </div>
        @endforeach
        @foreach($dados as $dado)
            <div class="row" style="padding: 40px;padding-top: 5px;max-width: 100%;">
                <div class="col offset-xl-0">
                    <p data-aos="zoom-in" data-aos-duration="450" data-aos-delay="450" style="color: #000000;"><strong>Bilhete de Identidade:</strong> {{$dado->bi}}</p>
                    <p data-aos="zoom-in" data-aos-duration="450" data-aos-delay="450" style="color: #000000;"><strong>Declaracao de Notas:&nbsp;</strong> {{$dado->declaracao_nota}}</p>
                    <p data-aos="zoom-in" data-aos-duration="450" data-aos-delay="450" style="color: #000000;"><strong>Monografia:</strong> {{$dado->monografia}}</p>
                    <p data-aos="zoom-in" data-aos-duration="450" data-aos-delay="450" style="color: #000000;"><strong>Curriculum:</strong> {{$dado->curriculum}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </section>
