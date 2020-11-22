<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/front',function (){
    return view('superencuesta');
});

Route::get('/', 'HomeController@inicio');
Route::get('/home', 'HomeController@index');
//Route::get('/proyectos', 'HomeController@proyectos');
Route::post('/logincoop', 'HomeController@logincoop');

Route::get('/coop', [
    'middleware' => 'basic.filtro',
    'uses' =>'CoopController@index'
]);
Route::get('/proyectos', 'ProyectoController@index'); //


Route::get('/proyectos/programas', [
    'middleware' => 'basic.filtro',
    'uses' => 'ProyectoController@Programas'
]);


Route::get('/proyectos/rep/fecha/{id_coop?}', [
    'middleware' => 'basic.filtro',
    'uses' => 'ProyectoController@repFecha'
]);



/*
Route::get('/proyectos/reporte', [
    'middleware' => 'basic.filtro',
    'uses' => 'ProyectoController@indexRep'
]);*/

Route::get('/reporte/fecha/{fecha}', [
    'middleware' => 'basic.filtro',
    'uses' => 'ProyectoController@reporteFecha'
]);


Route::get('/encuesta', [
    'middleware' => 'basic.filtro',
    'uses' =>'EncuestaController@index'
]);
Route::post('/AddEncuesta', [
    'middleware' => 'basic.filtro',
    'uses' =>'EncuestaController@AdicionarEncuesta'
]);

Route::post('/addCondMat', [
    'middleware' => 'basic.filtro',
    'uses' => 'CoopController@addCondMat'
]);
Route::post('/editCondMat/{id}', [
    'middleware' => 'basic.filtro',
    'uses' => 'CoopController@editCondMat'
]);
Route::post('/deleteCondMat', [
    'middleware' => 'basic.filtro',
    'uses' => 'CoopController@deleteCondMat'
]);
Route::get('/buscacondmat/{id}',[
    'middleware' => 'basic.filtro',
    'uses' =>'CoopController@buscarCondMat'
]);

/*
Route::post('/AddProyecto', [
    'middleware' => 'basic.filtro',
    'uses' => 'ProyectoController@AdicionarProyecto'
]);*/
Route::auth();
/*Route::post('/log',[
    'uses' => 'LogController@authenticate'
]);*/

Route::get('/AddPrograma', [
    'middleware' => 'basic.filtro',
    'uses' => 'AddPrograma@AddPrograma'

]);
Route::post('/proyectos/create','AddPrograma@create');

//Route::get('/EditPrograma/{id}/{error?}', 'EditPrograma@EditPrograma')->name('editarprograma');
Route::get('/EditPrograma/{id}/{error?}', [
    'middleware' => 'user.avanz',
    'uses' => 'EditPrograma@EditPrograma'
])->name('editarprograma');

Route::post('/proyectos/edit',[
    'middleware' => 'user.avanz',
    'uses' => 'EditPrograma@edit'
]);
Route::post('/Eliminar', [
    'middleware' => 'basic.filtro',
    'uses' =>'EditPrograma@eliminar'
])-> name('Eliminar');

Route::get('/Meta/{id}', [
    'middleware' => 'user.avanz',
    'uses' =>'MetaController@index'

]);
Route::get('/AddMeta/{id}',[
    'middleware' => 'user.avanz',
    'uses' =>  'MetaController@AddMeta'
]);
Route::post('/metas/create',[
    'middleware' => 'user.avanz',
    'uses' => 'MetaController@create'
]);

Route::get('/EditMeta/{id}', [
    'middleware' => 'user.avanz',
    'uses' => 'MetaController@EditMeta'
]);
Route::post('/meta/edit',[
    'middleware' => 'basic.filtro',
    'uses' => 'MetaController@edit'
]);
Route::post('/EliminarM', [
    'middleware' => 'basic.filtro',
    'uses' =>'MetaController@eliminar'
])-> name('EliminarM');

Route::post('/Eliminar3', 'EncuestaController@eliminar')-> name('Eliminar3');
Route::post('/editencuesta', 'EncuestaController@editencuesta');

Route::get('/VarI', [
    'middleware' => 'user.avanz',
    'uses' => 'VarIController@index'
]);
Route::get('/VarII', [
    'middleware' => 'user.avanz',
    'uses' => 'VarIIController@index'
]);
Route::get('/VarIII', [
    'middleware' => 'user.avanz',
    'uses' => 'VarIIIController@index'
]);

Route::get('/VarIV', [
    'middleware' => 'user.avanz',
    'uses' => 'VarIVController@index'
]);

Route::get('/VarIV/modAI/{id_ano}', [
    'middleware' => 'user.avanz',
    'uses' => 'VarIVController@editarAI'
]);


Route::post('/VarIV/addAutIndp', [
    'middleware' => 'user.avanz',
    'uses' => 'VarIVController@addAutIndp'
]);

Route::post('/VarIV/actAutIndp/{id_aut}', [
    'middleware' => 'user.avanz',
    'uses' => 'VarIVController@actAutIndp'
]);


Route::get('/VarV', [
    'middleware' => 'user.avanz',
    'uses' => 'VarVController@index'
]);

Route::get('/VarV/nuevo/{id_ano}', [
    'middleware' => 'user.avanz',
    'uses' => 'VarVController@nuevoEFI'
]);


Route::post('/VarV/addEFI/', [

   'middleware' => 'user.avanz',
    'uses' => 'VarVController@addEFI'
]);

Route::get('VarV/edit/{id_efi}', [
    'middleware' => 'user.avanz',
    'uses' => 'VarVController@editEFI'
]);

Route::post('/VarV/actEFI/{id_efi}', [

    'middleware' => 'user.avanz',
    'uses' => 'VarVController@actEFI'
]);

//COPERACION ENTRE COOPERATIVAS

Route::get('/VarVI',[
    'middleware' => 'user.avanz',
    'uses' => 'VarVIController@index'

]);

Route::get('/VarVI/modCC/{id_anocc}', [
    'middleware' => 'user.avanz',
    'uses' => 'VarVIController@modCC'
]);

Route::post('/VarVI/actOpF/{idcc}/{idint}',[
    'middleware' => 'user.avanz',
    'uses' => 'VarVIController@actOpFinCoop'

]);

Route::post('/VarVI/addOpF/',[
    'middleware' => 'user.avanz',
    'uses' => 'VarVIController@addOpFinCoop'

]);

//Interes por la comunidad
Route::get('/VarVII',[
    'middleware' => 'user.avanz',
    'uses' => 'VarVIIController@index'

]);

Route::get('/VarVII/modCom/{id_ano}', [
    'middleware' => 'user.avanz',
    'uses' => 'VarVIIController@modComunidad'
]);


Route::post('/VarVII/actCom/{idom}',[
    'middleware' => 'user.avanz',
    'uses' => 'VarVIIController@actComunidad'

]);

Route::post('/VarVII/addCom',[
    'middleware' => 'user.avanz',
    'uses' => 'VarVIIController@addComunidad'

]);



///InfoEducFormInf/


Route::get('/preguntas/{id}', 'EncuestaController@Preg');
Route::post('/addPreg/{id}',  'EncuestaController@AdicionarPreguntas');
Route::post('/editpreg', 'EncuestaController@editpreg');

Route::post('/AddPreguntas', 'EncuestaController@AdicionarPreguntas');
Route::post('/Eliminar4', 'EncuestaController@eliminarpreg')-> name('Eliminar4');

Route::get('/mostrar', 'MostrarController@index');

Route::get('/InfoMemb/{id}', [
    'middleware' => 'basic.filtro',
    'uses' =>'InfoMembController@index'
]);

//Indexfed para los usuarios federativos
Route::get('/InfoMembFed', [
    'middleware' => 'basic.filtro',
    'uses' =>'InfoMembController@indexFed'
]);
Route::get('/InfoControlFed', [
     'middleware' => 'basic.filtro',
    'uses' =>'InfoControlController@indexFed'
]);

Route::get('/InfoPartEconmFed', [
    'middleware' => 'basic.filtro',
    'uses' =>'InfoPartiController@indexFed'
]);

Route::get('/InfoAutoIndFed', [
    'middleware' => 'basic.filtro',
    'uses' =>'InfoAutonomController@indexFed'
]);



