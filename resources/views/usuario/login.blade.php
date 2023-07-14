<!--<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Fet</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="../fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../fonts/line-awesome.min.css">
    <link rel="stylesheet" href="../fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="../fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="/../css/File-Input---Beautiful-Input--Button-Approach-Jasny-Bootstrap.css">
    <link rel="stylesheet" href="../css/Google-Style-Login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.0/../owl.carousel.css">
    <link rel="stylesheet" href="../css/News-Cards.css">
    <link rel="stylesheet" href="../css/slider-with-popup.css">
</head>

<body class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center" style="padding-top: 200px;padding-bottom: 200px;background-image: url(&quot;../img/up-maputo.png&quot;);background-repeat: no-repeat;background-size: contain;background-position: center;">
    <section class="d-sm-flex d-md-flex d-lg-flex d-xl-flex align-items-sm-center align-items-md-center align-items-lg-center align-items-xl-center">
        <div class="container d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center" style="padding-right: 0px;padding-left: 0px;">
            <div class="border rounded shadow-lg login-card" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="500">
                <div class="header-login-div">
                    <h4 class="login-header">SISTEMA DE GESTÃO DE DEFESAS FET<br></h4><img class="d-lg-flex" style="width: 260px;height: 55px;background-size: contain;" src="../img/card_img.png">
                </div>
                <form class="form-signin needs-validation" action="{{ ('/usuario/login') }}" method="get" novalidate>
                    <span class="reauth-email"> </span>
                <input class="form-control" 
                type="text" 
                required 
                id="username" 
                name="username" 
                placeholder="Nome do usuario"
                pattern="^[a-zA-Z0-9_.-@]*$">

                <input class="form-control" 
                type="password" 
                id="inputPassword" 
                required
                placeholder="Senha" 
                name="password"
                minlength="4">
                    <div class="checkbox">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="formCheck-1">
                            <label class="form-check-label" for="formCheck-1">Lembrar-me</label>
                        </div>
            </div>
            <button class="btn btn-primary btn-block btn-lg btn-signin" type="submit">Autenticar</button>
        </form>
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
                        </script>
        <a class="forgot-password" href="#">Esqueceu a senha?<br></a>
        <main>

        <div class="container-fluid" role="alert" style="width: 100%;padding-top: 8px;padding-bottom: 8px;">
            <div class="mensagem-error">
                @if(session('msg'))
                <p class="msg"><Strong>{{session('msg')}}</Strong></p>
                @endif
            </div>
        </div>
    </main>
    <div class="row text-center text-xl-center d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-sm-center justify-content-md-center justify-content-lg-center justify-content-xl-center footer-login">
    <div class="col-sm-6 col-xl-8 offset-xl-0 text-break d-flex justify-content-center"><a href="{{('/')}}"><i class="fa fa-copyright"></i>2023|FETUPM</a></div>
            </div>
        </div>
        </div>
    </section>
    <script src="../js/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="../js/File-Input---Beautiful-Input--Button-Approach-Jasny-Bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.0/owl.carousel.js"></script>
    <script src="../js/theme.js"></script>
</body>

</html>-->


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="_token" content="{{csrf_token()}}" />
    <title>Login</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="../fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../fonts/line-awesome.min.css">
    <link rel="stylesheet" href="../fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="../fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="../css/File-Input---Beautiful-Input--Button-Approach-Jasny-Bootstrap.css">
    <link rel="stylesheet" href="../css/Google-Style-Login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="../css/News-Cards.css">
    <link rel="stylesheet" href="../css/slider-with-popup.css">
    <link rel="stylesheet" href="../css/Team-with-rotating-cards.css">
    <link rel="stylesheet" href="../css/Swipe-Slider-7.css">
    <link rel="stylesheet" href="../css/Estatisticas.css">
</head>

