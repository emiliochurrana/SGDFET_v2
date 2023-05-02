<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
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
</head>

<body class="login-body">
    <section class="d-xl-flex justify-content-xl-center align-items-xl-center login-section" style="padding-top: 100px;">
        <div class="container text-break d-xl-flex" style="padding-top: 100px;">
            <div class="text-center border rounded border-white shadow-lg login-card" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="800" data-aos-once="true">
                <h3 class="titulo-login" style="color: #ffffff;">Sistema de Gestão de Defesas FET<br></h3>
                    <img class="img-fluid profile-img-card" src="../img/up.png">
                    <p class="profile-name-card"> </p>

                        <form class="form-signin" style="margin-bottom: 20px;" action="{{ ('/usuario/login') }}" method="get">
                            <span class="reauth-email"> 
                                <input class="form-control" type="text" placeholder="Nome do Usuario" name="username" required="" autofocus="" autocomplete="on">
                            </span>
                            <input class="form-control" type="password" id="inputPassword" name="password" required="" placeholder="Palavra-passe">
                            <div class="checkbox">
                                <div class="form-check text-justify">
                                    <input class="form-check-input" type="checkbox" id="formCheck-1">
                                    <label class="form-check-label" for="formCheck-1" style="color: #ffffff;">Remember me</label>
                                </div>
                            </div>
                            <button class="btn btn-block border rounded border-primary btn-signin" type="submit" style="background-color: #09b0f8;color: #ffffff;">Autenticar</button>
                            <a class="text-center forgot-password" href="#" style="color: #68d3ff;">Esqueceu a senha?</a>
                        </form>

                        <div class="row text-center text-xl-center d-xl-flex justify-content-xl-center" style="margin-right: -40px;margin-left: -40px;padding: 10px;height: 46px;background-color: #d7d2d2;">
                            <div class="col-sm-6 col-xl-8 offset-xl-0 text-break d-flex justify-content-xl-center align-items-xl-center">
                                <a class="text-secondary forgot" href="{{('/')}}" style="color: #ffffff;"><i class="fa fa-copyright"></i>&nbsp;2022 | FET</a>
                            </div>
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
</body>

</html>