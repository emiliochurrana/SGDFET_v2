
@extends('layouts.main')

@section('title', 'Home')

@section('content')
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