<body class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center" style="padding-top: 200px;padding-bottom: 200px;background-image: url(&quot;../img/up-maputo.png&quot;);background-repeat: no-repeat;background-size: contain;background-position: center;">
    <section class="d-sm-flex d-md-flex d-lg-flex d-xl-flex align-items-sm-center align-items-md-center align-items-lg-center align-items-xl-center">
        <div class="container d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center" style="padding-right: 0px;padding-left: 0px;">
            <div class="border rounded shadow-lg login-card" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="500">
                <main>
                    <div class="container-fluid" role="alert" style="width: 100%;padding-top: 8px;padding-bottom: 8px;">
                            @if(session('msgEmail'))
                            <p class="text-danger" style="text-align:center;"><Strong>{{session('msgEmail')}}</Strong></p>
                            @endif
                        
                    </div>
                    <div class="container-fluid" role="alert" style="width: 100%;padding-top: 8px;padding-bottom: 8px;">
                            @if(session('msgPass'))
                            <p class="text-danger" style="text-align:center;"><Strong>{{session('msgPass')}}</Strong></p>
                            @endif
                    </div>
                    <div class="container-fluid" role="alert" style="width: 100%;padding-top: 8px;padding-bottom: 8px;">
                            @if(session('msgSucessStore'))
                            <p class="text-success" style="text-align:center;"><Strong>{{session('msgSucessStore')}}</Strong></p>
                            @endif
                    </div>
                    <div class="container-fluid" role="alert" style="width: 100%;padding-top: 8px;padding-bottom: 8px;">
                            @if(session('msgErrorStore'))
                            <p class="text-danger" style="text-align:center;"><Strong>{{session('msgErrorStore')}}</Strong></p>
                            @endif
                        
                    </div>
                </main>
                <div class="header-login-div" style="margin-top: -20px;">
                    <h4 class="login-header"><strong>SISTEMA DE GESTÃO DE DEFESAS FET<br></strong></h4>
                    <img class="d-lg-flex" style="width: 260px;height: 55px;background-size: contain;" src="../img/card_img.png">
                </div>
                <form class="form-signin needs-validation" action="{{ ('/usuario/login') }}" method="get" novalidate>
                    <span class="reauth-email"> </span>
                    <input class="form-control" type="text" required id="username" name="username" placeholder="Nome do usuario" pattern="^[a-zA-Z0-9_.-@]*$">

                    <input class="form-control" type="password" id="inputPassword" required placeholder="Senha" name="password" minlength="4">
                    <div class="checkbox">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="formCheck-1">
                            <label class="form-check-label" for="formCheck-1">Lembrar-me</label>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block btn-lg btn-signin" type="submit">Autenticar</button>
                </form>
                <a style="font-size: 16px;" class="forgot-password" href="#">Esqueceu a senha?<br></a>
                <p class="msg">Não possui uma conta? <a style="font-size: 16px;" class="forgot-password" data-bs-hover-animate="tada" data-toggle="modal" data-target="#modal" href="#">Cadastre-se<br></a></p>

                <main>
                    <div class="container-fluid" role="alert" style="width: 100%;padding-top: 8px;padding-bottom: 8px;">
                            @if(session('msg'))
                            <p class="text-danger" style="text-align:center;"><Strong>{{session('msg')}}</Strong></p>
                            @endif
                    </div>
                </main>
                <div class="row text-center text-xl-center d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-sm-center justify-content-md-center justify-content-lg-center justify-content-xl-center footer-login">
                    <div class="col-sm-6 col-xl-8 offset-xl-0 text-break d-flex justify-content-center"><a href="{{('/')}}"><i class="fa fa-copyright"></i>2023|FET</a></div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="modal fade cnetro" role="dialog" tabindex="-1" id="modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #68c7ef;">
                        <h6 class="titulos" style="color:#ffffff">Formulário de cadastro</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form class="needs-validation" id="form-d" method="POST" action="{{ route('storevisitante') }}" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="modal-body">
                            <div class="col text-left d-flex padMar">
                                <div class="form-group" style="width:100%">
                                    <div class="d-flex justify-content-center align-items-center fileinput fileinput-new input-group" for="foto" style="background-color: #68c7ef;" data-provides="fileinput">
                                        <label class="btn d-flex justify-content-center align-items-center" style="color: #ffffff;"><ion-icon name="images" style="color: #ffffff;"></ion-icon>&nbsp;Foto</label>
                                        <input class="form-control file-input" accept="image/*" type="file" id="foto" name="foto">
                                        <div style="background-color: #68c7ef;" for="foto" data-trigger="fileinput">
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
                                    <div class="d-flex justify-content-center align-items-center input-group">
                                        <input class="shadow form-control" type="text" data-aos="zoom-in" id="name" required data-aos-duration="800" data-aos-delay="800" autofocus="" autocomplete="on" placeholder="Nome Completo" style="background-color: #ffffff;" name="name">
                                    </div>
                                </div>
                            </div>
                            <div class="col text-left d-flex padMar">
                                <div class="form-group" style="width:100%">
                                    <div class="d-flex justify-content-center align-items-center input-group">
                                        <input class="shadow form-control" type="email" data-aos="zoom-in" id="email" required data-aos-duration="800" pattern="^[a-zA-Z0-9_.-@]*$" data-aos-delay="800" autofocus="" autocomplete="on" placeholder="Email" style="background-color: #ffffff;" name="email">
                                    </div>
                                </div>
                            </div>

                            <div class="col text-left d-flex padMar">
                                <div class="form-group" style="width:100%">
                                    <div class="d-flex justify-content-center align-items-center input-group">
                                        <input class="shadow form-control" type="password" data-aos="zoom-in" id="password" required data-aos-duration="800" minlength="6" data-aos-delay="800" autofocus="" autocomplete="on" placeholder="Senha" style="background-color: #ffffff;" name="password">
                                    </div>
                                </div>
                            </div>
                            <div class="col text-left d-flex padMar">
                                <div class="form-group" style="width:100%">
                                    <div class="d-flex justify-content-center align-items-center input-group">
                                        <input class="shadow form-control" type="password" data-aos="zoom-in" id="confirm_password" required data-aos-duration="800" minlength="6" data-aos-delay="800" autofocus="" autocomplete="on" placeholder="Digite novamente a senha" style="background-color: #ffffff;" name="confirm_password">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-lg text-white border btn-block rounded btn-Oscuro" id="ajaxSubmit" type="submit" style="background-color: #68c7ef;">Cadastrar</button>
                        </div>
                    </form>
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
                    </script>
                </div>
            </div>
        </div>
    </section>


    <script src="../js/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="../js/File-Input---Beautiful-Input--Button-Approach-Jasny-Bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="../js/theme.js"></script>
    <script src="../js/Swipe-Slider-7.js"></script>

    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integridade="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anônimo">
    </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integridade="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"> </script>
    <script nomodule src="https://unpkg .com/ionicons@7.1.0/dist/ionicons/ionicons.js"> </script>
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQJdKHOTYvcNyb3vcH84lhItWs-e2Qrsk&libraries=geometry&callback=initMap">
    </script>
</body>

</html>