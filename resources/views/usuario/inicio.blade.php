@extends('layouts.user')

@section('title', 'Inicio')

@section('content')
<section class="border rounded">
    <section style="background-repeat: no-repeat;background-size: cover;">
        <div class="container" style="background-image: url(&quot;/../img/Background_Page.jpg&quot;);background-repeat: no-repeat;background-size: cover;max-width: 100%;padding-right: 0px;padding-left: 0px;padding-bottom:70px">
            <nav class="navbar navbar-light navbar-expand-md shadow-lg navigation-clean fixed-top" style="background-color: #68c7ef;padding: 8px;">
                <div class="container-fluid">
                    <a class="navbar-brand text-white" href="#" data-bs-hover-animate="pulse" style="background-size: cover;background-position: center;padding-right: 10px;padding-left: 10px;font-family: Roboto, sans-serif;font-weight: bold;">
                        <i class="fas fa-user-graduate"></i>SGDFET&nbsp;&nbsp;<small class="text-center border rounded border-white" style="font-size: 10px;font-weight: bold;background-color: rgb(248,248,248);font-style: normal;font-family: ABeeZee, sans-serif;padding: 5px;padding-top: 1px;padding-bottom: 1px;color: rgb(27,147,198);">v.1.0</small>
                    </a>
                    <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1" style="background-color: rgb(254,252,252);">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navcol-1">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a class="dropdown-toggle nav-link text-white" data-toggle="dropdown" aria-expanded="false" href="#" style="font-size: 16px;">Mais&nbsp;</a>
                                <div class="dropdown-menu bg-white" role="menu">
                                    <a class="dropdown-item" role="presentation" data-bs-hover-animate="pulse" href="{{('/defesas')}}" style="color: rgb(90,161,220); font-size:16px;">Defesas</a>
                                    <a class="dropdown-item" role="presentation" data-bs-hover-animate="pulse" href="{{('/monografias')}}" style="color: rgb(90,161,220); font-size:16px;">Monografias</a>
                                    <a class="dropdown-item" role="presentation" data-bs-hover-animate="pulse" href="{{('/participacoes')}}" style="color: rgb(90,161,220); font-size:16px;">Participações</a>
                                </div>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-white" data-bs-hover-animate="pulse" href="{{('/sobre/depois')}}" style="font-size: 16px;">Sobre</a>
                            </li>
                            <!--<li class="nav-item" role="presentation">
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
                            </li>-->
                            <li class="nav-item dropdown no-arrow" role="presentation">
                                <div class="nav-item dropdown no-arrow ">
                                    <a class="dropdown-toggle text-white nav-link" data-bs-hover-animate="pulse" style="font-size: 16px" data-toggle="dropdown" aria-expanded="false" href="#">
                                        <span style="margin-right: 5px;">{{auth()->user()->name}}</span>
                                        @if(auth()->user()->is_estudante)
                                        <img class="border rounded-circle img-perfil" src="ficheiros/estudantes/fotos/{{auth()->user()->estudanteUser->foto}}">
                                        @else
                                        <img class="border rounded-circle img-perfil" src="ficheiros/visitantes/fotos/{{auth()->user()->visitanteUser->foto}}">
                                        @endif
                                    </a>
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu">
                                    @if(auth()->user()->is_estudante)
                                    <a class="dropdown-item" style="font-size: 14px" role="presentation" href="usuario/perfilestudante/{{auth()->user()->id}}"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a>
                                    @else
                                        <a class="dropdown-item" style="font-size: 14px" role="presentation" href="usuario/perfilvisitante/{{auth()->user()->id}}"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a>
                                        @endif
                                        <!--<a class="dropdown-item" role="presentation" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a>
                                        <a class="dropdown-item" role="presentation" href="#"><i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Activity log</a>-->
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" style="font-size: 14px" role="presentation" href="{{ ('/usuario/logout') }}"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="row" style="padding: 20px;padding-bottom: 20px;padding-top:80px">
                <div class="col-12 col-sm-11 col-md-12 col-lg-5 col-xl-5 offset-xl-0" style="padding-left: 50px;"><small class="form-text text-white" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="800" style="font-size: 20px;color: rgb(237,238,239);width: 250px;padding: 10px;padding-right: 0px;padding-left: 0px;font-family: ABeeZee, sans-serif;">Sistema de Gestão de Defesas FET<br></small>
                    <small class="form-text text-justify text-white" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="800" style="color: rgb(229,236,242);font-size: 14px;padding-bottom: 10px;max-width: 400px;min-width: 250px;margin-bottom:40px">Agora ficou fácil, agende a sua defesa hoje e&nbsp; deixe tudo nas nossas mãos. Juntos com a tecnologia, por um futuro melhor, Engenheiros bem formados e informados, prontos para servir e responder a demanda da sociedade.<br></small>
                    <div class="d-flex" style="width: 100%;padding-bottom:20px">
                        <small class="form-text text-left text-light" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="800" style="color: #ffffff;font-size: 12px;margin-bottom: 4px;margin-right: 5px;">Submeta já a tua defesa dando um click no&nbsp;botão <br></small>
                        <div class="modal fade centro" role="dialog" tabindex="-1" id="modal">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #68c7ef;">
                                        <h6 class="titulos" style="color:#ffffff">Submeta os documentos necessários</h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <form class="needs-validation" method="POST" action="/dados" enctype="multipart/form-data" novalidate>
                                        @csrf
                                        <div class="modal-body">
                                            <h3 class="titulos">Formulário de Submissão</h3>
                                            <div class="alert alert-danger" style="display:none"></div>

                                            <div class="col text-left d-flex padMar">
                                                <div class="form-group" style="width:100%">
                                                    <div class="d-flex justify-content-center align-items-center fileinput fileinput-new input-group" for="bi" style="background-color: #68c7ef;" data-provides="fileinput">
                                                        <label class="btn" style="color: #ffffff;"><i class="fa fa-file-pdf-o"></i>&nbsp;Bi</label>
                                                        <input class="form-control file-input" accept="application/pdf" type="file" id="bi" name="bi" required onchange="return fileBi()">
                                                        <div style="background-color: #68c7ef;" for="bi" data-trigger="fileinput">
                                                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                            <span class="fileinput-filename"></span>
                                                        </div>
                                                        <div class="invalid-tooltip">
                                                            <p class="msg text-danger ">Seleccione um arquivo!</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col text-left d-flex padMar">
                                                <div class="form-group" style="width:100%">
                                                    <div class="d-flex justify-content-center align-items-center fileinput fileinput-new input-group" for="declaracao_nota" style="background-color: #68c7ef;" data-provides="fileinput">
                                                        <label class="btn" style="color: #ffffff;"><i class="fa fa-file-pdf-o"></i>&nbsp;Declaração de Notas</label>
                                                        <input class="form-control file-input" accept="application/pdf" type="file" id="declaracao_nota" required="" name="declaracao_nota" onchange="return fileDeclaracao()">
                                                        <div style="background-color: #68c7ef;" for="bi" data-trigger="fileinput">
                                                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                            <span class="fileinput-filename"></span>
                                                        </div>
                                                        <div class="invalid-tooltip">
                                                            <p class="msg text-danger">seleccione um arquivo!</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 d-flex">
                                                <div class="form-group" style="width:100%">
                                                    <div class="form-group d-flex justify-content-center align-items-center fileinput fileinput-new input-group" for="monografia" style="background-color: #68c7ef;" data-provides="fileinput">
                                                        <label class="btn" style="color: #ffffff;"><i class="fa fa-file-pdf-o"></i>&nbsp;Monografia</label>
                                                        <input class="form-control file-input" accept="application/pdf" type="file" id="monografia" required="" name="monografia" onchange="return fileMonografia()">
                                                        <div style="background-color: #68c7ef;" for="bi" data-trigger="fileinput">
                                                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                            <span class="fileinput-filename"></span>
                                                        </div>
                                                        <div class="invalid-tooltip">
                                                            <p class="msg text-danger">seleccione um arquivo!</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group" style="width:100%">
                                                    <div class="form-group d-flex justify-content-center align-items-center fileinput fileinput-new input-group" for="curriculum" style="background-color: #68c7ef;" data-provides="fileinput">
                                                        <label class="btn" style="color: #ffffff;"><i class="fa fa-file-pdf-o"></i>&nbsp;Curriculum</label>
                                                        <input class="form-control file-input" accept="application/pdf" type="file" id="curriculum" required="" name="curriculum" onchange="return fileCurriculum()">
                                                        <div style="background-color: #68c7ef;" for="bi" data-trigger="fileinput">
                                                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                            <span class="fileinput-filename"></span>
                                                        </div>
                                                        <div class="invalid-tooltip">
                                                            <p class="msg text-danger">seleccione um arquivo!</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-sm text-white border rounded btn-Oscuro" id="ajaxSubmit" type="submit" style="background-color: #2a81a6;">Submeter</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <button class="btn btn-sm text-body border rounded border-success shadow-lg btn-Oscuro" data-bs-hover-animate="tada" data-toggle="modal" data-target="#modal" id="open" type="button" style="background-color: #ffffff;">Submeter</button>
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

                            function fileBi() {
                                var fileBi = document.getElementById('bi');
                                var filePathBi = fileBi.value;
                                var allowedExtensions = /(\.pdf)$/i;
                                if (!allowedExtensions.exec(filePathBi)) {
                                    alert('O ficheiro que escolheu é invalido, o bi tem que estar no formato pdf!');
                                    fileBi.value = '';
                                    return false;
                                }
                            }

                            function fileDeclaracao() {
                                var fileDeclaracao = document.getElementById('declaracao_nota');
                                var filePathDeclaracao = fileDeclaracao.value;
                                var allowedExtensions = /(\.pdf)$/i;
                                if (!allowedExtensions.exec(filePathDeclaracao)) {
                                    alert('O ficheiro que escolheu é invalido, a declaracao tem que estar no formato pdf!');
                                    fileDeclaracao.value = '';
                                    return false;
                                }
                            }

                            function fileMonografia() {
                                var fileMonografia = document.getElementById('monografia');
                                var filePathMonografia = fileMonografia.value;
                                var allowedExtensions = /(\.pdf)$/i;
                                if (!allowedExtensions.exec(filePathMonografia)) {
                                    alert('O ficheiro que escolheu é invalido, a monografia tem que estar no formato pdf!');
                                    fileMonografia.value = '';
                                    return false;
                                }
                            }

                            function fileCurriculum() {
                                var fileCurriculum = document.getElementById('curriculum');
                                var filePathCurriculum = fileCurriculum.value;
                                var allowedExtensions = /(\.pdf)$/i;
                                if (!allowedExtensions.exec(filePathCurriculum)) {
                                    alert('O ficheiro que escolheu é invalido, O curriculum tem que estar no formato pdf!');
                                    fileCurriculum.value = '';
                                    return false;
                                }
                            }
                        </script>
                    </div>
                </div>
                <div class="col-sm-11 col-md-12 col-lg-7 col-xl-7 offset-xl-0 text-center" style="padding-top: 5px;padding-bottom: 15px;">
                    <!-- Paradise Slider -->
                    <div id="fw_al_001" class="carousel slide ps_slide_y ps_indicators_y swipe_y ps_easeOutQuint" data-ride="carousel" data-pause="hover" data-interval="5000" data-duration="2500" data-aos="slide-left" data-aos-duration="800" data-aos-delay="800">

                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#fw_al_001" data-slide-to="0" class="active"></li>
                            <li data-target="#fw_al_001" data-slide-to="1"></li>
                            <li data-target="#fw_al_001" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper For Slides -->
                        <div class="carousel-inner" role="listbox">

                            <!-- First Slide -->
                            <?php $index = 0; ?>
                            @foreach($galerias as $galeria)
                            <div class="carousel-item {{$index == 0? "active" : "" }}">

                                <!-- Slide Background -->
                                <img src="/ficheiros/galeria/{{$galeria->foto}}" alt="fw_al_001">

                                <!-- Slide Text Layer -->
                                <div class="fw_al_001_slide">
                                    <p data-animation="animated fadeInUp"><strong>{{date('d/m/y', strtotime($galeria->updated_at))}}</strong></p>
                                    <h2 data-animation="animated fadeInUp"><strong class="block-wiyh-text">{{$galeria->titulo}}</strong></h2>
                                    <a href="/galeria/showdepois/{{$galeria->id}}" type="button" data-bs-hover-animate="pulse" style="background-color: #16e8f5;border:none;border-radius: .35rem;">Saber mais</a>
                                </div>
                            </div>
                            <!-- End of Slide -->
                            <?php $index++; ?>
                            @endforeach

                        </div><!-- End of Wrapper For Slides -->

                    </div> <!-- End Paradise Slider -->




                    <!-- End -->
                </div>
            </div>
        </div>
    </section>
