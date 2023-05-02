@extends('layouts.user')

@section('title', 'Home')

@section('content')
<section style="background-repeat: no-repeat;background-size: cover;">
    <div class="container" style="background-image: url(&quot;../img/Background_Page.jpg&quot;);background-repeat: no-repeat;background-size: cover;max-width: 100%;padding-right: 0px;padding-left: 0px;">
        <nav class="navbar navbar-light navbar-expand-md shadow-lg navigation-clean" style="background-color: rgba(255,255,255,0);padding: 8px;">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="#" style="background-size: cover;background-position: center;padding-right: 10px;padding-left: 10px;font-family: Roboto, sans-serif;font-weight: bold;">
                    <i class="fas fa-user-graduate"></i>SGDFET&nbsp;&nbsp;<small class="text-center border rounded border-white" style="font-size: 10px;font-weight: bold;background-color: rgb(248,248,248);font-style: normal;font-family: ABeeZee, sans-serif;padding: 5px;padding-top: 1px;padding-bottom: 1px;color: rgb(27,147,198);">v.1.0</small>
                </a>
                <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1" style="background-color: rgb(254,252,252);">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" href="{{'/inicio'}}" style="color: rgb(255,255,255);font-size: 16px;">Inicio</a>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ ('/monografias') }}" style="color: rgb(255,255,255);font-size: 16px;">Monografias</a>
                            <!--<a class="dropdown-toggle nav-link text-white" data-toggle="dropdown" aria-expanded="false" href="#" style="font-size: 16px;">Mais&nbsp;</a>
                            <div class="dropdown-menu bg-white" role="menu">
                                <a class="dropdown-item" role="presentation" data-bs-hover-animate="pulse" href="{{ ('/defesas') }}" style="color: rgb(90,161,220); font-size:16px;">Defesas</a>
                                <a class="dropdown-item" role="presentation" data-bs-hover-animate="pulse" href="{{ ('/monografias') }}" style="color: rgb(90,161,220); font-size:16px;">Monografias</a>
                            </div>-->
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
                                <a class="dropdown-toggle text-white nav-link" data-toggle="dropdown" aria-expanded="false" href="#">
                                    <span style="margin-right: 5px; font-size:16px;">{{auth()->user()->name}}</span>
                                    <img class="border rounded-circle img-profile" src="/ficheiros/estudantes/fotos/{{auth()->user()->estudanteUser->foto}}" width="30px" height="30px">
                                </a>
                                <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu">
                                    <a class="dropdown-item" style="font-size:16px;" role="presentation" href="usuario/perfilestudante/{{auth()->user()->id}}"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a>
                                    <!--<a class="dropdown-item" role="presentation" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a>
                                    <a class="dropdown-item" role="presentation" href="#"><i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Activity log</a>-->
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" style="font-size:16px;" role="presentation" href="{{('/usuario/logout')}}"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a>
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
                <small class="form-text text-justify text-white" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="800" style="color: rgb(229,236,242);font-size: 14px;padding-bottom: 10px;width: 320px;">Agora ficou fácil, agende a sua defesa hoje e&nbsp; deixe tudo nas nossas mãos. Juntos com a tecnologia, por um futuro melhor, Engenheiros bem formados e informados, prontos para servir e responder a demanda da sociedade.<br></small>
            </div>
            <div class="col-sm-5 col-md-6 col-lg-4 col-xl-4 offset-xl-0 text-center" style="padding-top: 5px;padding-bottom: 15px;">
                <img data-aos="zoom-in" data-aos-duration="800" data-aos-delay="800" style="width: 160px;height: 210px;background-size: cover;background-repeat: no-repeat;background-position: center;" src="../img/image1.png" loading="eager">
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-11 offset-xl-1 d-flex d-sm-flex d-md-flex d-lg-flex d-xl-inline-flex justify-content-md-start justify-content-lg-start" style="max-width: 100%;">
                <small class="form-text text-left text-light" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="800" style="color: #ffffff;font-size: 16px;margin-bottom: 4px;margin-right: 5px;">Submeta já a tua defesa dando um click no&nbsp;botão <br></small>
                <form method="post" role="form" action="/dados" enctype="multipart/form-data">
                    @csrf
                    <div class="modal fade centro" role="dialog" tabindex="-1" id="modal">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 style="color: rgb(134,134,135);">Submeta</h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>

                                <form>
                                <div class="modal-body">
                                    <h3 class="titulos" style="color: rgb(127,129,132);">Formulário de Submissão: </h3> 
                                    <div class="col text-left d-flex padMar">
                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                            <span class="input-group-addon btn btn-default btn-file">
                                                <span class="fileinput-new">Upload de Bi</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" placeholder="click aqui" name="bi">
                                            </span>
                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            <div class="form-control" data-trigger="fileinput">
                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                <span class="fileinput-filename"></span>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col text-left d-flex padMar">
                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                            <span class="input-group-addon btn btn-default btn-file">
                                                <span class="fileinput-new">Upload de Declaração de Notas</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" placeholder="click aqui" name="declaracao_nota">
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
                                    <button class="btn btn-sm text-white-50 border rounded btn-Oscuro" type="submit" style="background-color: #2a81a6;color: #f4eeee;">Submeter</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                <button class="btn btn-sm text-body border rounded border-success shadow-lg btn-Oscuro" data-bs-hover-animate="tada" data-toggle="modal" data-target="#modal" type="button" style="background-color: #ffffff;">Submeter</button>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container" style="max-width: 100%;background-image: url(&quot;../img/fundo3.png&quot;);background-repeat: no-repeat;background-size: cover;background-position: center;padding-bottom: 300px;padding-top: 300px;">
        <div class="row d-xl-flex" style="margin-right: 10px;margin-left: 10px;padding-bottom: 20px;margin-top: 20px;">
            <div class="col">
                <h2 style="color: #68c7ef;font-weight: bold;width: 100%;">Pesquisa de Defesas</h2>
                <hr style="background-color: #68c7ef;margin-top: 5px;">
            </div>
            <div class="col-12 col-xl-12 offset-3 offset-xl-0 d-inline-flex d-sm-inline-flex d-md-inline-flex d-lg-inline-flex d-xl-inline-flex m-auto m-sm-auto m-md-auto m-lg-auto justify-content-xl-end m-xl-auto" style="padding-top: 20px;padding-bottom: 20px;">

                <form class="d-inline-flex d-sm-inline-flex d-md-inline-flex d-lg-inline-flex d-xl-inline-flex m-sm-auto m-md-auto m-lg-auto m-xl-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="get" action="/" enctype="multipart/form-data" style="padding-bottom: 0px;padding-top: 0px;max-width: 200%;min-width: 50%;">
                    <div class="input-group">
                        <input class="bg-white shadow-lg form-control form-control-lg border-0 small" type="text" placeholder="Procura..." name="search" autocomplete="on">
                        <div class="input-group-append">
                            <button class="btn py-0" type="button" style="background-color: #28a8de;">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="col">
                <section class="card-section-imagia" style="padding-top: 15px;padding-bottom: 10px;background-color: rgba(241,241,241,0);">
                    <div class="container" style="padding-right: 0px;padding-left: 0px;">
                        <p style="font-family: Roboto, sans-serif;color: #021b34;">Nenhuma defesa encontrada como: titulo!</p>
                        <div class="row" style="margin: 0px;padding: 20px;padding-right: 10px;padding-left: 10px;">
                            <div class="col-sm-6 col-md-4 col-lg-6 col-xl-3" style="padding-right: 5px;padding-left: 5px;max-width: 100%;">
                                <div class="shadow card-container-imagia">
                                    <div class="card-imagia">
                                        <div class="front-imagia">
                                            <div class="cover-imagia">
                                                <img alt="" src="../img/8sl6Q86gsfM.jpg">
                                            </div>
                                            <div class="user-imagia">
                                                <img class="rounded-circle img-circle" alt="" src="../img/img-2.jpg" style="width: 100px;height: 100px;">
                                            </div>
                                            <div class="content-imagia" style="padding-top: 0px;padding-bottom: 5px;">
                                                <h3 class="name-imagia" style="color: rgb(2,25,48);font-size: 18px;font-family: Roboto, sans-serif;font-weight: bold;">Yolanda Emidio</h3>
                                                <p class="text-justify subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 12px;font-family: Roboto, sans-serif;font-weight: bold;">Tema: Sistema de Gestao de Arquivo</p>
                                                <p class="text-justify subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 12px;font-family: Roboto, sans-serif;font-weight: bold;">Supervisor: dra. Martina Barros</p>
                                                <p class="text-justify subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 12px;font-family: Roboto, sans-serif;font-weight: bold;">Data: 02/05/2022</p>
                                            </div>
                                            <div class="footer-imagia">
                                                <span style="color: rgb(2,25,48);font-family: Roboto, sans-serif;font-weight: normal;">
                                                    <i class="fa fa-plus"></i> Mais
                                                </span>
                                            </div>
                                        </div>
                                        <div class="back-imagia">
                                            <div class="content-imagia content-back-imagia">
                                                <div>
                                                    <p class="text-justify subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 12px;font-weight: bold;font-family: Roboto, sans-serif;">Nivel: Licenciatura</p>
                                                    <p class="text-justify subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 12px;font-family: Roboto, sans-serif;font-weight: bold;">Curso: Informatica</p>
                                                    <p class="text-center">Et hanc quidem praeter oppida multa duae civitates exornant Seleucia opus Seleuci regis, et Claudiopolis quam deduxit coloniam Claudius Caesar.&nbsp;</p>
                                                </div>
                                            </div>
                                            <div class="footer-imagia">
                                                <div class="social-imagia text-center">
                                                    <button class="btn btn-sm border rounded" type="button" style="font-weight: bold;font-family: Roboto, sans-serif;background-color: #16e8f5;">Saber Mais</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-6 col-xl-3" style="padding-right: 5px;padding-left: 5px;max-width: 100%;">
                                <div class="shadow card-container-imagia">
                                    <div class="card-imagia">
                                        <div class="front-imagia">
                                            <div class="cover-imagia">
                                                <img alt="" src="../img/8sl6Q86gsfM.jpg">
                                            </div>
                                            <div class="user-imagia">
                                                <img class="rounded-circle img-circle" alt="" src="../img/img-1.jpg" style="width: 100px;height: 100px;">
                                            </div>
                                            <div class="footer-imagia">
                                                <span style="color: rgb(2,25,48);font-family: Roboto, sans-serif;">
                                                    <i class="fa fa-plus"></i>&nbsp;Mais
                                                </span>
                                            </div>
                                            <div class="content-imagia" style="padding-top: 0px;padding-bottom: 5px;">
                                                <h3 class="name-imagia" style="color: rgb(2,25,48);font-size: 18px;font-family: Roboto, sans-serif;font-weight: bold;">Nunes Jose Churrana</h3>
                                                <p class="text-justify subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 12px;font-family: Roboto, sans-serif;font-weight: bold;">Tema: Sistema de Gestao Farmaceutico</p>
                                                <p class="text-justify subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 12px;font-family: Roboto, sans-serif;font-weight: bold;">Supervisor: Msc. Claudia Jovo Gune</p>
                                                <p class="text-justify subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 12px;font-family: Roboto, sans-serif;font-weight: bold;">Data: 04/04/2022</p>
                                            </div>
                                        </div>
                                        <div class="back-imagia">
                                            <div class="content-imagia content-back-imagia">
                                                <div>
                                                    <p class="text-justify subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 12px;font-weight: bold;font-family: Roboto, sans-serif;">Nivel: Licenciatura</p>
                                                    <p class="text-justify subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 12px;font-family: Roboto, sans-serif;font-weight: bold;">Curso: Informatica</p>
                                                    <p class="text-center">Et hanc quidem praeter oppida multa duae civitates exornant Seleucia opus Seleuci regis, et Claudiopolis quam deduxit coloniam Claudius Caesar</p>
                                                </div>
                                            </div>
                                            <div class="footer-imagia">
                                                <div class="social-imagia text-center">
                                                    <button class="btn btn-sm border rounded" type="button" style="font-weight: bold;font-family: Roboto, sans-serif;background-color: #16e8f5;">Saber Mais</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-6 col-xl-3" style="padding-right: 5px;padding-left: 5px;max-width: 100%;">
                                <div class="shadow card-container-imagia">
                                    <div class="card-imagia">
                                        <div class="front-imagia">
                                            <div class="cover-imagia">
                                                <img alt="" src="../img/8sl6Q86gsfM.jpg">
                                            </div>
                                            <div class="user-imagia">
                                                <img class="rounded-circle img-circle" alt="" src="../img/img-1.jpg" style="width: 100px;height: 100px;">
                                            </div>
                                            <div class="footer-imagia">
                                                <span style="color: rgb(2,25,48);font-family: Roboto, sans-serif;">
                                                    <i class="fa fa-plus"></i> Mais
                                                </span>
                                            </div>
                                            <div class="content-imagia" style="padding-top: 0px;padding-bottom: 5px;">
                                                <h3 class="text-center name-imagia" style="color: rgb(2,25,48);font-size: 18px;font-family: Roboto, sans-serif;font-weight: bold;">Marcela Capezulo</h3>
                                                <p class="text-left subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 12px;font-family: Roboto, sans-serif;font-weight: bold;">Tema: Sistemas Electricos&nbsp;</p>
                                                <p class="text-left subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 12px;font-family: Roboto, sans-serif;font-weight: bold;">Supervisor: dr. Sansao Timbane</p>
                                                <p class="text-left subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 13px;font-family: Roboto, sans-serif;font-weight: bold;">Data: 10/05/2022</p>
                                            </div>
                                        </div>
                                        <div class="back-imagia">
                                            <div class="content-imagia content-back-imagia">
                                                <div>
                                                    <p class="text-left subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 12px;font-weight: bold;font-family: Roboto, sans-serif;">Nivel: Licenciatura</p>
                                                    <p class="text-left subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 12px;font-family: Roboto, sans-serif;font-weight: bold;">Curso: Engenharia Electronica</p>
                                                    <p class="text-center">Et hanc quidem praeter oppida multa duae civitates exornant Seleucia opus Seleuci regis, et Claudiopolis quam deduxit coloniam Claudius Caesar.&nbsp;</p>
                                                </div>
                                            </div>
                                            <div class="footer-imagia">
                                                <div class="social-imagia text-center">
                                                    <button class="btn btn-sm border rounded" type="button" style="font-weight: bold;font-family: Roboto, sans-serif;background-color: #16e8f5;">Saber Mais</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-6 col-xl-3" style="padding-right: 5px;padding-left: 5px;width: 100%;">
                                <div class="shadow card-container-imagia">
                                    <div class="card-imagia">
                                        <div class="front-imagia">
                                            <div class="cover-imagia">
                                                <img alt="" src="../img/8sl6Q86gsfM.jpg">
                                            </div>
                                            <div class="user-imagia">
                                                <img class="rounded-circle img-circle" alt="" src="../img/img-1.jpg" style="width: 100px;height: 100px;">
                                            </div>
                                            <div class="footer-imagia">
                                                <span style="color: rgb(2,25,48);font-family: Roboto, sans-serif;">
                                                    <i class="fa fa-plus"></i> Mais
                                                </span>
                                            </div>
                                            <div class="content-imagia" style="padding-top: 0px;padding-bottom: 5px;">
                                                <h3 class="text-center name-imagia" style="color: rgb(2,25,48);font-size: 18px;font-family: Roboto, sans-serif;font-weight: bold;">Emilio Jose Churrana</h3>
                                                <p class="text-left subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 12px;font-family: Roboto, sans-serif;font-weight: bold;">Tema: Sistema de Gestao de Defesas</p>
                                                <p class="text-left subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 12px;font-family: Roboto, sans-serif;font-weight: bold;">Supervisor: dr. Aurelio Ribeiro</p>
                                                <p class="text-left subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 12px;font-family: Roboto, sans-serif;font-weight: bold;">Data: 06/05/2022</p>
                                            </div>
                                        </div>
                                        <div class="back-imagia">
                                            <div class="content-imagia content-back-imagia">
                                                <div>
                                                    <p class="text-left subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 12px;font-weight: bold;font-family: Roboto, sans-serif;">Nivel: Licenciatura&nbsp;</p>
                                                    <p class="text-left subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 13px;font-family: Roboto, sans-serif;font-weight: bold;">Curso: Informatica</p>
                                                    <p class="text-center">Et hanc quidem praeter oppida multa duae civitates exornant Seleucia opus Seleuci regis, et Claudiopolis quam deduxit coloniam Claudius Caesar.</p>
                                                </div>
                                            </div>
                                            <div class="footer-imagia">
                                                <div class="social-imagia text-center">
                                                    <button class="btn btn-sm border rounded" type="button" style="font-weight: bold;font-family: Roboto, sans-serif;background-color: #16e8f5;">Saber Mais</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <div class="container" style="max-width: 100%;">
        <div class="row text-center" style="padding-right: 40px;padding-left: 40px;">
            <div class="col" data-aos="fade-down" data-aos-duration="800" data-aos-delay="800" style="padding-right: 0px;padding-left: 0px;">
                <h2 class="text-justify" style="color: #68c7ef;font-weight: bold;padding-top: 10px;">FET Defesas</h2>
                <hr style="background-color: #68c7ef;margin-top: 5px;">
                <div class="carousel slide" data-ride="carousel" data-interval="false" id="carousel-2" style="padding-bottom: 10px;padding-right: 30px;padding-left: 30px;">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <section class="card-section-imagia" style="padding-top: 15px;padding-bottom: 10px;background-color: rgba(241,241,241,0);">
                                <div class="container" style="padding-right: 0px;padding-left: 0px;">
                                    <div class="row" style="margin: 0px;padding: 20px;padding-right: 10px;padding-left: 10px;">
                                        <div class="col-sm-6 col-md-4 col-lg-6 col-xl-3" style="padding-right: 5px;padding-left: 5px;max-width: 100%;">
                                            <div class="shadow card-container-imagia">
                                                <div class="card-imagia">
                                                    <div class="front-imagia">
                                                        <div class="cover-imagia">
                                                            <img alt="" src="../img/8sl6Q86gsfM.jpg">
                                                        </div>
                                                        <div class="user-imagia">
                                                            <img class="rounded-circle img-circle" alt="" src="../img/img-2.jpg" style="width: 100px;height: 100px;">
                                                        </div>
                                                        <div class="content-imagia" style="padding-top: 0px;padding-bottom: 5px;">
                                                            <h3 class="name-imagia" style="color: rgb(2,25,48);font-size: 18px;font-family: Roboto, sans-serif;font-weight: bold;">Yolanda Emidio</h3>
                                                            <p class="text-justify subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 12px;font-family: Roboto, sans-serif;font-weight: bold;">Tema: Sistema de Gestao de Arquivo</p>
                                                            <p class="text-justify subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 12px;font-family: Roboto, sans-serif;font-weight: bold;">Supervisor: dra. Martina Barros</p>
                                                            <p class="text-justify subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 12px;font-family: Roboto, sans-serif;font-weight: bold;">Data: 02/05/2022</p>
                                                        </div>
                                                        <div class="footer-imagia">
                                                            <span style="color: rgb(2,25,48);font-family: Roboto, sans-serif;font-weight: normal;">
                                                                <i class="fa fa-plus"></i> Mais
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="back-imagia">
                                                        <div class="content-imagia content-back-imagia">
                                                            <div>
                                                                <p class="text-justify subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 12px;font-weight: bold;font-family: Roboto, sans-serif;">Nivel: Licenciatura</p>
                                                                <p class="text-justify subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 12px;font-family: Roboto, sans-serif;font-weight: bold;">Curso: Informatica</p>
                                                                <p class="text-center">Et hanc quidem praeter oppida multa duae civitates exornant Seleucia opus Seleuci regis, et Claudiopolis quam deduxit coloniam Claudius Caesar.&nbsp;</p>
                                                            </div>
                                                        </div>
                                                        <div class="footer-imagia">
                                                            <div class="social-imagia text-center"><button class="btn btn-sm border rounded" type="button" style="font-weight: bold;font-family: Roboto, sans-serif;background-color: #16e8f5;color: #ffffff;">Saber mais</button></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6 col-xl-3" style="padding-right: 5px;padding-left: 5px;max-width: 100%;">
                                            <div class="shadow card-container-imagia">
                                                <div class="card-imagia">
                                                    <div class="front-imagia">
                                                        <div class="cover-imagia">
                                                            <img alt="" src="../img/8sl6Q86gsfM.jpg">
                                                        </div>
                                                        <div class="user-imagia">
                                                            <img class="rounded-circle img-circle" alt="" src="../img/img-1.jpg" style="width: 100px;height: 100px;">
                                                        </div>
                                                        <div class="footer-imagia">
                                                            <span style="color: rgb(2,25,48);font-family: Roboto, sans-serif;">
                                                                <i class="fa fa-plus"></i>&nbsp;Mais
                                                            </span>
                                                        </div>
                                                        <div class="content-imagia" style="padding-top: 0px;padding-bottom: 5px;">
                                                            <h3 class="name-imagia" style="color: rgb(2,25,48);font-size: 18px;font-family: Roboto, sans-serif;font-weight: bold;">Nunes Jose Churrana</h3>
                                                            <p class="text-justify subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 12px;font-family: Roboto, sans-serif;font-weight: bold;">Tema: Sistema de Gestao Farmaceutico</p>
                                                            <p class="text-justify subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 12px;font-family: Roboto, sans-serif;font-weight: bold;">Supervisor: Msc. Claudia Jovo Gune</p>
                                                            <p class="text-justify subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 12px;font-family: Roboto, sans-serif;font-weight: bold;">Data: 04/04/2022</p>
                                                        </div>
                                                    </div>
                                                    <div class="back-imagia">
                                                        <div class="content-imagia content-back-imagia">
                                                            <div>
                                                                <p class="text-justify subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 12px;font-weight: bold;font-family: Roboto, sans-serif;">Nivel: Licenciatura</p>
                                                                <p class="text-justify subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 12px;font-family: Roboto, sans-serif;font-weight: bold;">Curso: Informatica</p>
                                                                <p class="text-center">Et hanc quidem praeter oppida multa duae civitates exornant Seleucia opus Seleuci regis, et Claudiopolis quam deduxit coloniam Claudius Caesar</p>
                                                            </div>
                                                        </div>
                                                        <div class="footer-imagia">
                                                            <div class="social-imagia text-center">
                                                                <button class="btn btn-sm border rounded" type="button">Saber mais</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6 col-xl-3" style="padding-right: 5px;padding-left: 5px;max-width: 100%;">
                                            <div class="shadow card-container-imagia">
                                                <div class="card-imagia">
                                                    <div class="front-imagia">
                                                        <div class="cover-imagia">
                                                            <img alt="" src="../img/8sl6Q86gsfM.jpg">
                                                        </div>
                                                        <div class="user-imagia">
                                                            <img class="rounded-circle img-circle" alt="" src="../img/img-1.jpg" style="width: 100px;height: 100px;">
                                                        </div>
                                                        <div class="footer-imagia">
                                                            <span style="color: rgb(2,25,48);font-family: Roboto, sans-serif;">
                                                                <i class="fa fa-plus"></i> Mais
                                                            </span>
                                                        </div>
                                                        <div class="content-imagia" style="padding-top: 0px;padding-bottom: 5px;">
                                                            <h3 class="text-center name-imagia" style="color: rgb(2,25,48);font-size: 18px;font-family: Roboto, sans-serif;font-weight: bold;">Marcela Capezulo</h3>
                                                            <p class="text-left subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 12px;font-family: Roboto, sans-serif;font-weight: bold;">Tema: Sistemas Electricos&nbsp;</p>
                                                            <p class="text-left subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 12px;font-family: Roboto, sans-serif;font-weight: bold;">Supervisor: dr. Sansao Timbane</p>
                                                            <p class="text-left subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 13px;font-family: Roboto, sans-serif;font-weight: bold;">Data: 10/05/2022</p>
                                                        </div>
                                                    </div>
                                                    <div class="back-imagia">
                                                        <div class="content-imagia content-back-imagia">
                                                            <div>
                                                                <p class="text-left subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 12px;font-weight: bold;font-family: Roboto, sans-serif;">Nivel: Licenciatura</p>
                                                                <p class="text-left subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 12px;font-family: Roboto, sans-serif;font-weight: bold;">Curso: Engenharia Electronica</p>
                                                                <p class="text-center">Et hanc quidem praeter oppida multa duae civitates exornant Seleucia opus Seleuci regis, et Claudiopolis quam deduxit coloniam Claudius Caesar.&nbsp;</p>
                                                            </div>
                                                        </div>
                                                        <div class="footer-imagia">
                                                            <div class="social-imagia text-center">
                                                                <button class="btn btn-sm border rounded" type="button" style="font-weight: bold;font-family: Roboto, sans-serif;background-color: #16e8f5;color: #ffffff;">Saber mais</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6 col-xl-3" style="padding-right: 5px;padding-left: 5px;width: 100%;">
                                            <div class="shadow card-container-imagia">
                                                <div class="card-imagia">
                                                    <div class="front-imagia">
                                                        <div class="cover-imagia">
                                                            <img alt="" src="../img/8sl6Q86gsfM.jpg">
                                                        </div>
                                                        <div class="user-imagia">
                                                            <img class="rounded-circle img-circle" alt="" src="../img/img-1.jpg" style="width: 100px;height: 100px;">
                                                        </div>
                                                        <div class="footer-imagia">
                                                            <span style="color: rgb(2,25,48);font-family: Roboto, sans-serif;">
                                                                <i class="fa fa-plus"></i> Mais
                                                            </span>
                                                        </div>
                                                        <div class="content-imagia" style="padding-top: 0px;padding-bottom: 5px;">
                                                            <h3 class="text-center name-imagia" style="color: rgb(2,25,48);font-size: 18px;font-family: Roboto, sans-serif;font-weight: bold;">Emilio Jose Churrana</h3>
                                                            <p class="text-left subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 12px;font-family: Roboto, sans-serif;font-weight: bold;">Tema: Sistema de Gestao de Defesas</p>
                                                            <p class="text-left subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 12px;font-family: Roboto, sans-serif;font-weight: bold;">Supervisor: dr. Aurelio Ribeiro</p>
                                                            <p class="text-left subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 12px;font-family: Roboto, sans-serif;font-weight: bold;">Data: 06/05/2022</p>
                                                        </div>
                                                    </div>
                                                    <div class="back-imagia">
                                                        <div class="content-imagia content-back-imagia">
                                                            <div>
                                                                <p class="text-left subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 12px;font-weight: bold;font-family: Roboto, sans-serif;">Nivel: Licenciatura&nbsp;</p>
                                                                <p class="text-left subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 13px;font-family: Roboto, sans-serif;font-weight: bold;">Curso: Informatica</p>
                                                                <p class="text-center">Et hanc quidem praeter oppida multa duae civitates exornant Seleucia opus Seleuci regis, et Claudiopolis quam deduxit coloniam Claudius Caesar.</p>
                                                            </div>
                                                        </div>
                                                        <div class="footer-imagia">
                                                            <div class="social-imagia text-center">
                                                                <button class="btn btn-sm border rounded" type="button" style="font-weight: bold;font-family: Roboto, sans-serif;background-color: #16e8f5;color: #ffffff;">Saber mais</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="carousel-item"></div>
                        <div class="carousel-item"></div>
                    </div>
                    <div>
                        <a class="carousel-control-prev" href="#carousel-2" role="button" data-slide="prev" style="width: 100px;">
                            <span class="carousel-control-prev-icon" style="width: 50px;height: 50px;background-image: url(&quot;../img/back_48px.png&quot;);"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-2" role="button" data-slide="next" style="width: 100px;">
                            <span class="carousel-control-next-icon" style="width: 50px;height: 50px;background-image: url(&quot;../img/forward_48px.png&quot;);"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>