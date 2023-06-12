@extends('layouts.user')

@section('title', 'Participantes')

@section('content')
<section style="background-repeat: no-repeat;background-size: cover;">
    <div class="container" style="background-image: url(&quot;/../img/Background_Page.jpg&quot;);background-repeat: no-repeat;background-size: cover;max-width: 100%;padding-right: 0px;padding-left: 0px;padding-bottom:70px">
        <nav class="navbar navbar-light navbar-expand-md shadow-lg navigation-clean" style="background-color: rgba(255,255,255,0);padding: 8px;">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="#" style="background-size: cover;background-position: center;padding-right: 10px;padding-left: 10px;font-family: Roboto, sans-serif;font-weight: bold;"><i class="fas fa-user-graduate"></i>SGDFET&nbsp;&nbsp;<small class="text-center border rounded border-white" style="font-size: 10px;font-weight: bold;background-color: rgb(248,248,248);font-style: normal;font-family: ABeeZee, sans-serif;padding: 5px;padding-top: 1px;padding-bottom: 1px;color: rgb(27,147,198);">v.1.0</small></a>
                <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1" style="background-color: rgb(254,252,252);">
                    <span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" href="{{('/inicio')}}" style="color: rgb(255,255,255);font-size: 16px;">Inicio</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle nav-link text-white" data-toggle="dropdown" aria-expanded="false" href="#" style="font-size: 16px;">Mais&nbsp;</a>
                            <div class="dropdown-menu bg-white" role="menu">
                                <a class="dropdown-item" role="presentation" data-bs-hover-animate="pulse" href="{{('/defesas')}}" style="color: rgb(90,161,220); font-size:16px;">Defesas</a>
                                <a class="dropdown-item" role="presentation" data-bs-hover-animate="pulse" href="{{('/monografias')}}" style="color: rgb(90,161,220); font-size:16px;">Monografias</a>
                            </div>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link text-white" href="{{('/sobre/depois')}}" style="font-size: 16px;">Sobre</a>
                        </li>

                        <li class="nav-item dropdown no-arrow" role="presentation">
                            <div class="nav-item dropdown no-arrow">
                                <a class="dropdown-toggle text-white nav-link" style="font-size: 16px" data-toggle="dropdown" aria-expanded="false" href="#">
                                    <span style="margin-right: 5px;">{{auth()->user()->name}}</span>
                                    @if(auth()->user()->is_estudante)
                                    <img class="border rounded-circle img-perfil" src="/ficheiros/estudantes/fotos/{{auth()->user()->estudanteUser->foto}}">
                                    @else
                                    <img class="border rounded-circle img-perfil" src="/ficheiros/visitantes/fotos/{{auth()->user()->visitanteUser->foto}}">
                                    @endif
                                </a>
                                <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu">
                                @if(auth()->user()->is_estudante)
                                <a class="dropdown-item" style="font-size: 14px" role="presentation" href="/usuario/perfilestudante/{{auth()->user()->id}}"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a>
                                @else
                                    <a class="dropdown-item" style="font-size: 14px" role="presentation" href="/usuario/perfilvisitante/{{auth()->user()->id}}"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a>
                                    @endif
                                    <!--<a class="dropdown-item" role="presentation" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a>
                                    <a class="dropdown-item" role="presentation" href="#"><i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Activity log</a>-->
                                    <a class="dropdown-item" style="font-size: 16px" role="presentation" href="{{ ('/usuario/logout') }}"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="row" style="padding: 20px;padding-bottom: 20px;">
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
                            <img src="/ficheiros/galeria/{{$galeria->foto}}" alt="fw_al_001_01">

                            <!-- Slide Text Layer -->
                            <div class="fw_al_001_slide">
                                <p data-animation="animated fadeInUp"><strong>{{date('d/m/y', strtotime($galeria->updated_at))}}</strong></p>
                                <h2 data-animation="animated fadeInUp"><strong class="block-wiyh-text">{{$galeria->titulo}}</strong></h2>
                                <a href="/galeria/showantes/{{$galeria->id}}" type="button" data-bs-hover-animate="pulse" style="background-color: #16e8f5;border:none;border-radius: .35rem;" data-animation="animated fadeInUp">Saber mais</a>
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
<section style="padding-top: 20px;">
    <div class="container shadow" style="margin-bottom: 40px">
        <div class="row">
            <div class="col">
                <div style="background-color: #74d0f6;width:100%">
                    <h3 class="d-xl-flex mr-auto" style="color: #ffffff;font-family: Roboto, sans-serif;padding:20px"><strong>Participantes da defesa</strong></h3>
                </div>
                <main>
                    <div class="container-fluid" role="alert" style="width: 100%;padding-top: 8px;padding-bottom: 8px;">
                        <div class="mensagem">
                            @if(session('msgParticipante'))
                            <p class="msg"><Strong>{{session('msgParticipante')}}</Strong></p>
                            @endif
                        </div>
                    </div>
                    <div class="container-fluid" role="alert" style="width: 100%;padding-top: 8px;padding-bottom: 8px;">
                        <div class="mensagem">
                            @if(session('msgRemove'))
                            <p class="msg"><Strong>{{session('msgRemove')}}</Strong></p>
                            @endif
                        </div>
                    </div>
                </main>
                <div class="card-body">
                    @if(count($participantes) > 0)
                    <div class="table-responsive" data-aos="fade-up" data-aos-duration="800" data-aos-delay="800">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="color: #3a3a3b;">#</th>
                                    <th style="color: #3a3a3b;">Nome</th>
                                    <th style="color: #3a3a3b;">Curso</th>
                                    <th style="color: #3a3a3b;">Data</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($participantes as $defesa)

                                <tr>
                                    <td style="color: #3a3a3b;">{{$loop->index + 1}}</td>
                                    <td class="d-flex align-items-center" style="color: #3a3a3b;"><img class="rounded-circle" src="/ficheiros/estudantes/fotos/{{$defesa->foto}}" width="40px" style="margin-right: 10px;" height="40px">{{$defesa->autor}}</td>
                                    <td style="color: #3a3a3b;">{{$defesa->curso}}</td>
                                    <td style="color: #3a3a3b;">{{$defesa->data}}</td>
                                    <td>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    @else
                    <div style="padding:20px">
                        <p class="msg" style="color:#2390be;">Você não está participando de nenhuma defesa, <a href="{{('/defesas')}}" style="font-size: 16px;">Veja todas defesas disponiveis</a></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection