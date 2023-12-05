                                       
                                       <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('title')</title>

    <link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script  type = "module"  src = "https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js" > </script> 
    <script  nomodule  src = "https://unpkg .com/ionicons@7.1.0/dist/ionicons/ionicons.js" > </script>
    
    <style>
        body{
            margin: 0;
            font-family: Nunito, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #858796;
            text-align: left;
            background-color: #fff
        }

        .container-fluid{
            margin-top: 20px;
            margin-bottom: 20px;
            width: 100%;
            padding-right: .75rem;
            padding-left: .75rem;
            margin-right: auto;
            margin-left: auto;
            flex-wrap: nowrap;
            align-items: center;
            justify-content: space-between
        }

        .modal-body{
            display: flex !important;
            position: relative;
            flex-wrap: nowrap;
            justify-content: center;
            justify-items: center;
        }
        modal-body{
            overflow-y: auto;
            display: flex !important;
            position: relative;
            flex: 1 1 auto;
            padding-left: 1rem;
            padding-right: 1rem;
            padding-bottom: 0;
            margin-bottom: 0;
            justify-content: center;
            flex-wrap: nowrap;
            margin-right: -.75rem;
            margin-left: -.75rem;
            justify-items: center;
        }

        .imagem-logoUp{
            padding-left: 20px;
            display: flex;
            flex-wrap: wrap;
            margin-right: 5rem;
            margin-left: 5rem;
            display: flex; 
            justify-content: start;

        }
        .imagem-card{
            padding-right: 20px;
            display: flex;
            flex-wrap: wrap;
            margin-right: -.75rem;
            margin-left: 20rem;
            display: flex; 
            justify-content: end;
            
        }

        .img-header-fet{
            width: 250px;
            height: 70px;
        }
        .img-header-up{
            width: 150px;
            height: 70px;
        }
        .col-titulo{
            margin-top: 0;
            padding: 0;
            margin-bottom: 0;
        }
        .col-titulo h2{
            color: #000;
            font-family: sans-serif;
            font-weight: bold;
            padding: 0;
            margin: 0;
        }

        h3{
            text-transform: uppercase !important;
            display: flex !important;
            justify-content: center;
            color: #000;
            font-family: sans-serif;
            font-weight: bold;

        }

        .subtitulo{
            display: flex;
            flex-wrap: wrap;
            margin-right: -.75rem;
            margin-left: -.75rem;
            justify-content: center;
            justify-items: center;
            margin-top: 0px;
        }

        .subtitulo p{
            margin-top: 0;
            font-size: 12px;
        }
        .p{
            font-size: 12px;
        }
        .container-end{
            display: flex;
            flex-wrap: wrap;
            margin-right: -.75rem;
            margin-left: -.75rem;
            display: flex; 
            justify-content: end;
            padding-bottom: 20px;
        }
        .col-container{
            display: flex;
            flex-direction: column !important;
            justify-content: center;
            justify-items: center;
            padding-right: 150px;
            padding-left: 600px;
        
        }
        .card{
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid #e3e6f0;
            border-radius: .35rem;
            justify-content: center !important;
            justify-items: center !important;
            padding-left: 10px;
            padding-right: 10px;
            text-align: center;
        }
        .card p{
            font-size: 14px;
        }
        .director{
            margin-bottom: 20px;
        }
        .card-body{
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1.25rem;
            padding-top: 0;
        }
        .table-responsive{
            border: 0;
            padding-top: 0px;
        }
        .table{
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 1rem;
            color: #858796;
        }
        .table td,
        .table th{
            padding: .75rem;
            vertical-align: top;
            border: 1px solid #000;
        }
        .table thead th{
            vertical-align: bottom;
            border: 2px solid #000
        }
        .table tbody+tbody{
            border: 2px solid #000
        }
    
       .table th{
            color: #2694c1;
       }
       .table td{
            color:#3a3a3b;
            font-size: 12px;
       }
       .table td p{
            color:#3a3a3b;
            font-size: 12px;
       }

       .table tr{
            border: 1px, solid #e3e6f0;
       }
       .img-perfil{
            display: flex;
            align-items: center;
            justify-items: center;
            justify-content: center;
            min-width:200px
       }

       .img-perfil img{
            border-radius: 50% !important;
            background-size: cover;
            max-width: 30px;
            min-width: 30px;
            max-height: 30px;
            min-height: 30px;
       }
       .data-impressao{
            display: flex;
            flex-wrap: wrap;
            margin-right: -.75rem;
            margin-left: -.75rem;
            display: flex;
            justify-content: center;
            justify-items: center;
       }
       .col{
            flex-basis: 0;
            flex-grow: 1;
            max-width: 100%;
            text-align: center;
       }
       .director-curso{
        display: flex !important;
            position: relative;
            flex-wrap: nowrap;
            justify-content: center;
            justify-items: center;
       }

       .col-director-curso{
        display: flex;
            flex-direction: column !important;
            justify-content: center;
            justify-items: center;
            padding-right: 150px;
            padding-left: 50px;
       }

       .col-director-curso-1{
            display: flex;
            flex-direction: column !important;
            justify-content: center;
            justify-items: center;
            padding-right: 600px;
            padding-left:50px;
       }
       col-director-curso{
            position: relative;
            flex-wrap: wrap;
            margin-right: 5rem;
            margin-left: 2rem;
            justify-content: start !important;
       }
       col-director-curso-1{
        position: relative;
            flex-wrap: wrap;
            margin-right: -.75rem;
            margin-left: 15rem; 
            justify-content: end;
        }
