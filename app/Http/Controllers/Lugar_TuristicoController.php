<?php

namespace sisTurismo\Http\Controllers;

use Illuminate\Http\Request;

use sisTurismo\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisTurismo\Lugar_Turistico;
use sisTurismo\Http\Requests\Lugar_TuristicoFormRequest;
use DB;

class Lugar_TuristicoController extends Controller
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
            $lugar_turistico=DB::table('lugar_turistico as l')
            ->join('provincia as p', 'l.idProvincia','=','p.idProvincia')
            ->join('departamento as d', 'd.iddepartamento','=','p.iddepartamento')
            ->select('l.idlugar_turistico','l.nombre','l.descripcion','l.imagen','p.nom_provincia','d.nom_departamento')
            ->where('l.nombre','LIKE','%'.$query.'%')
            ->orwhere('p.nom_provincia','LIKE','%'.$query.'%')
            ->orwhere('d.nom_departamento','LIKE','%'.$query.'%')
            ->orderBy('l.idlugar_turistico','desc')
            ->get();
            return view('lugar_turistico.index',["lugar_turistico"=>$lugar_turistico,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provincia=DB::table('provincia')
        ->get();
        return view("lugar_turistico.create",["provincia"=>$provincia]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Lugar_TuristicoFormRequest $request)
    {
        $lugar_turistico=new Lugar_Turistico;
        $lugar_turistico->nombre=$request->get('nombre');
        $lugar_turistico->descripcion=$request->get('descripcion');
        if (Input::hasFile('imagen')) {
            $file=Input::file('imagen');
            $file->move(public_path().'\imagenes',$file->getClientOriginalName());
            $lugar_turistico->imagen=$file->getClientOriginalName();
        }
        $lugar_turistico->idprovincia=$request->get('provincia');
        $lugar_turistico->save();
        return Redirect::to('lugar_turistico');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("lugar_turistico.show",["lugar_turistico"=>Lugar_Turistico::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lugar_turistico=Lugar_Turistico::findOrFail($id);
        $provincia=DB::table('provincia')
        ->get();
        return view("lugar_turistico.edit",["lugar_turistico"=>$lugar_turistico,"provincia"=>$provincia]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Lugar_TuristicoFormRequest $request, $id)
    {
        $lugar_turistico=Lugar_Turistico::findOrFail($id);
        $lugar_turistico->nombre=$request->get('nombre');
        $lugar_turistico->descripcion=$request->get('descripcion');
        if (Input::hasFile('imagen')) {
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes',$file->getClientOriginalName());
            $lugar_turistico->imagen=$file->getClientOriginalName();
        }
        $lugar_turistico->idprovincia=$request->get('provincia');
        $lugar_turistico->update();
        return Redirect::to('lugar_turistico');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lugar_turistico=Lugar_Turistico::findOrFail($id);
        $lugar_turistico->delete();
        return Redirect::to('lugar_turistico');
    }
}
