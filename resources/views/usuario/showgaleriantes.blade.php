@extends('layouts.user')

@section('title', 'Galeria')

@section('content')
<section style="max-width: 100%;padding: 20px;">
    <div class="container border rounded shadow" style="padding-bottom: 0px;max-width: 100%;padding-right: 0px;padding-left: 0px;">
        <div class="row" style="padding-top: 20px;padding-bottom: 0px;">
            <div class="col-xl-12 offset-xl-0">
                <h2 data-aos="zoom-in" data-aos-duration="400" data-aos-delay="400" style="font-family: Roboto, sans-serif;font-weight: bold;color: #3ba2dc;margin-left: 20px;">Detalhes da Imagem</h2>
                <hr style="background-color: #3ba2dc;margin-top: 5px;">
            </div>
        </div>
        <div class="row no-gutters text-justify" style="padding-top: 10px;padding-bottom: 5px;max-width: 100%;padding-left: 40px;padding-right: 30px;">
            <div class="col-xl-4 offset-xl-0 d-xl-flex align-items-sm-center align-items-md-center align-items-lg-center justify-content-xl-center align-items-xl-center" data-aos="zoom-in" data-aos-duration="450" data-aos-delay="450" style="height: 100%;">
                <img class="rounded img-fluid" style="background-size: cover;" src="../img/img-1.jpg" width="300px" height="300px">
            </div>
            <div class="col" style="height: 100%;padding-bottom: 0px;">
                <h5 data-aos="zoom-in" data-aos-duration="450" data-aos-delay="450" style="font-weight: bold;font-family: Roboto, sans-serif;color: #000000;"><i class="fas fa-book-open" style="color: #68c7ef;"></i>&nbsp;Titulo:</h5>
                <p data-aos="zoom-in" data-aos-duration="450" data-aos-delay="450" style="color: #000000;"><i class="fa fa-calendar" style="color: #68c7ef;"></i>&nbsp;Data:</p>
            </div>
        </div>
        <div class="row" style="padding-top: 20px;max-width: 100%;padding-bottom: 20px;padding-right: 20px;padding-left: 30px;">
            <div class="col-xl-12 offset-xl-0" data-aos="zoom-in" data-aos-duration="450" data-aos-delay="450" style="padding-right: 40px;padding-left: 40px;">
                <h5 style="color: #3ba2dc;font-family: Roboto, sans-serif;font-weight: bold;">
                    <strong>Descrição</strong><br>
                </h5>
                <p class="text-justify" data-aos="zoom-in" data-aos-duration="450" data-aos-delay="450" style="font-family: Roboto, sans-serif;padding-left: 15px;">
                    O controlo eficiente de todas as actividades das empresas, sempre foi um desafio para os seus gestores. Diante desta demanda, os sistemas de informação têm sido concebidos no intuito de suprir essas necessidades imediatas das empresas,
                    como por exemplo a gestão automática de todas as actividades de um determinado sector. Com a utilização de sistemas de informação, há possibilidade dos processos institucionais possam ser automatizados, diminuindo todo o trabalho
                    feito manualmente, e também temos um conjunto de componentes inter-relacionados, trabalhando juntos para coletar, processar, armazenar e distribuir informação, com o propósito de facilitar o controle, o planejamento, a coordenação,
                    a análise e o processo decisório em empresas e outras organizações. <br>
                </p>
            </div>
        </div>
    </div>
    @endsection