Route::get('/InfoEfiFed', [
    'middleware' => 'basic.filtro',
    'uses' =>'InfoEducFormInfController@indexFed'
]);

Route::get('/InfoCoopCoop', [
    'middleware' => 'basic.filtro',
    'uses' =>'InfoCoopController@indexFed'
]);
Route::get('/InfoIntcoopFed', [
    'middleware' => 'basic.filtro',
    'uses' =>'InfoIntComController@indexFed'
]);


Route::get('/InfoControl/{id}', [
    'middleware' => 'basic.filtro',
    'uses'=>'InfoControlController@index'
]);
Route::get('/InfoParticip/{id}', [
    'middleware' => 'basic.filtro',
    'uses' => 'InfoPartiController@index'
]);


Route::get('//InfoEducFormInf/{id}', [
    'middleware' => 'basic.filtro',
    'uses' => 'InfoEducFormInfController@index'
]);

Route::get('/InfoParticip/{id}', [
    'middleware' => 'basic.filtro',
    'uses' => 'InfoPartiController@index'
]);




Route::get('/InfoAutonom/{id}', [
    'middleware' => 'basic.filtro',
    'uses' => 'InfoAutonomController@index'
]);

Route::get('/InfoCoopCoop/{id}', [
    'middleware' => 'basic.filtro',
    'uses' => 'InfoCoopController@index'
]);
Route::get('/InfoIntCom/{id}', [
    'middleware' => 'basic.filtro',
    'uses' => 'InfoIntComController@index'
]);


//Route::get('/InfoParticipacion/', 'InfoPartiController@index1');
Route::get('/DispPresup/{idano}/{idcoop}',[
    'middleware' => 'basic.filtro',
    'uses' =>'CoopController@presup_Disp'
]);

Route::post('/addPE', [
    'middleware' => 'user.avanz',
    'uses' => 'VarIIIController@AddPartic'
]);
Route::post('/addMembresia', [
    'middleware' => 'user.avanz',
    'uses' => 'VarIController@AddMemb'
]);
Route::post('/actMembresia/{id_asoc}/{id_ib}/{id_nee}/{id_eca}/{id_cea}/{id_taa}/{id_rasoc}/{id_sol}/{id_rot}/{id_catopa}/{id_emp}',[
    'middleware' => 'user.avanz',
    'uses' => 'VarIController@ActMemb'
]);
Route::post('/addControl', [
    'middleware' => 'user.avanz',
    'uses'=>'VarIIController@guardar'
]);

Route::post('actControldemo/{id_caa}/{id_est}/{id_part}/{id_eq}',[
    'middleware' => 'user.avanz',
    'uses' => 'VarIIController@ActControlDem'
]);
Route::post('/actPe/{id_pe}',[
    'middleware' => 'user.avanz',
    'uses' => 'VarIIIController@ActPartEcon'
]);


Route::get('/modMembresia/{id}',[
    'middleware' => 'user.avanz',
    'uses' => 'VarIController@ModMemb'
]);
Route::get('/modPE/{id}',[
    'middleware' => 'user.avanz',
    'uses' =>'VarIIIController@ModPE'
]);

Route::get('/controlDemo/{id}',[
    'middleware' => 'user.avanz',
    'uses' => 'VarIIController@modControldemo'
]);


Route::get('/estadisticaEnc', 'estadisticaEncController@index');


Route::get('/seguimiento/meta/{idmet}','MetaController@Seguimientos');
Route::post('/insertar','MetaController@InsertarSeg');
Route::post('/act/seg/{idseg}','MetaController@ActSeguimiento');
Route::post('/eliminarseg/{idmet}','MetaController@EliminarUltSeg');

Route::get('/fed/report/total',[
    'uses'=>'ProyectoController@repacttotal',
    'as'=>'acttotal'

]);

//encuentas
Route::get('/encuestastatic',[
    /*'middleware' => 'basic.filtro',*/
    'uses' => 'EncuestaticController@index'
])->name('Encuesta');
Route::get('/encuestastatic2',[
   /* 'middleware' => 'basic.filtro',*/
    'uses' => 'EncuestaticController@index2'
])->name('Encuesta2');
Route::post('/insertar/encuesta',[
   /* 'middleware' => 'basic.filtro',*/
    'uses' => 'EncuestaticController@store'
]);
//Route::post('/insertar/encuesta2','EncuestaticController@store');


