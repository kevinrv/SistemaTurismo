<?php

use Illuminate\Support\Facades\Route;



Route::get('/admin', function () {
    return view('layouts/admin');
});



Route::get('/', function () {
    if (Auth::check()) {
        $pagos = DB::table('pagos as p')
            ->select('p.idpagos', 'p.Tipo', 'p.costo')
            ->get();
        $agencias = DB::table('agencias as a')
            ->join('usuario as u', 'a.idusuario', '=', 'u.idusuario')
            ->where('u.email', '=', auth()->user()->email)
            ->first();
        return view('layouts.index', ['pagos' => $pagos, 'agencias' => $agencias]);
    } else {
        $pagos = DB::table('pagos as p')
            ->select('p.idpagos', 'p.Tipo', 'p.costo')
            ->get();
        return view('layouts.index', ['pagos' => $pagos]);
    }
});

Route::get('/paypal',function(){
    return view('layouts/paypal');
});

Route::get('lugares/agencias/{id}', function ($id) {

    if (Auth::check()) {
        $agencias = DB::table('agencias as a')
            ->join('usuario as u', 'a.idusuario', '=', 'u.idusuario')
            ->where('u.email', '=', auth()->user()->email)
            ->first();

        $lugar_turistico = DB::table('lugar_turistico as l')
            ->join('provincia as p', 'l.idProvincia', '=', 'p.idProvincia')
            ->join('departamento as d', 'd.iddepartamento', '=', 'p.iddepartamento')
            ->select('l.idlugar_turistico', 'l.nombre', 'l.descripcion', 'l.imagen', 'p.nom_provincia', 'd.nom_departamento')
            ->where('l.idlugar_turistico', '=', $id)
            ->get();

        $paquete = DB::table('paquete as p')
            ->join('lugar_turistico as lt', 'p.idlugar_turistico', '=', 'lt.idlugar_turistico')
            ->join('agencias as a', 'p.idagencias', '=', 'a.idagencias')
            ->select('p.idpaquete', 'a.idagencias', 'a.nombre', 'a.direccion', 'a.descripcion', 'a.imagen', 'a.email', 'p.precio', 'p.num_persona', 'p.descuento', DB::raw('(p.precio-p.descuento) as total'))
            ->where('p.idlugar_turistico', '=', $id)
            ->get();
        return view("layouts.agencias.agencias", ["lugar_turistico" => $lugar_turistico, "paquete" => $paquete, 'agencias' => $agencias]);
    } else {
        $lugar_turistico = DB::table('lugar_turistico as l')
            ->join('provincia as p', 'l.idProvincia', '=', 'p.idProvincia')
            ->join('departamento as d', 'd.iddepartamento', '=', 'p.iddepartamento')
            ->select('l.idlugar_turistico', 'l.nombre', 'l.descripcion', 'l.imagen', 'p.nom_provincia', 'd.nom_departamento')
            ->where('l.idlugar_turistico', '=', $id)
            ->get();

        $paquete = DB::table('paquete as p')
            ->join('lugar_turistico as lt', 'p.idlugar_turistico', '=', 'lt.idlugar_turistico')
            ->join('agencias as a', 'p.idagencias', '=', 'a.idagencias')
            ->select('p.idpaquete', 'a.idagencias', 'a.nombre', 'a.direccion', 'a.descripcion', 'a.imagen', 'a.email', 'p.precio', 'p.num_persona', 'p.descuento', DB::raw('(p.precio-p.descuento) as total'))
            ->where('p.idlugar_turistico', '=', $id)
            ->get();
        return view("layouts.agencias.agencias", ["lugar_turistico" => $lugar_turistico,"paquete" => $paquete]);
    }
});
Route::resource('lugares', 'AppController');
Route::resource('provincia', 'ProvinciasController');
Route::resource('departamento', 'DepartamentoController');
Route::resource('lugar_turistico', 'Lugar_TuristicoController');
Route::resource('mantenimiento/agencias', 'AgenciasController');
Route::resource('mantenimiento/hoteles', 'HotelesController');
Route::resource('paquete/agencias', 'PaqueteController');
Route::resource('administracion', 'AdministracionController');
Route::resource('registrar', 'UsuarioController');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
