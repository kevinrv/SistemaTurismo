<?php

namespace sisTurismo\Http\Controllers;

use Illuminate\Http\Request;

use sisTurismo\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisTurismo\Lugar_Turistico;
use sisTurismo\Http\Requests\Lugar_TuristicoFormRequest;
use DB;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::check()) {
            if ($request) {
                $query = trim($request->get('searchText'));
                $lugar_turistico = DB::table('lugar_turistico as l')
                    ->join('provincia as p', 'l.idProvincia', '=', 'p.idProvincia')
                    ->join('departamento as d', 'd.iddepartamento', '=', 'p.iddepartamento')
                    ->select('l.idlugar_turistico', 'l.nombre', 'l.descripcion', 'l.imagen', 'p.nom_provincia', 'd.nom_departamento')
                    ->where('l.nombre', 'LIKE', '%' . $query . '%')
                    ->orwhere('p.nom_provincia', 'LIKE', '%' . $query . '%')
                    ->orwhere('d.nom_departamento', 'LIKE', '%' . $query . '%')
                    ->get();
                $agencias = DB::table('agencias as a')
                    ->join('usuario as u', 'a.idusuario', '=', 'u.idusuario')
                    ->where('u.email', '=', auth()->user()->email)
                    ->first();
                return view('layouts.lugares.lugares', ["lugar_turistico" => $lugar_turistico, 'agencias' => $agencias, "searchText" => $query]);
            }
        } else {
            if ($request) {
                $query = trim($request->get('searchText'));
                $lugar_turistico = DB::table('lugar_turistico as l')
                    ->join('provincia as p', 'l.idProvincia', '=', 'p.idProvincia')
                    ->join('departamento as d', 'd.iddepartamento', '=', 'p.iddepartamento')
                    ->select('l.idlugar_turistico', 'l.nombre', 'l.descripcion', 'l.imagen', 'p.nom_provincia', 'd.nom_departamento')
                    ->where('l.nombre', 'LIKE', '%' . $query . '%')
                    ->orwhere('p.nom_provincia', 'LIKE', '%' . $query . '%')
                    ->orwhere('d.nom_departamento', 'LIKE', '%' . $query . '%')
                    ->get();
                return view('layouts.lugares.lugares', ["lugar_turistico" => $lugar_turistico, "searchText" => $query]);
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