Route::get('/tabular/real',[
    'middleware' => 'basic.filtro',
    'uses' =>'EncuestaticController@tabFecha'
]);
Route::get('/tabular',[
    'middleware' => 'basic.filtro',
    'uses' =>'EncuestaticController@tabular_encuesta'
]);


Route::get('/balance/prog/{ind?}',[
    'middleware' => 'basic.filtro',
    'uses' => 'BalancProg@index',
    'as' => 'preparar.balance'

]);
Route::get('/balance/act/prog',[
    'middleware' => 'basic.filtro',
    'uses' => 'BalancProg@indice',
    'as' => 'preparar.balanceseg'

]);
Route::get('/balance/seg/act',[
    'middleware' => 'basic.filtro',
    'uses' => 'BalancProg@indiceSeg',
    'as' => 'preparar.balanceact'

]);


Route::get('/generar/balance/fed',[
    'middleware' => 'basic.filtro',
    'uses' => 'BalancProg@showBalanFed'

]);


Route::get('/balance/federativo/total',[

    'middleware' => 'basic.filtro',
    'uses' =>  'BalancProg@balanceTotal',
    'as' => 'generar.balance.balanceTotal'

]);
Route::get('/generar/{ano}/{id_coop?}/{ind?}',[

    'middleware' => 'basic.filtro',
    'uses' =>  'BalancProg@show',
    'as' => 'generar.balance.show'

]);
Route::get('/act/{ano}/{id_coop?}',[
    'middleware' => 'basic.filtro',
    'uses' =>  'BalancProg@show_act',
    'as' => 'generar.balanceact'

]);
Route::get('/seg/{ano}/{id_coop?}',[
    'middleware' => 'basic.filtro',
    'uses' =>  'BalancProg@show_actseg',
    'as' => 'generar.balanceactseg'

]);
Route::get('/main',[
    'middleware' => 'basic.filtro',
    'uses' =>  'MainController@controlador_principal',
    'as' => 'admin.vista'

]);

Route::get('/panel',function (){
    return view('panel');
});
///Moudlo de usuarios

Route::get('/users',function (){
    return view('users.users');
});

Route::post('/Nuevo/Usuario',[

    //'middleware' => 'basic.filtro',
    'uses' =>'UserController@store',
    'as' => 'users.nuevouser'
]);

Route::post('/Edit/User/{id}',[
    'uses' =>'UserController@editUser',
    'as' => 'users.edituser'
]);
Route::post('/Delete/User/{id}',[
    'uses' => 'UserController@deleteUser',
    'as' => 'users.deluser'
]);

Route::get('/get/user/{id}',[
    'uses' => 'UserController@getUser',
    'as' => 'user.getuser'
]);

Route::get('/logout',[
    'uses' => 'UserController@logout',
    'as' => 'user.logout'
]);


Route::get('/registerinv/nuevo',[
    'uses' => 'UserController@registerUser',
    'as' => 'user.registerinv'
]);
Route::get('/registerinv',[
    'uses' => 'UserController@userCoop',
    'as' => 'user.reguser'
]);




Route::get('/federacion/ind',[
    'middleware' => 'basic.filtro',
    'uses' => 'FedController@indexInd',
    'as' => 'fed.indexind'
]);
Route::get('/federacion/gestdemo',[
    'middleware' => 'basic.filtro',
    'uses' => 'FedController@indexGestdemo',
    'as' => 'fed.indexdemo'
]);

Route::get('/federacion/partecon',[
    'middleware' => 'basic.filtro',
    'uses' => 'FedController@indexPartecon',
    'as' => 'fed.indexindpart'
]);

Route::get('/federacion/autoind',[
    'middleware' => 'basic.filtro',
    'uses' => 'FedController@indexAutoind',
    'as' => 'fed.indexindaut'
]);


