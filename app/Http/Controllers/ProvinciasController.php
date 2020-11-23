<?php

namespace sisTurismo\Http\Controllers;

use sisTurismo\Provincia;
use Illuminate\Http\Request;
use sisTurismo\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;
use sisTurismo\Http\Requests\ProvinciaFormRequest;

class ProvinciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) {
            $query=trim($request->get('searchText'));
            $provincia=DB::table('provincia as p')
            ->join('departamento as d','p.iddepartamento','=','d.iddepartamento')
            ->select('p.idprovincia','p.nom_provincia','d.nom_departamento')
            ->where('p.nom_provincia','LIKE','%'.$query.'%')
            ->orwhere('d.nom_departamento','LIKE','%'.$query.'%')
            ->orderBy('p.idprovincia','desc')
            ->get();
            return view('provincia.index',["provincia"=>$provincia,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamento=DB::table('departamento')
        ->get();
        return view("provincia.create",["departamento"=>$departamento]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProvinciaFormRequest $request)
    {   
        $provincia=new Provincia;
        $provincia->nom_provincia=$request->get('nombre_provincia');
        $provincia->iddepartamento=$request->get('departamento');
        $provincia->save();
        return Redirect::to('provincia');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("provincia.show",["provincia"=>Provincia::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provincia=Provincia::findOrFail($id);
        $departamento=DB::table('departamento')
        ->get();
        return view("provincia.edit",["provincia"=>$provincia,"departamento"=>$departamento]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProvinciaFormRequest $request, $id)
    {
        $provincia=Provincia::findOrFail($id);
        $provincia->iddepartamento=$request->get('departamento');
        $provincia->nom_provincia=$request->get('nombre_provincia');
        $provincia->update();
        return Redirect::to('/provincia');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $provincia=Provincia::findOrFail($id);
        $provincia->delete();
        return Redirect::to('/provincia');
    }
}
