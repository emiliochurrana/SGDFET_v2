    @extends('layouts.main')

    @section('title', 'Home')

    @section('content')
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
    </section>
    <section class="text-center" style="margin-top: 30px;background-repeat: no-repeat;background-size: cover;">
        <div class="container" style="background-image: url(&quot;../img/fundo3.png&quot;);background-size: cover;background-repeat: no-repeat;max-width: 100%;background-position: center;padding-top: 100px;padding-bottom: 200px;">
            <div class="row text-justify">
                <div class="col" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="800" style="padding-left: 40px;">
                    <h2 style="color: #68c7ef;font-family: 'Titillium Web', sans-serif;font-weight: bold;">FET Noticias</h2>
                    <hr style="background-color: #68c7ef;margin-top: 5px;">
                </div>
                <div class="col-auto col-lg-12 offset-xl-0 text-center d-xl-flex justify-content-xl-center" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="800">
                    <figure class="snip1527">
                        <div class="image">
                            <img src="../img/pr-sample23.jpg" alt="pr-sample23" />
                        </div>
                        <figcaption>
                            <div class="date">
                                <span class="day">28</span>
                                <span class="month">Oct</span>
                            </div>
                            <h3>The World Ended Yesterday</h3>
                            <p>You know what we need, Hobbes? We need an attitude. Yeah, you can't be cool if you don't have an attitude.</p>
                        </figcaption>
                        <a href="#"></a>
                    </figure>
                    <figure class="snip1527 hover">
                        <div class="image">
                            <img src="../img/pr-sample24.jpg" alt="pr-sample24" />
                        </div>
                        <figcaption>
                            <div class="date">
                                <span class="day">17</span>
                                <span class="month">Nov</span>
                            </div>
                            <h3>An Abstract Post Heading</h3>
                            <p>Sometimes the surest sign that intelligent life exists elsewhere in the universe is that none of it has tried to contact us.</p>
                        </figcaption>
                        <a href="#"></a>
                    </figure>
                    <figure class="snip1527">
                        <div class="image">
                            <img src="../img/pr-sample25.jpg" alt="pr-sample25" />
                        </div>
                        <figcaption>
                            <div class="date">
                                <span class="day">01</span>
                                <span class="month">Dec</span>
                            </div>
                            <h3>Down with this sort of thing</h3>
                            <p>I don't need to compromise my principles, because they don't have the slightest bearing on what happens to me anyway.</p>
                        </figcaption>
                        <a href="#"></a>
                    </figure>
                    <figure class="snip1527">
                        <div class="image">
                            <img src="../img/pr-sample23.jpg" alt="pr-sample23" />
                        </div>
                        <figcaption>
                            <div class="date">
                                <span class="day">28</span>
                                <span class="month">Oct</span>
                            </div>
                            <h3>The World Ended Yesterday</h3>
                            <p>You know what we need, Hobbes? We need an attitude. Yeah, you can't be cool if you don't have an attitude.</p>
                        </figcaption>
                        <a href="#"></a>
                    </figure>
                </div>
            </div>
            <div class="row text-center" style="margin-bottom: 20px;margin-top: 30px;margin-right: 0px;margin-left: 0px;padding-right: 0px;padding-left: 0px;max-width: 100%;">
                <div class="col-lg-6 col-xl-7 offset-lg-0 offset-xl-0" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="800" style="padding-left: 0px;padding-right: 10px;">
                    <h2 class="text-justify" style="margin-top: 7px;color: #1e2671;font-weight: bold;padding-left: 63px;">FET Defesas</h2>
                    <div class="carousel slide carousel-fade" data-ride="carousel" data-interval="false" id="carousel-1" style="padding-bottom: 10px;padding-right: 0px;padding-left: 0px;max-width: 100%;">
                        <div class="carousel-inner" role="listbox" style="padding-right: 35px;padding-left: 35px;">
                            <div class="carousel-item active">
                                <section class="card-section-imagia" style="padding-top: 15px;padding-bottom: 10px;background-color: rgba(241,241,241,0);">
                                    <div class="container" style="padding-left: 0px;padding-right: 0px;">
                                        <div class="row" style="padding-left: 9%;">
                                            <div class="col-sm-6 col-md-4 col-lg-6" style="padding-left: 7px;padding-right: 7px;max-width: 100%;">
                                                <div class="shadow card-container-imagia" style="margin-bottom: 5px;max-width: 300px;">
                                                    <div class="card-imagia">
                                                        <div class="front-imagia">
                                                            <div class="cover-imagia">
                                                                <img alt="" src="../img/8sl6Q86gsfM.jpg">
                                                            </div>
                                                            <div class="user-imagia">
                                                                <img class="rounded-circle img-circle" alt="" src="../img/img-2.jpg" style="width: 100px;height: 100px;">
                                                            </div>
                                                            <div class="content-imagia" style="padding-top: 0px;padding-bottom: 5px;">
                                                                <h3 class="name-imagia" style="color: rgb(2,25,48);font-family: Roboto, sans-serif;font-size: 16px;font-weight: bold;">Nunes Jose Churrana</h3>
                                                                <p class="text-justify subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-family: Roboto, sans-serif;font-weight: bold;font-size: 13px;">Tema: Sistema de Gestao Farmaceutico</p>
                                                                <p class="text-justify subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-family: Roboto, sans-serif;font-weight: bold;font-size: 13px;">Supervisor: Msc. Claudia Jovo Gune</p>
                                                                <p class="text-justify subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-weight: bold;font-family: Roboto, sans-serif;font-size: 13px;">Curso: Informatica</p>
                                                                <p class="text-justify subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-family: Roboto, sans-serif;font-weight: bold;font-size: 13px;">Data: 15/04/2022</p>
                                                                <p class="text-justify subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-family: Roboto, sans-serif;font-weight: bold;font-size: 13px;">Hora: 09:00</p>
                                                            </div>
                                                            <div class="footer-imagia">
                                                                <span style="color: rgb(2,25,48);font-family: Roboto, sans-serif;"><i class="fa fa-plus"></i>&nbsp;Mais</span>
                                                            </div>
                                                        </div>
                                                        <div class="back-imagia">
                                                            <div class="content-imagia content-back-imagia">
                                                                <div class="content-imagia" style="padding-top: 0px;padding-bottom: 5px;padding-left: 5px;padding-right: 5px;">
                                                                    <p class="text-justify subtitle-imagia" style="margin-bottom: 5px;font-size: 13px;color: rgb(2,25,48);font-family: Roboto, sans-serif;font-weight: bold;">Oponente: dra. Sheila&nbsp;</p>
                                                                    <p class="text-justify subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 13px;font-family: Roboto, sans-serif;font-weight: bold;">Presidente: dr. Aurelio Ribeiro</p>
                                                                    <p class="text-justify subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 13px;font-family: Roboto, sans-serif;font-weight: bold;">Nivel: Licenciatura</p>
                                                                    <p class="text-justify subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 13px;font-family: Roboto, sans-serif;font-weight: bold;">Sala: Inf. B</p>
                                                                </div>
                                                            </div>
                                                            <div class="footer-imagia">
                                                                <div class="social-imagia text-center">
                                                                    <button class="btn btn-sm border rounded" type="button" style="background-color: #16e8f5;font-family: Roboto, sans-serif;font-weight: bold;">Saber mais</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4 col-lg-6" style="padding-right: 7px;padding-left: 7px;max-width: 100%;">
                                                <div class="shadow card-container-imagia" style="margin-bottom: 5px;max-width: 300px;">
                                                    <div class="card-imagia">
                                                        <div class="front-imagia">
                                                            <div class="cover-imagia">
                                                                <img alt="" src="../img/8sl6Q86gsfM.jpg">
                                                            </div>
                                                            <div class="user-imagia">
                                                                <img class="rounded-circle img-circle" alt="" src="../img/img-1.jpg" style="width: 100px;height: 100px;">
                                                            </div>
                                                            <div class="footer-imagia">
                                                                <span style="color: rgb(2,25,48);font-family: Roboto, sans-serif;"><i class="fa fa-plus"></i> Mais</span>
                                                            </div>
                                                            <div class="content-imagia" style="padding-top: 0px;padding-bottom: 5px;">
                                                                <h3 class="name-imagia" style="color: rgb(2,25,48);font-family: Roboto, sans-serif;font-size: 16px;font-weight: bold;">Emilio Jose Churrana</h3>
                                                                <p class="text-justify subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-family: Roboto, sans-serif;font-weight: bold;font-size: 13px;">Tema: Sistema de Gestao de Defesas</p>
                                                                <p class="text-justify subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-family: Roboto, sans-serif;font-weight: bold;font-size: 13px;">Supervisor: dr. Aurelio Ribeiro</p>
                                                                <p class="text-justify subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-weight: bold;font-family: Roboto, sans-serif;font-size: 13px;">Curso: Informatica</p>
                                                                <p class="text-justify subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-family: Roboto, sans-serif;font-weight: bold;font-size: 13px;">Data: 20/04/2022</p>
                                                                <p class="text-justify subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-family: Roboto, sans-serif;font-weight: bold;font-size: 13px;">Hora: 10:00</p>
                                                            </div>
                                                        </div>
                                                        <div class="border rounded back-imagia">
                                                            <div class="content-imagia content-back-imagia">
                                                                <div class="content-imagia" style="padding-top: 0px;padding-bottom: 5px;padding-right: 5px;padding-left: 5px;">
                                                                    <p class="text-justify subtitle-imagia" style="margin-bottom: 5px;font-size: 13px;color: rgb(2,25,48);font-family: Roboto, sans-serif;font-weight: bold;">Oponente: dra. Martina Barros</p>
                                                                    <p class="text-justify subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 13px;font-family: Roboto, sans-serif;font-weight: bold;">Presidente: dr. Celio Sengo</p>
                                                                    <p class="text-justify subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 13px;font-family: Roboto, sans-serif;font-weight: bold;">Nivel: Licenciatura</p>
                                                                    <p class="text-justify subtitle-imagia" style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 13px;font-family: Roboto, sans-serif;font-weight: bold;">Sala: Inf. A</p>
                                                                </div>
                                                            </div>
                                                            <div class="footer-imagia">
                                                                <div class="social-imagia text-center">
                                                                    <button class="btn btn-sm border rounded" type="button" style="background-color: #16e8f5;font-weight: bold;font-family: Roboto, sans-serif;">Saber mais</button>
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
                            <a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev" style="max-width: 90px;">
                                <span class="carousel-control-prev-icon" style="width: 50px;height: 50px;background-image: url(&quot;../img/back_48px.png&quot;);"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" style="width: 50px;height: 50px;background-image: url(&quot;../img/forward_48px.png&quot;);"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <section></section>
                </div>
                <div class="col-lg-6 col-xl-5 offset-xl-0" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="800" style="padding-left: 0px;padding-right: 0px;">
                    <h2 class="text-justify" style="color: #1e2671;font-weight: bold;max-width: 100%;margin-bottom: 25px;">Galeria</h2>
                    <div class="carousel slide shadow-lg" data-ride="carousel" data-aos="flip-left" data-aos-duration="450" data-aos-delay="450" id="carousel-4" style="border-radius: .90rem!important;">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <div class="row" style="padding: 20px;">
                                    <div class="col offset-xl-1" style="padding-top: 15px;padding-bottom: 15px;">
                                        <img class="rounded shadow" src="../img/kisspng-the-ultimate-guide-on-how-to-succeed-in-high-schoo-graduation-pictures-5a6c0b1212f503.4589224015170301620777.png" alt="Slide Image" style="max-width: 290px;height: 320px;">
                                    </div>
                                    <div class="col d-flex flex-column justify-content-center align-items-center" style="padding-top: 15px;padding-bottom: 15px;">
                                        <p style="font-family: Roboto, sans-serif;">29 Marco 2022&nbsp;</p>
                                        <h2 style="margin-bottom: 40px;">Heading</h2>
                                        <button class="btn" type="button" style="background-color: #16e8f5;">Saber mais</button>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row" style="padding: 20px;">
                                    <div class="col offset-xl-1" style="padding-top: 15px;padding-bottom: 15px;">
                                        <img class="rounded shadow" src="../img/bg_login.jpg" alt="Slide Image" style="max-width: 290px;height: 320px;">
                                    </div>
                                    <div class="col d-flex flex-column justify-content-center align-items-center" style="padding-top: 15px;padding-bottom: 15px;">
                                        <p style="font-family: Roboto, sans-serif;">29 Marco 2022&nbsp;</p>
                                        <h2 style="margin-bottom: 40px;">Heading</h2>
                                        <button class="btn" type="button" style="background-color: #16e8f5;">Saber mais</button>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row" style="padding: 20px;">
                                    <div class="col offset-xl-1" style="padding-top: 15px;padding-bottom: 15px;">
                                        <img class="rounded shadow" src="../img/blog-3.jpg" alt="Slide Image" style="max-width: 290px;height: 320px;">
                                    </div>
                                    <div class="col d-flex flex-column justify-content-center align-items-center" style="padding-top: 15px;padding-bottom: 15px;">
                                        <p style="font-family: Roboto, sans-serif;">29 Marco 2022&nbsp;</p>
                                        <h2 style="margin-bottom: 40px;">Heading</h2>
                                        <button class="btn" type="button" style="background-color: #16e8f5;">Saber mais</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <a class="carousel-control-prev" href="#carousel-4" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel-4" role="button" data-slide="next">
                                <span class="carousel-control-next-icon"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="max-width: 100%;">
            <div class="row text-center" style="padding-right: 40px;padding-left: 40px;">
                <div class="col" data-aos="fade-down" data-aos-duration="800" data-aos-delay="800" style="padding-right: 0px;padding-left: 0px;">
                    <h2 class="text-justify" style="color: #68c7ef;font-weight: bold;padding-top: 10px;">FET Monografias</h2>
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
                                                                <span style="color: rgb(2,25,48);font-family: Roboto, sans-serif;font-weight: normal;"><i class="fa fa-plus"></i> Mais</span>
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
                                                                    <button class="btn btn-sm border rounded" type="button" style="font-weight: bold;font-family: Roboto, sans-serif;background-color: #16e8f5;">Saber mais</button>
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
                                                                <span style="color: rgb(2,25,48);font-family: Roboto, sans-serif;"><i class="fa fa-plus"></i>&nbsp;Mais</span>
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
                                                                    <button class="btn btn-sm border rounded" type="button" style="font-weight: bold;font-family: Roboto, sans-serif;background-color: #16e8f5;">Saber mais</button>
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
                                                                <span style="color: rgb(2,25,48);font-family: Roboto, sans-serif;"><i class="fa fa-plus"></i> Mais</span>
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
                                                                    <button class="btn btn-sm border rounded" type="button" style="font-weight: bold;font-family: Roboto, sans-serif;background-color: #16e8f5;">Saber mais</button>
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
                                                                <span style="color: rgb(2,25,48);font-family: Roboto, sans-serif;"><i class="fa fa-plus"></i> Mais</span>
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
                                                                    <button class="btn btn-sm border rounded" type="button" style="font-weight: bold;font-family: Roboto, sans-serif;background-color: #16e8f5;">Saber mais</button>
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

    @endsection