</section>
<div class="estatisticas" data-aos="zoom-in-up" data-aos-duration="500" data-aos-delay="950">
        <div class="estatistica-item">
            <ul class="align-items-center">
                <div class="d-flex justify-content-center">
                    <ion-icon size="large" class="estudante" name="people"></ion-icon>
                    &nbsp;&nbsp;<span id="estudantes" class="estudante"></span>
                </div>
                <p  class="estudante">+ Estudantes</p>
            </ul>
        </div>
        <div class="estatistica-item">
            <ul class="align-items-center">
                <div class="d-flex justify-content-center">
                    <ion-icon size="large" class="docentes" name="people"></ion-icon>
                    &nbsp;&nbsp;<span id="docentes" class="docentes"></span>
                </div>
                    <p class="docentes">+ Docentes</p>
            </ul>
        </div>
        <div class="estatistica-item">
            <ul class="align-items-center">
                <div class="d-flex justify-content-center">
                    <ion-icon size="large" class="defesas" name="book"></ion-icon>
                    &nbsp;&nbsp;<span id="defesas" class="defesas"></span>
                </div>
                    <p class="defesas">+ Defesas</p>
            </ul>
        </div>
        <div class="estatistica-item">
            <ul class="align-items-center">
                <div class="d-flex justify-content-center">
                    <ion-icon size="large" class="monografias" name="library"></ion-icon>
                    &nbsp;&nbsp;<span id="monografias" class="monografias"></span>
                </div>
                    <p class="monografias">+ Monografias</p>
            </ul>
        </div>
        <div class="estatistica-item">
            <ul class="align-items-center">
                <div class="d-flex justify-content-center">
                    <ion-icon size="large" class="cursos" name="bookmark"></ion-icon>
                    &nbsp;&nbsp;<span id="cursos" class="cursos"></span>
                </div>
                    <p class="cursos">+ Cursos</p>
            </ul>
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
      let text5 = document.getElementById('cursos');
      const load = () => {
         animate(text1, 0, '{{count($estudante)}}', 2000);
         animate(text2, 0, '{{count($docente)}}', 2000);
         animate(text3, 0, '{{count($defesa)}}', 2000);
         animate(text4, 0, '{{count($monografia)}}', 2000);
         animate(text5, 0, '{{count($drcurso)}}', 2000);
      }
   </script>


    </div>
