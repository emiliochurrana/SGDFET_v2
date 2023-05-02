<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\DadosController;
use App\Http\Controllers\DefesaController;
use App\Http\Controllers\GaleriaController;
use App\Http\Controllers\MonoController;
use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\UserController;
use App\Models\DadosDefesa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| api Routes
|--------------------------------------------------------------------------
|
| Here is where you can register api routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//GET

        Route::get('/', function () {
            return view('usuario.home');
        }); //rota do home page

        Route::get('/sobre', function(){
            return view('usuario.sobre');
        }); //rota para retornar a pagina sobre

        Route::get('/monografias', function(){
            return view('usuario.monografias');
        }); //rota para retornar a pagina de monografias

        Route::get('/defesas', function(){
            return view('usuario.defesas');
        }); //rota para retornar a pagina de defesas 

        Route::get('/inicio', function(){
            return view('usuario.inicio');
        })->middleware('auth'); //rota para retornar a pagina gagina inicial apos login 

        Route::get('/notificacoes', function(){
            return view('usuario.notificacoes');
        }); //rota para retornar a pagina de notificacoes  

        Route::get('/perfil', function(){
            return view('usuario.perfilestudante');
        }); //rota para retornar a pagina de perfil

        Route::get('/editperfil', function(){
            return view('usuario.editperfilestudante');
        }); //rota para retornar a pagina de defesas 

        Auth::routes();

        Route::group(['middleware' => ['auth']], function() {
            Route::get('/dashboard', function(){
                return view('admin.dashboard');
            });//rota para retornar a pagina gagina inicial apos login

            });

    //Rotas get para monografias 
            //Route::get('/monografia/{id}', [MonoController::class, 'download'])->middleware('auth'); //rota para efetuar download de monografias 
            Route::get('/monografias/index', [MonoController::class, 'index'])->name('monografiaview');//rota para trazer todas monografias cadastradas 
            Route::get('/monografia/store', [MonoController::class, 'create'])->name('newmonografia'); //rota para carregar o formulario de cadastro de monografias 
            Route::get('/monografia/edit/{id}', [MonoController::class, 'edit'])->name('editmonografia'); //rota para carregar o formulario para editar dados de uma monografia 
            Route::get('/monografia/show/{id}', [MonoController::class, 'show'])->name('showmonografia'); //rota para trazer de forma detalhada os dados de uma determinada monografia
            Route::get('/monografias/pesquisamonografias', [MonoController::class, 'pesquisaMonografias']); //rota de pesquisa de monografias na parte administrativa
    
    //Rotas get para defesas 
            Route::get('/defesa/store', [DefesaController::class, 'create'])->name('newdefesa'); //rota para carregar o formulario de cadastro de defesas
            Route::get('/defesa/index', [DefesaController::class, 'index'])->name('defesasview');
            Route::get('/defesa/edit/{id}', [DefesaController::class, 'edit'])->name('editdefesa'); //rota para carregar o formulario para editas dados da defesa
            Route::get('/defesa/show/{id}', [DefesaController::class, 'show'])->name('showdefesa'); //rota para trazer de forma detalhada os dados de uma determinada defesa 
            Route::get('/defesas/pesquisadefesa', [DefesaController::class,'pesquisa']); //rota de pesquisa de Defesas

            Route::get('/comentarios', [ComentarioController::class, 'index'])->name('comentarios');

            Route::get('/noticias', [NoticiasController::class, 'index'])->name('noticiaview');
            Route::get('/noticia/edit', [NoticiasController::class, 'edit'])->name('editnoticia');

            Route::get('/galeria', [GaleriaController::class, 'index'])->name('galeriaview');
            Route::get('/galeria/edit', [GaleriaController::class, 'edit'])->name('editgaleria');
            
        

            Route::get('/monografias/pesquisa', [MonoController::class,'pesquisa']); //rota de pesquisa de monografias
            Route::get('/defesas/pesquisa', [DefesaController::class,'pesquisa']); //rota de pesquisa de defesas
    
    
    //Rotas get para usuarios 
        Route::get('/estudante/create', [UserController::class,'createEstudante'])->name('newestudante');  //rota para carregar o formulario de cadastro de estudante
        Route::get('/docente/create', [UserController::class,'createDocente'])->name('newdocente'); //rota para carregar o formulario de cadastro de docente 
        Route::get('/usuario/estudantes', [UserController::class,'indexEstudantes'])->name('estudanteview'); //rota para listar todos estudantes 
        Route::get('/usuario/docentes', [UserController::class,'indexDocentes'])->name('docenteview'); //rota para listar todos docentes 
        Route::get('/usuario/editarestudante/{id}', [UserController::class,'editEstudante'])->name('editestudante'); //rota para carregar o formulario para editar dados do estudante 
        Route::get('/usuario/editardocente/{id}', [UserController::class,'editDocente'])->name('editdocente'); //rota para carregar o formulario para editar dados do docente
        Route::get('/usuario/perfirlestudante{id}', [UserController::class, 'perfilEstudante']);//rota para carregar perfil do estudante
        Route::get('/usuario/perfildocente/{id}', [UserController::class, 'perfilDocente']);//rota para carregar dados do estudante
        Route::get('/usuario/editperfilestudante{id}', [UserController::class, 'editPerfilEstudante'])->name('editperfilestudante');//rota para carregar o formulario de edicao dos dados do perfil do estudante
        Route::get('/usuario/editperfildocente{id}', [UserController::class, 'editPerfilDocente'])->name('editperfildocente'); //rota para carregar o formulario de dicao dos dados do perfil do docente
        Route::get('/usuario/showdocente/{id}', [UserController::class, 'showDocente'])->name('showdocente');
        Route::get('/usuario/showestudante/{id}', [UserController::class, 'showEstudante'])->name('showestudante');
        Route::get('/usuario/create', [UserController::class, 'createDrcurso'])->name('newdrcurso');
        Route::get('/usuario/drcursos', [UserController::class, 'indexDrcurso'])->name('drcursoview');
        Route::get('/usuario/showdrcurso/{id}', [UserController::class, 'showDrcurso'])->name('showdrcurso');
        Route::get('/usuario/editdrcurso/{id}', [UserController::class, 'editDrcurso'])->name('editdrcurso');
        Route::get('/usuario/editperfildrcurso/{id}', [UserController::class, 'editPerfilDrcurso'])->name('editperfildrcurso');
    //Rotas get para login 
        Route::get('/login', [AuthController::class, 'create']); //rota para carregar a tela de login
        Route::get('/usuario/login', [AuthController::class, 'login']); //rota para efectuar o login/iniciar sessao
        Route::get('/usuario/logout', [AuthController::class, 'logout']); //rota para logout/terminar sessao

