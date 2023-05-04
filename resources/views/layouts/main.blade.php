<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Fet</title>
    <link rel="stylesheet" href="/../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="/../fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="/../fonts/font-awesome.min.css">
    <link rel="stylesheet" href="/../fonts/line-awesome.min.css">
    <link rel="stylesheet" href="/../fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="/../fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="/../css/File-Input---Beautiful-Input--Button-Approach-Jasny-Bootstrap.css">
    <link rel="stylesheet" href="/../css/Google-Style-Login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="/../css/News-Cards.css">
    <link rel="stylesheet" href="/../css/slider-with-popup.css">
    <link rel="stylesheet" href="/../css/Team-with-rotating-cards.css">
</head>

<body>
@yield('content')
    
    <section>
        <div class="container" style="background-color: #031e32;max-width: 100%;">
            <footer style="padding: 15px;padding-right: 0px;padding-left: 0px;">
                <div class="container" style="margin-bottom: 0px;margin-top: 0px;">
                    <div class="row">
                        <div class="col-lg-5" style="padding: 50px;padding-right: 0px;padding-left: 40px;">
                            <small class="form-text text-center" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="800" style="color: rgb(242,245,248);font-size: 25px;font-family: 'Titillium Web', sans-serif;padding-right: 0px;padding-left: 0px;">Contactos</small>
                            <small class="form-text" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="800" style="color: rgb(255,255,255);font-size: 16px;font-family: 'Open Sans', sans-serif;">&nbsp;
                                <i class="fa fa-phone" style="font-size: 18px;color: rgb(251,253,255);"></i>&nbsp; Telefone:&nbsp; +(258) 860039146
                            </small>
                            <small class="form-text text-justify" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="800" style="font-size: 16px;color: rgb(216,229,242);font-family: 'Open Sans', sans-serif;">
                                <i class="la la-envelope" style="filter: blur(0px) brightness(188%) contrast(165%);font-size: 18px;"></i>&nbsp; E-mail: estec@up.ac.mz
                            </small>
                            <small class="form-text" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="800" style="color: rgb(255,255,255);font-size: 16px;font-family: 'Open Sans', sans-serif;">
                                <i class="icon-location-pin"></i>&nbsp;&nbsp;Campus de Lhanguene Av. do Trabalho No. 248<br>
                            </small>
                        </div>
                        <div class="col-lg-7 col-xl-7">
                            <main>
                            <div class="container-fluid" role="alert" style="width: 100%;padding-top: 8px;padding-bottom: 8px;">
                                <div class="mensagem">
                                    @if(session('msgSucess'))
                                    <p class="msg"><Strong>{{session('msgSucess')}}</Strong></p>
                                    @endif
                                </div>
                                </div>
                                <div class="container-fluid" role="alert" style="width: 100%;padding-top: 8px;padding-bottom: 8px;">
                                <div class="mensagem-error">
                                    @if(session('msgError'))
                                    <p class="msg"><Strong>{{session('msgError')}}</Strong></p>
                                    @endif
                                </div>
                                </div>
                            </main>
                            <form class="text-center border rounded" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="800" role="form " style="background-image: url(&quot;../img/Background_Page.jpg&quot;);
                            background-color: rgba(23,162,184,0);padding: 30px;padding-right: 40px;padding-left: 40px;
                            margin-bottom: 20px;margin-top: 20px;padding-bottom: 10px;background-position: center;background-size: cover;padding-top: 10px;" method="post" action="{{ ('/comentario') }}">
                                @csrf
                                <h5 class="text-center text-white" style="font-weight: bold;padding: 5px;padding-top: 2px;padding-bottom: 7px;padding-right: 0px;padding-left: 0px;">Contact-nos</h5>
                                <div class="form-row">
                                    <div class="col-lg-5 col-xl-4 offset-xl-0">
                                        <div class="form-group">
                                            <input class="border rounded border-info form-control form-control-sm" type="text" name="name" placeholder="Nome completo" required="" style="height: 40px;">
                                        </div>
                                        <div class="form-group">
                                            <input class="border rounded border-info form-control form-control-sm" type="email" placeholder="Email" required="" name="email" autocomplete="on" style="height: 40px;margin-top: 30px;">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-xl-5 offset-xl-0">
                                        <div class="form-group">
                                            <textarea class="border rounded border-info form-control form-control-sm d-xl-flex" name="mensagem" placeholder="Escreva o seu comentário aqui" autocomplete="on" required="" style="height: 110px;"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-xl-3 offset-xl-0">
                                        <button class="btn btn-light btn-sm text-justify text-dark border rounded border-success" type="submit" style="margin: 40px;background-color: rgb(255,255,255);">Enviar</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <p class="text-center d-xl-flex justify-content-xl-center copyright" style="color: rgb(239,243,247);margin-top: 20px;margin-bottom: 20px;">Repositório&nbsp; © 2022 Todos direitos reservados, Universidade Pedagogica Maputo/FET</p>
                </div>
            </footer>
        </div>
    </section>


    <script src="../js/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="../js/File-Input---Beautiful-Input--Button-Approach-Jasny-Bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="../js/theme.js"></script>
</body>

</html>