<main>
    <div class="container-fluid" role="alert" style="width: 100%;padding-top: 8px;padding-bottom: 8px;">
        <div class="mensagem">
            @if(session('msgSucessStore'))
            <p class="msg"><Strong>{{session('msgSucessStore')}}</Strong></p>
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
    <div class="container-fluid" role="alert" style="width: 100%;padding-top: 8px;padding-bottom: 8px;">
        <div class="mensagem-error">
            @if(session('msgErrorStore'))
            <p class="msg"><Strong>{{session('msgErrorStore')}}</Strong></p>
            @endif
        </div>
    </div>
    <div class="container-fluid" role="alert" style="width: 100%;padding-top: 8px;padding-bottom: 8px;">
        <div class="mensagem-error">
            @if(session('msgAutorize'))
            <p class="msg"><Strong>{{session('msgAutorize')}}</Strong></p>
            @endif
        </div>
    </div>
    <div class="container-fluid" role="alert" style="width: 100%;padding-top: 8px;padding-bottom: 8px;">
        <div class="mensagem-error">
            @if(session('msgEstudante'))
            <p class="msg"><Strong>{{session('msgEstudante')}}</Strong></p>
            @endif
        </div>
    </div>
</main>
<section class="text-center" style="margin-top: 0px;background-repeat: no-repeat;background-size: cover;">
    <div class="container" style="background-image: url(&quot;/../img/fundo3.png&quot;);background-size: cover;background-repeat: no-repeat;max-width: 100%;background-position: center;padding-top: 30px;padding-bottom: 100px;">
        <div class="conteiner conteiner-shadow" style="margin-bottom: 150px;padding-bottom:50px; max-width: 100%;">
            <div class="row text-justify">
                <div class="col-sm-12" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="800" style="padding-left: 40px;">
                    <h2 style="color: #68c7ef;font-family: 'Titillium Web', sans-serif;font-weight: bold;">FET Noticias</h2>
                    <hr style="background-color: #68c7ef;margin-top: 5px;">
                </div>
                <div class="col-12 col-sm-10 col-md-9 col-lg-10 col-xl-12 offset-sm-0 offset-md-0 offset-lg-0 offset-xl-0 text-center d-xl-flex justify-content-sm-center justify-content-md-center justify-content-lg-center justify-content-xl-center">
                    @foreach($noticias as $noticia)
                    <figure class="snip1527">
                        <div class="image">
                            <img class="img-noticia" src="/ficheiros/noticias/{{$noticia->foto}}" alt="/ficheiros/noticias/{{$noticia->foto}}" />
                        </div>
                        <figcaption>
                            <div class="date">
                                <span class="day"> {{date('d', strtotime($noticia->updated_at))}}</span>
                                <span class="month"> {{date('m', strtotime($noticia->updated_at))}}</span>
                            </div>
                            <h5 data-decimol="0" data-type="blob" data-originallength="10"><strong class="text-titulo">{{$noticia->titulo}}</strong></h5>
                            <p class="block-wiyh-text-noticia" data-decimol="0" data-type="blob" data-originallength="10">{{$noticia->descricao}}</p>
                        </figcaption>
                        <a href="/noticia/showdepois/{{$noticia->id}}"></a>
                    </figure>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="container conteiner-shadow" style="max-width: 100%;">
            <div class="row text-center" style="padding-right: 40px;padding-left: 40px;">
                <div class="col" data-aos="fade-down" data-aos-duration="800" data-aos-delay="800" style="padding-right: 0px;padding-left: 0px;">
                    <h2 class="text-justify" style="margin-top: 7px;color: #1e2671;font-weight: bold">FET Defesas</h2>
                    <hr style="background-color: #1e2671;margin-top: 5px;">
                    <!--<div class="carousel slide carousel-fade" data-ride="carousel" data-interval="false" id="carousel-1" style="padding-bottom: 10px;padding-right: 0px;padding-left: 0px;max-width: 100%;">
                        <div class="carousel-inner" role="listbox" style="padding-right: 35px;padding-left: 35px;">
                            <div class="carousel-item active">-->
                    <section class="card-section-imagia" style="padding-top: 15px;padding-bottom: 10px;background-color: rgba(241,241,241,0);">
                        <div class="container" style="padding-right: 0px;padding-left: 0px;">
                            <div class="row" style="margin: 0px;padding: 20px;padding-right: 10px;padding-left: 10px;">
                                @foreach($defesas as $defesa)
                                <div class="col-sm-6 col-md-4 col-lg-6 col-xl-3" style="padding-right: 5px;padding-left: 5px;max-width: 100%;">
                                    <div class="shadow card-container-imagia">
                                        <div class="card-imagia">
                                            <div class="front-imagia">
                                                <div class="cover-imagia">
                                                    <img alt="" src="../img/cardimg.jpg">
                                                </div>
                                                <div class="user-imagia">
                                                    <img class="rounded-circle img-circle" alt="" src="/ficheiros/estudantes/fotos/{{$defesa->foto}}" style="width: 100px;height: 100px;">
                                                </div>
                                                <div class="content-imagia defesa-front">
                                                    <h3 class="name-imagia">{{$defesa->autor}}</h3>
                                                    <p class="align-items-center text-titulo"><ion-icon name="book" ></ion-icon>&nbsp;<strong class="text-titulo-1"> Tema:</strong> {{$defesa->tema}}</p>
                                                    <p class="align-items-center text-titulo"><ion-icon name="person"></ion-icon>&nbsp;<strong class="text-titulo-1"> Supervisor:</strong> {{$defesa->supervisor}}</p>
                                                    <p class="align-items-center text-titulo"><ion-icon name="book"></ion-icon>&nbsp;<strong class="text-titulo-1"> Curso:</strong> {{$defesa->curso}}</p>
                                                    <p class="align-items-center text-titulo"><ion-icon name="calendar"></ion-icon>&nbsp;<strong class="text-titulo-1"> Data:</strong> {{date('d/m/y', strtotime($defesa->data))}}</p>
                                                    <p class="align-items-center text-titulo"><ion-icon name="time"></ion-icon>&nbsp;<strong class="text-titulo-1"> Hora:</strong> {{date('h:i', strtotime($defesa->hora))}}</p>
                                                </div>
                                                <div class="footer-imagia">
                                                    <span><i class="fa fa-plus"></i> Mais</span>
                                                </div>
                                            </div>
                                            <div class="back-imagia">
                                                <div class="content-imagia content-back-imagia">
                                                    <div class="content-imagia defesa-back">
                                                        <p class="align-items-center text-titulo"><ion-icon name="person"></ion-icon>&nbsp;<strong class="text-titulo-1"> Oponente:</strong> {{$defesa->oponente}}</p>
                                                        <p class="align-items-center text-titulo"><ion-icon name="person"></ion-icon>&nbsp;<strong class="text-titulo-1"> Presidente:</strong> {{$defesa->presidente}}</p>
                                                        <p class="align-items-center text-titulo"><ion-icon name="speedometer"></ion-icon>&nbsp;<strong class="text-titulo-1"> Nivel:</strong> {{$defesa->nivel}}</p>
                                                        <p class="align-items-center text-titulo"><ion-icon name="home"></ion-icon>&nbsp;<strong class="text-titulo-1"> Sala:</strong> {{$defesa->sala}}</p>
                                                        <p class="d-flex align-items-center text-titulo"><i class="fas fa-users"></i>&nbsp;<strong> {{count($defesa->participanteDefesa)}} Participantes</strong></p>
                                                        <label class="d-flex align-items-center" for=""><ion-icon name="document-text" style="color: #68c7ef;"></ion-icon>&nbsp; Resumo:</label>
                                                        <p class="block-wiyh-text-resumo" style="color:#7b7b7b">{{$defesa->resumo}}.&nbsp;</p>
                                                    </div>
                                                </div>
                                                <div class="footer-imagia">
                                                    <div class="social-imagia text-center">
                                                        <a class="btn btn-sm border rounded" href="/defesa/showdepois/{{$defesa->id}}" type="button" style="background-color: #16e8f5;font-family: Roboto, sans-serif;font-size:14px;">Saber mais</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!--<div class="col-sm-6 col-md-4 col-lg-6" style="padding-right: 7px;padding-left: 7px;max-width: 100%;">
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
                                                                <p class="text-justify  style="margin-bottom: 5px;color: rgb(2,25,48);font-family: Roboto, sans-serif;font-weight: bold;font-size: 13px;">Tema: Sistema de Gestao de Defesas</p>
                                                                <p class="text-justify  style="margin-bottom: 5px;color: rgb(2,25,48);font-family: Roboto, sans-serif;font-weight: bold;font-size: 13px;">Supervisor: dr. Aurelio Ribeiro</p>
                                                                <p class="text-justify  style="margin-bottom: 5px;color: rgb(2,25,48);font-weight: bold;font-family: Roboto, sans-serif;font-size: 13px;">Curso: Informatica</p>
                                                                <p class="text-justify  style="margin-bottom: 5px;color: rgb(2,25,48);font-family: Roboto, sans-serif;font-weight: bold;font-size: 13px;">Data: 20/04/2022</p>
                                                                <p class="text-justify  style="margin-bottom: 5px;color: rgb(2,25,48);font-family: Roboto, sans-serif;font-weight: bold;font-size: 13px;">Hora: 10:00</p>
                                                            </div>
                                                        </div>
                                                        <div class="border rounded back-imagia">
                                                            <div class="content-imagia content-back-imagia">
                                                                <div class="content-imagia" style="padding-top: 0px;padding-bottom: 5px;padding-right: 5px;padding-left: 5px;">
                                                                    <p class="text-justify  style="margin-bottom: 5px;font-size: 13px;color: rgb(2,25,48);font-family: Roboto, sans-serif;font-weight: bold;">Oponente: dra. Martina Barros</p>
                                                                    <p class="text-justify  style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 13px;font-family: Roboto, sans-serif;font-weight: bold;">Presidente: dr. Celio Sengo</p>
                                                                    <p class="text-justify  style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 13px;font-family: Roboto, sans-serif;font-weight: bold;">Nivel: Licenciatura</p>
                                                                    <p class="text-justify  style="margin-bottom: 5px;color: rgb(2,25,48);font-size: 13px;font-family: Roboto, sans-serif;font-weight: bold;">Sala: Inf. A</p>
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
                                            </div>-->
                            </div>
                        </div>
                    </section>
                    <!--</div>
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
                    </div>-->
                </div>


            </div>
        </div>
    </div>
    <div class="container conteiner-shadow" style="max-width: 100%;">
        <div class="row text-center" style="padding-right: 40px;padding-left: 40px;">
            <div class="col" data-aos="fade-down" data-aos-duration="800" data-aos-delay="800" style="padding-right: 0px;padding-left: 0px;">
                <h2 class="text-justify" style="color: #68c7ef;font-weight: bold;padding-top: 10px;">FET Monografias</h2>
                <hr style="background-color: #68c7ef;margin-top: 5px;">
                <section class="card-section-imagia" style="padding-top: 15px;padding-bottom: 10px;background-color: rgba(241,241,241,0);">
                    <div class="container" style="padding-right: 0px;padding-left: 0px;">
                        <div class="row" style="margin: 0px;padding: 20px;padding-right: 10px;padding-left: 10px;">
                            @foreach($monografias as $monografia)
                            <div class="col-sm-6 col-md-4 col-lg-6 col-xl-3" style="padding-right: 5px;padding-left: 5px;max-width: 100%;">
                                <div class="shadow card-container-imagia">
                                    <div class="card-imagia">
                                        <div class="front-imagia">
                                            <div class="cover-imagia">
                                                <img alt="" src="/../img/cardimg.jpg">
                                            </div>
                                            <div class="user-imagia">
                                                <img class="rounded-circle img-circle" alt="" src="/ficheiros/estudantes/fotos/{{$monografia->foto}}" style="width: 100px;height: 100px;">
                                            </div>
                                            <div class="content-imagia monografia-view">
                                                <h3 class="name-imagia">{{$monografia->autor}}</h3>
                                                <p class="align-items-center text-titulo"><ion-icon name="book"></ion-icon>&nbsp;<strong class="text-titulo-1"> Tema:</strong> {{$monografia->tema}}</p>
                                                <p class="align-items-center text-titulo"><ion-icon name="person"></ion-icon>&nbsp;<strong class="text-titulo-1"> Supervisor:</strong> {{$monografia->supervisor}}</p>
                                                <p class="align-items-center text-titulo"><ion-icon name="calendar"></ion-icon>&nbsp;<strong class="text-titulo-1"> Data:</strong> {{date('d/m/y', strtotime($monografia->created_at))}}</p>
                                            </div>
                                            <div class="footer-imagia">
                                                <span><i class="fa fa-plus"></i> Mais</span>
                                            </div>
                                        </div>
                                        <div class="back-imagia">
                                            <div class="content-imagia content-back-imagia">
                                                <div class="card-monografia-back">
                                                    <p class="align-items-center text-titulo"><ion-icon name="speedometer"></ion-icon>&nbsp;<strong class="text-titulo-1"> Nivel:</strong> {{$monografia->nivel}}</p>
                                                    <p class="align-items-center text-titulo"><ion-icon name="book"></ion-icon>&nbsp;<strong class="text-titulo-1"> Curso:</strong> {{$monografia->curso}}</p>
                                                    <p class="d-flex align-items-center"><ion-icon name="cloud-download"></ion-icon> &nbsp;{{count($monografia->downloadMonografia)}} Downloads</p>
                                                    <label class="d-flex align-items-center" for=""><ion-icon name="document-text" style="color: #68c7ef;"></ion-icon>&nbsp; Resumo:</label>
                                                    <p><strong class="block-wiyh-text-resumo" style="color: #7b7b7b;">{{$monografia->resumo}}.&nbsp;</strong></p>
                                                </div>
                                            </div>
                                            <div class="footer-imagia">
                                                <div class="social-imagia text-center">
                                                    <a class="btn btn-sm border rounded" href="/monografia/showdepois/{{$monografia->id}}" type="button" style="font-family: Roboto, sans-serif;font-size:14px; background-color: #16e8f5;">Saber mais</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
</section>
@endsection