//POST
    //Rotas post para usuarios 
        Route::post('/usuario/estudante', [UserController::class,'storeEstudante']); //rota para envio dos dados de cadastro do estudante na base de dados 
        Route::post('/usuario/docente', [UserController::class,'storeDocente']); //rota para envio dos dados de cadastro do docente na base de dados 
        Route::post('/usuario/drcurso', [UserController::class,'storeDrcurso']); //rota para envio dos dados de cadastro do drcurso na base de dados 
        
    //Rotas post para monografias     
        Route::post('/monografia', [MonoController::class,'store']); //rota de envio de dados de cadastro da monografia na base de dados 
    
    //Rotas post para defesas 
        Route::post('/defesa', [DefesaController::class, 'store']); //rota de envio de dados de cadastro da defesa na base de dados 
        
    //Rotas post para dados 
        Route::post('/dados', [DadosController::class, 'store']); //rota de envio de dados necessarios para o cadastro da defesa do estudante 
        
    //Rotas post para administrador 
        Route::post('/admin', [UserController::class, 'storeAdmin']);//rota para envio dos dasdos de cadastro do administrador do sistema 

        
//PUT/PUTCH
        Route::put('/usuario/updatestudante/{id}', [UserController::class, 'updateEstudante'])->name('updatestudante')->middleware('auth'); //rota para actualizacao de dados do estudante
        Route::put('/usuario/updatedocente/{id}', [UserController::class, 'updateDocente'])->name('updatedocente')->middleware('auth'); //rota para actualizar dados do docente
        Route::put('/usuario/updatedrcurso/{id}', [UserController::class, 'updateDrcurso'])->name('updatedrcurso')->middleware('auth'); //rota para actualizar dados do drcurso
        Route::put('/usuario/updateperfilestudante/{id}', [UserController::class, 'updatePerfilEstudante'])->name('updateperfilestudante');//rota para actualizacao dos dados do perfil do estudante
        Route::put('/usuario/updateperfildocente/{id}', [UserController::class, 'updatePerfilDocente'])->name('updateperfildocente');//rota para actualizacao dos dados do perfil do docente
        Route::put('/usuario/updateperfildrcurso/{id}', [UserController::class, 'updatePerfilDrcurso'])->name('updateperfildrcurso');//rota para actualizacao dos dados do perfil do drcurso
        Route::put('/defesa/update/{id}', [DefesaController::class, 'update'])->name('updatedefesa')->middleware('auth'); //rota para actualizacao de dados da defesa 
        Route::put('/monografia/update/{id}', [DefesaController::class, 'update'])->name('updatemonografia')->middleware('auth'); //rota para actualizacao de dados de uma monografia 
        Route::put('/noticia/update{id}', [NoticiasController::class, 'update'])->name('updatenoticia');//rota para actualizar dados de uma noticia 
        Route::put('/galeria/update{id}', [GaleriaController::class, 'update'])->name('updategaleria');//rota para actualizar dados de uma galeria

//DELETE
    Route::delete('/usuario/deletestudante/{id}', [UserController::class, 'destroyEstudante'])->middleware('auth');//rota para eliminar um estudante 
    Route::delete('/usuario/deletedocente/{id}', [UserController::class, 'destroyDocente'])->middleware('auth'); //rota para eliminar um docente 
    Route::delete('/usuario/deletedrcurso/{id}', [UserController::class, 'destroyDrcurso'])->middleware('auth'); //rota para eliminar um docente 
    Route::delete('/monografia/delete/{id}', [MonoController::class, 'destroy'])->middleware('auth');//rota para eliminar uma monografia 
    Route::delete('/defesa/delete/{id}', [DefesaController::class, 'destroy'])->middleware('auth');//rota para eliminar uma defesa 
    Route::delete('/dados/delete/{id}', [DadosDefesa::class, 'destroy'])->middleware('auth');//rota para eliminar dados de defesa eviados pelo estudante 