Route::get('/federacion/educforminf',[
    'middleware' => 'basic.filtro',
    'uses' => 'FedController@indexEduFormInf',
    'as' => 'fed.indexindaut'
]);
Route::get('/federacion/coopcoop',[
    'middleware' => 'basic.filtro',
    'uses' => 'FedController@indexCoopCop',
    'as' => 'fed.indexindaut'
]);


Route::get('/federacion/intcoop',[
    'middleware' => 'basic.filtro',
    'uses' => 'FedController@indexIntCoop',
    'as' => 'fed.indexindaut'
]);

Route::get('/federacion/reporte/',[
    'middleware' => 'basic.filtro',
    'uses' => 'FedController@repFecha',
    'as' => 'fed.indexfech'
]);

Route::get('/federacion/balances/{ind?}',[
    'middleware' => 'basic.filtro',
    'uses' => 'FedController@indexBalance',
    'as' => 'fed.indexind'
]);
Route::get('/federacion/balances/coop/total',[
    'middleware' => 'basic.filtro',
    'uses' => 'FedController@coopBalance',
]);

Route::get('/cooperativa',[
    'middleware' => 'basic.filtro',
    'uses' => 'CooperativaController@show',
    'as' => 'show.coop'
]);

Route::get('/cooperativa/editar',[
    'middleware' => 'basic.filtro',
    'uses' => 'CooperativaController@edit',
    'as' => 'edit.coop'
]);

Route::post('cooperativa/update',[
    'middleware' => 'basic.filtro',

    'uses' => 'CooperativaController@update',

]);

Route::get('miperfil',[
    'middleware' => 'basic.filtro',
    'uses' => 'UserController@miPerfil',
    'as' => 'user.perfil'

]);


Route::get('/userpefil/editar',[
    'middleware' => 'basic.filtro',
    'uses' => 'UserController@edit',
    'as' => 'useredit.perfil'
]);


Route::post('/miperfil/update',[
    'middleware' => 'basic.filtro',
    'uses' => 'UserController@update',
    'as' => 'userupdate.perfil'
]);

Route::get('/cambiarclave/{contra?}',[
    'middleware' => 'basic.filtro',
    'uses' => 'UserController@claveShow'

] );

Route::post('/cambiar/clave/segura' , [
    'middleware' => 'basic.filtro',
    'uses' => 'UserController@claveCambio'

]);


Route::get('/accesos/privilegios/{iduser}',[
    'middleware' => 'basic.filtro',
    'uses' => 'PrivilegioController@privilegios'

]);

Route::post('/insertar/accesos/{iduser}',[
    'middleware' => 'basic.filtro',
    'uses' => 'PrivilegioController@insertarAccesos'

]);


///cooperativa
///
Route::get('/Lista/Cooperativas',[
    'middleware' => 'basic.filtro',
    'uses' =>'CooperativaController@index',
    'as' => 'coop.listar'
]);


Route::post('/Nueva/Cooperativa',[
    'middleware' => 'basic.filtro',
    'uses' =>'CooperativaController@store',
    'as' => 'coop.store'
]);

Route::post('/Edit/Cooperativa/{id}',[
    'uses' =>'CooperativaController@editCooperativa',
    'as' => 'coop.edit'
]);
Route::post('/Delete/Cooperativa/{id}',[
    'uses' => 'CooperativaController@deleteCooperativa',
    'as' => 'coop.delete'
]);

Route::get('/get/cooperativa/{id}',[
    'uses' => 'CooperativaController@getCooperativa',
    'as' => 'coop.getcoop'
]);

Route::get('/coop/indicad/{idcoop}/{indicad}',[

    'uses'=>'FedController@coopAnos'
]);

//Rutas para descargar en pdf
Route::get('/descargar-balance/{id}/{id_coop?}/{ind?}', 'BalancProg@pdf')->name('balance.pdf');

Route::get('/descargar-balanceact/act/{id}/{id_coop?}', 'BalancProg@pdf_act')->name('balance_act.pdf');
Route::get('/descargar-balanceseg/seg/{id}/{id_coop?}', 'BalancProg@pdf_actseg')->name('balance_actseg.pdf');


Route::get('/descargar-balancetotal/{id}', 'BalancProg@pdf_total')->name('balanceTotal.pdf');