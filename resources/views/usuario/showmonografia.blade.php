@extends('layouts.user')

@section('title', 'Monografia')

@section('content')
<section style="background-repeat: no-repeat;background-size: cover;">
    <div class="container" style="background-image: url(&quot;../img/Background_Page.jpg&quot;);background-repeat: no-repeat;background-size: cover;max-width: 100%;padding-right: 0px;padding-left: 0px;">
        <nav class="navbar navbar-light navbar-expand-md shadow-lg navigation-clean" style="background-color: rgba(255,255,255,0);padding: 8px;">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="#" style="background-size: cover;background-position: center;padding-right: 10px;padding-left: 10px;font-family: Roboto, sans-serif;font-weight: bold;"><i class="fas fa-user-graduate"></i>SGDFET&nbsp;&nbsp;<small class="text-center border rounded border-white" style="font-size: 10px;font-weight: bold;background-color: rgb(248,248,248);font-style: normal;font-family: ABeeZee, sans-serif;padding: 5px;padding-top: 1px;padding-bottom: 1px;color: rgb(27,147,198);">v.1.0</small></a>
                <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1" style="background-color: rgb(254,252,252);">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" href="inicio.html" style="color: rgb(255,255,255);font-size: 16px;">Inicio</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle nav-link text-white" data-toggle="dropdown" aria-expanded="false" href="#" style="font-size: 16px;">Mais&nbsp;</a>
                            <div class="dropdown-menu bg-white" role="menu">
                                <a class="dropdown-item" role="presentation" data-bs-hover-animate="pulse" href="defesas.html" style="color: rgb(90,161,220);">Defesas</a>
                                <a class="dropdown-item" role="presentation" data-bs-hover-animate="pulse" href="monografias.html" style="color: rgb(90,161,220);">Monografias</a>
                            </div>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link text-white" href="#" style="font-size: 16px;">Sobre</a>
                        </li>

                        <li class="nav-item dropdown no-arrow" role="presentation">
                            <div class="nav-item dropdown no-arrow">
                                <a class="dropdown-toggle text-white nav-link" data-toggle="dropdown" aria-expanded="false" href="#">
                                    <span style="margin-right: 5px;">Emilio Churrana</span>
                                    <img class="border rounded-circle img-profile" src="../img/avatars/avatar1.jpeg" width="30px" height="30px">
                                </a>
                                <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu">
                                    <a class="dropdown-item" role="presentation" href="#"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a>
                                    <a class="dropdown-item" role="presentation" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a>
                                    <a class="dropdown-item" role="presentation" href="#"><i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Activity log</a>
                                    <a class="dropdown-item" role="presentation" href="#"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a>
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
                <img data-aos="zoom-in" data-aos-duration="800" data-aos-delay="800" style="width: 160px;height: 210px;background-size: cover;background-repeat: no-repeat;background-position: center;" src="../img/image1.png" loading="eager">
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-11 offset-xl-1 d-flex d-sm-flex d-md-flex d-lg-flex d-xl-inline-flex justify-content-md-start justify-content-lg-start" style="max-width: 100%;">
                <small class="form-text text-left text-light" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="800" style="color: #ffffff;font-size: 16px;margin-bottom: 4px;margin-right: 5px;">
                    Submeta já a tua defesa dando um click no&nbsp;botão <br>
                </small>
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
    <div class="container shadow" style="padding-bottom: 0px;max-width: 100%;padding-right: 0px;padding-left: 0px;">
        <div class="row" style="padding-top: 20px;padding-bottom: 0px;">
            <div class="col-xl-12 offset-xl-0">
                <h2 data-aos="zoom-in" data-aos-duration="400" data-aos-delay="400" style="font-family: Roboto, sans-serif;font-weight: bold;color: #3ba2dc;margin-left: 20px;">Detalhes da Monografia</h2>
                <hr style="margin-top: 5px;background-color: #3ba2dc;">
            </div>
        </div>
        <div class="row no-gutters text-justify align-items-sm-center" style="padding-top: 10px;padding-bottom: 5px;max-width: 100%;padding-right: 20px;padding-left: 40px;">
            <div class="col-xl-4 offset-xl-0 d-xl-flex align-items-sm-center align-items-md-center align-items-lg-center justify-content-xl-center align-items-xl-center" data-aos="zoom-in" data-aos-duration="450" data-aos-delay="450" style="height: 100%;">
                <img class="rounded-circle img-fluid" style="background-size: cover;" src="assets/img/img-1.jpg" width="300px" height="300px">
            </div>
            <div class="col" style="height: 100%;padding-bottom: 0px;">
                <p data-aos="zoom-in" data-aos-duration="450" data-aos-delay="450" style="color: #000000;"><i class="fas fa-user-alt" style="color: #68c7ef;font-size: 18px;"></i>&nbsp;Autor: Emilio Jose Churrana</p>
                <p data-aos="zoom-in" data-aos-duration="450" data-aos-delay="450" style="color: #000000;"><i class="fas fa-book-open" style="color: #68c7ef;"></i>&nbsp;Tema: Sistema de Gestao de Defesas</p>
                <p data-aos="zoom-in" data-aos-duration="450" data-aos-delay="450" style="color: #000000;"><i class="fas fa-book-open" style="color: #68c7ef;"></i>&nbsp;Curso: Informatica&nbsp;</p>
                <p data-aos="zoom-in" data-aos-duration="450" data-aos-delay="450" style="color: #000000;"><i class="fas fa-book-open" style="color: #68c7ef;"></i>&nbsp;Nivel: Licenciatura&nbsp;</p>
                <p data-aos="zoom-in" data-aos-duration="450" data-aos-delay="450" style="color: #000000;"><i class="fas fa-user-alt" style="color: #68c7ef;"></i>&nbsp;Supervisor:&nbsp;</p>
                <p data-aos="zoom-in" data-aos-duration="450" data-aos-delay="450" style="color: #000000;"><i class="fa fa-calendar" style="color: #68c7ef;"></i>&nbsp;Data:</p>
                <a class="btn btn-secondary text-white border rounded" role="button" data-aos="zoom-in" data-aos-duration="450" data-aos-delay="450" style="background-color: #68c7ef;">
                    <i class="fa fa-file-pdf-o"></i>&nbsp;Obter o ficheiro
                </a>
            </div>
        </div>
        <div class="row" style="max-width: 100%;padding: 20px;">
            <div class="col-xl-12 offset-xl-0" data-aos="zoom-in" data-aos-duration="450" data-aos-delay="450" style="padding-right: 40px;padding-left: 40px;">
                <h5 style="color: #3ba2dc;font-family: Roboto, sans-serif;font-weight: bold;">Resumo</h5>
                <p class="text-justify" data-aos="zoom-in" data-aos-duration="450" data-aos-delay="450" style="font-family: Roboto, sans-serif;padding-left: 15px;">
                    O controlo eficiente de todas as actividades das empresas, sempre foi um desafio para os seus gestores. Diante desta demanda, os sistemas de informação têm sido concebidos no intuito de suprir essas necessidades imediatas das empresas,
                    como por exemplo a gestão automática de todas as actividades de um determinado sector. Com a utilização de sistemas de informação, há possibilidade dos processos institucionais possam ser automatizados, diminuindo todo o trabalho
                    feito manualmente, e também temos um conjunto de componentes inter-relacionados, trabalhando juntos para coletar, processar, armazenar e distribuir informação, com o propósito de facilitar o controle, o planejamento, a coordenação,
                    a análise e o processo decisório em empresas e outras organizações. <br>
                </p>
            </div>
        </div>
    </div>
</section>
@endsection