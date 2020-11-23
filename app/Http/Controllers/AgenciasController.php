<?php

namespace sisTurismo\Http\Controllers;

use Illuminate\Http\Request;

use sisTurismo\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;
use sisTurismo\Http\Requests\AgenciasFormRequest;
use sisTurismo\Agencias;

class AgenciasController extends Controller
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
            $agencias=DB::table('agencias')
            ->where('nombre','like','%'.$query.'%')
            ->orderBy('idagencias','desc')
            ->get();
        return view('mantenimiento.agencias.index',["agencias"=>$agencias,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mantenimiento.agencias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AgenciasFormRequest $request)
    {
        $agencias=new Agencias;
        $agencias->nombre=$request->get('nombre');
        $agencias->direccion=$request->get('direccion');
        $agencias->descripcion=$request->get('descripcion');
        if (Input::hasFile('imagen')) {
            $file=Input::file('imagen');
            $file->move(public_path().'\imagenes',$file->getClientOriginalName());
            $agencias->imagen=$file->getClientOriginalName();
        };
        $agencias->email=$request->get('email');
        $agencias->save();
        return Redirect::to('mantenimiento/agencias');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("mantenimiento.agencias.show",["agencias"=>Agencias::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("mantenimiento.agencias.edit",["agencias"=>Agencias::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AgenciasFormRequest $request, $id)
    {
        $agencias=Agencias::findOrFail($id);
        $agencias->nombre=$request->get('nombre');
        $agencias->direccion=$request->get('direccion');
        $agencias->descripcion=$request->get('descripcion');
        if (Input::hasFile('imagen')) {
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes',$file->getClientOriginalName());
            $agencias->imagen=$file->getClientOriginalName();
        }
        $agencias->email=$request->get('email');
        $agencias->update();
        return Redirect::to('mantenimiento/agencias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agencias=Agencias::findOrFail($id);
        $agencias->delete();
        return Redirect::to('mantenimiento/agencias');
    }
}
