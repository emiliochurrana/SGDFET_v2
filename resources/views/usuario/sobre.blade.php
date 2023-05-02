
@extends('layouts.main')
@section('title', 'Sobre')
<section class="border rounded">
        <section style="background-repeat: no-repeat;background-size: cover;">
            <div class="container" style="background-image: url(&quot;../img/Background_Page.jpg&quot;);background-repeat: no-repeat;background-size: cover;max-width: 100%;padding-right: 0px;padding-left: 0px;">
                <nav class="navbar navbar-light navbar-expand-md shadow-lg navigation-clean" style="background-color: rgba(255,255,255,0);padding: 8px;">
                    <div class="container-fluid">
                        <a class="navbar-brand text-white" href="#" style="background-size: cover;background-position: center;padding-right: 10px;padding-left: 10px;font-family: Roboto, sans-serif;font-weight: bold;">
                            <i class="fas fa-user-graduate"></i>SGDFET&nbsp;&nbsp;<small class="text-center border rounded border-white" style="font-size: 10px;font-weight: bold;background-color: rgb(248,248,248);font-style: normal;font-family: ABeeZee, sans-serif;padding: 5px;padding-top: 1px;padding-bottom: 1px;color: rgb(27,147,198);">v.1.0</small></a>
                        <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1" style="background-color: rgb(254,252,252);">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="navbar-toggler-icon">
                                <i class="fa fa-align-justify" style="font-size: 30px;"></i>
                            </span>
                        </button>
                        <div class="collapse navbar-collapse" id="navcol-1">
                            <ul class="nav navbar-nav ml-auto">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" href="{{ ('/') }}" style="color: rgb(255,255,255);font-size: 16px;">Inicio</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link text-white" href="{{ ('sobre') }}" style="font-size: 16px;">Sobre</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link text-white" href="{{ ('login') }}" style="font-size: 16px;"><i class="fas fa-user-circle"></i>&nbsp; Entrar</a>
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
    <div class="row" style="padding: 20px;padding-right: 30px;padding-left: 30px;">
        <div class="col" style="padding-right: 20px;padding-left: 20px;padding-bottom: 10px;padding-top: 10px;">
            <h3><strong>Missão</strong><br></h3>
            <small class="form-text text-justify text-muted" data-aos="zoom-in-up" data-aos-duration="800" data-aos-delay="800" style="font-size: 18px;">
                Desenvolver capital humano qualificado, por meio de conhecimentos,
                tecnologias e inovação, orientado para a resolução de problemas da sociedade em Engenharias, Tecnologias e Artes.<br>
            </small>
        </div>
        <div class="col" style="padding-top: 10px;padding-right: 20px;padding-bottom: 10px;padding-left: 20px;">
            <h3><strong>Visão</strong><br></h3>
            <small class="form-text text-justify text-muted" data-aos="zoom-in-up" data-aos-duration="800" data-aos-delay="800" style="font-size: 18px;">
                Ser uma faculdade de referência no ensino, na pesquisa, extensão e inovação em Engenharias, Tecnologias e Artes baseada em padrões nacionais e internacionais.<br>
            </small>
        </div>
        <div class="col" style="padding-top: 10px;padding-right: 20px;padding-bottom: 10px;padding-left: 20px;">
            <h3><strong>Valores</strong><br></h3>
            <small class="form-text text-justify text-muted" data-aos="zoom-in-up" data-aos-duration="800" data-aos-delay="800" style="font-size: 18px;">
                <strong>1.Liberdade</strong>ꓽ Espaço livre de debate e geração de ideias, alicerce basilar à consolidação académica e ao desenvolvimento da cidadania.<br>
                <strong>2.Equidade</strong>ꓽ Focando ˗ se na promoção da igualdade de oportunidades e inclusão.<br>
                <strong>3.Transparência</strong>ꓽ Ambiente académico baseado na honestidade, confiança, clareza e prestação de contas.<br>
                <strong>4.Resiliência</strong>ꓽ Baseada na tolerância e superação de eventos adversos.<br>
                <strong>5.Meritocraciaꓽ</strong>&nbsp;Distinção de acções e de personalidades que mais contribuem para o desenvolvimento da FET e da sociedade.<br>
            </small>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="intro">
            <h2 class="text-center">Localização<br></h2>
            <p class="text-center">Nunc luctus in metus eget fringilla. Aliquam sed justo ligula. Vestibulum nibh erat, pellentesque ut laoreet vitae. </p>
        </div>
    </div>
    <iframe allowfullscreen="" frameborder="0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDaEw6o8OhJvRQnTF3gI_tibMejtfasOlY&amp;q=Avenida+Do+Trabalho%2C+Maputo&amp;zoom=15" width="100%" height="450"></iframe>
</section>