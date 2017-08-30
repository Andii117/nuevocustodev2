<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/home', 'HomeController@index');
Route::get('/','HomeController@iniciosession');
Route::post('login','HomeController@login')->name('home.login');
Route::get('logout','HomeController@logout')->name('home.logout');

Route::resource('usuarios','UsuariosController',['except' => ['show','destroy']]);

Route::resource('funcionarios','FuncionariosController');
Route::get('funcionarios/horario/{funcionario_id}','FuncionariosController@horario')->name('funcionarios.horario');
Route::resource('puertas','PuertasController');
Route::resource('controlareas','ControllerControlAreas');

Route::resource('secciones','SeccionesController',['except' => ['show','destroy']]);

Route::resource('cargos','CargosController',['only' => ['update','edit']]);
Route::get('cargos/create/{seccion_id}', 'CargosController@create')->name('cargos.create');
Route::post('cargos/{seccion_id}', 'CargosController@store')->name('cargos.store');

Route::resource('invitados','InvitadosController',['except' => ['show','destroy']]);

Route::resource('invitados','InvitadosController',['except' => ['show','destroy']]);

Route::resource('licencias','LicenciasController',['except' => ['show','destroy','create','store']]);
Route::get('licencias/create/{funcionario_id}','LicenciasController@create')->name('licencias.create');
Route::post('licencias/{funcionario_id}','LicenciasController@store')->name('licencias.store');


Route::resource('IntervalosInvitados','IntervalosInvitadosController',['only' => ['show','destroy']]);
Route::get('IntervalosInvitados/create/{invitado_id}', 'IntervalosInvitadosController@create')->name('IntervalosInvitados.create');
Route::post('IntervalosInvitados/{invitado_id}', 'IntervalosInvitadosController@store')->name('IntervalosInvitados.store');

Route::resource('IntervalosFuncionarios','IntervalosFuncionariosController',['only' => ['show','destroy']]);
Route::get('IntervalosFuncionarios/create/{funcionario_id}', 'IntervalosFuncionariosController@create')->name('IntervalosFuncionarios.create');
Route::post('IntervalosFuncionarios/{funcionario_id}', 'IntervalosFuncionariosController@store')->name('IntervalosFuncionarios.store');

Route::get('errores','ErroresController@error404')->name('errores.error404');

Route::resource('GestionAreas','GestionAreasController');
Route::get('area/{user_id}','GestionAreasController@controlareas');

Route::get('Estadisticas','EstadisticasController@index');

Route::get('Reportes','ReportesController@index');

Route::resource('horariogeneral','HorariosGeneralesController',['only' => ['index','create','store','destroy']]);

Route::get('/funcionarios-lista',function ()
{
    $Funcionarios= \App\Funcionario::select(['id','nombre','apellido','cedula','correo','tarjeta_rfid','licencia']);
    return \Datatables::of($Funcionarios)
        ->addColumn('action', function ($Funcionario) {
            $aciones ="";

            if ($Funcionario->licencia==0)
            {
                $aciones ="<div class='btn btn-group'>";
                $aciones =$aciones.'<a href="/funcionarios/'.$Funcionario->id.'/edit" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> Editar</a>';
                $aciones = $aciones.'<a href="/funcionarios/horarios/'.$Funcionario->id.'" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> Horario</a>';
                $aciones = $aciones.'<a href="licencias/create/" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> Licencias</a>';
                $aciones =$aciones."</div>";

            }else
                {
                    $aciones ="<div class='btn btn-group'>";
                    $aciones =$aciones.'<a href="/funcionarios/'.$Funcionario->id.'/edit" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> Editar</a>';
                    $aciones = $aciones.'<a href="/funcionarios/horarios/'.$Funcionario->id.'" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> Horario</a>';
                    $aciones = $aciones.'<a href="licencias/create/'.$Funcionario->id.'" class="btn btn-info"><i class="glyphicon glyphicon-edit"></i> Licencias</a>';
                    $aciones =$aciones."</div>";
                }
            return $aciones;
        })
        ->make(true);
});