.linha{
    padding-left: 100px; 
    padding-right:100px;
    margin-top:0px
}
.linha-1{
    margin-top: 5px; 
    background-color:#6b6c6d;
    padding-top:1px; 
    margin-bottom:0px;
}
.linha-2{
    margin-top: 5px;
    background-color:#6b6c6d;
    padding-top:5px;
    margin-bottom:0px;
    margin-top:0.5px
}
.linha-3{
    width: 250px;
}

.data{
    display: flex;
    flex-wrap: wrap;
    margin-right: .75rem;
    margin-left: .75rem;
    display: flex; 
    justify-content: start;
    padding-left: 20px;
    margin: 0;
    padding-bottom: 0px;
}
.data p{
    font-weight: bold;
    color: #000;
    font-size: 16px;
}

    </style>
</head>

    <body>
                                       
                                       
                                            <!--Container de detalhes da defesa -->
                                            <div class="container-fluid">
                                                <div class="card shadow"> 
                                                <div class=" modal-body">
                                                    <div class="imagem-logoUp">
                                                        <img  class="img-header-up" src="'.public_path().'/public/img/up_logo.jpeg"/>
                                                    </div>
                                                    <div class="imagem-card">
                                                        <img class="img-header-fet" src="http://127.0.0.1:8000/sgdfet_v2/ img/card_img.png" />
                                                    </div>
                                                </div>
                                                <div class="col-titulo">   
                                                        <h3>CURSO DE LICENCIATURA EM {{$defesas->curso}}</h3>
                                                </div>
                                                <div class="linha">
                                                    <hr class="linha-1">
                                                    <hr class="linha-2">
                                                </div>
                                                <div class="subtitulo">
                                                        <P>Campos de Lhanguene, Av. de Trabalho, 2482. Maputo Tel.: +258 822 414 880</P> 
                                                </div>
                                                <div class=" container-end">
                                                    <div class="col-container">
                                                        <div class="card">
                                                            <p class="director">Diretor(a) Adjunto(a) de Graduação</p>
                                                            <hr class="linha-3">
                                                            <p>(Mestre Evelina C. Sambane)</p>
                                                        </div>
                                                    </div>
                                                </div>
                                              
                                                <div class="col-titulo">
                                                        <h3>CALENDARIO DE DEFESA DE MONOGRAFIA CIENTIFICA</h3>
                                                </div>
                                                
                                            <div class="card-body">
                                            <div class="data">
                                                    <p>DATA:&nbsp;{{date('d/m/y', strtotime($defesas->data))}}</p>
                                                </div>
                                                <div class="table-responsive" data-aos="fade-up" data-aos-duration="800" data-aos-delay="800">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th><strong>Nome do Candidato</strong></th>
                                                                <th><strong>Código</strong></th>
                                                                <th><strong>Tema</strong></th>
                                                                <th><strong>Curso</strong></th>
                                                                <th><strong>Nivel</strong></th>
                                                                <th><strong>Juri</strong></th>
                                                                <th><strong>Hora</strong></th>
                                                                <th><strong>Sala</strong></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="img-perfil">
                                                                <img src="'.public_path().'/ficheiros/estudantes/fotos/{{$defesas->foto}}">&nbsp;{{$defesas->autor}}
                                                                    </div>
                                                            </td>
                                                                <td>{{$defesas->codigo_estudante}}</td>
                                                                <td>{{$defesas->tema}}</td>
                                                                <td>{{$defesas->curso}}</td>
                                                                <td>{{$defesas->nivel}}<br></td>
                                                                <td>
                                                                    <p>Presidente:&nbsp;{{$defesas->presidente}}</p>
                                                                    <p>Supervisor:&nbsp;{{$defesas->supervisor}}</p>
                                                                    <p>Oponente:&nbsp;{{$defesas->oponente}}</p>

                                                                </td>
                                                                <td>{{$defesas->hora}}</td>
                                                                <td>{{$defesas->sala}}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                                <div class="data-impressao">
                                                        <p>Maputo, 24 de Julho de 2023</p>
                                                </div>
                                                <div class="director-curso">
                                                    <div class="col-director-curso">
                                                        <p style="margin-bottom: 20px;">Diretor(a) do Curso</p>
                                                        <hr class="linha-3"/>
                                                        <p>(Mestre {{auth()->user()->name}})</p>
                                                    </div>
                                                    <div class="col-director-curso-1">
                                                        <p style="margin-bottom: 20px;">Chefe do Departamento Pedagógico</p>
                                                        <hr class="linha-3" />
                                                        <p>(Mestre Claúdia Ivete F. Jovo Gune)</p>
                                                    </div>
                                                </div>
                                               
                                                <!--<div class="modal-footer">
                                                <a class="btn btn-sm d-flex align-items-center btn-cancelar" href="{{ ('/defesa/index') }}" id="" type="button"><ion-icon name="close-outline"></ion-icon>&nbsp;Cancelar</a>
                                                <a class="btn btn-sm d-flex align-items-center btn-imprimir" href="/defesa/imprimi/{{$defesas->id}}" type="button"><ion-icon name="print-outline"></ion-icon>&nbsp;Imprimir</a>
                                    </div>-->
                                            </div>
                                        </div>
                                           
</body>


</html>

