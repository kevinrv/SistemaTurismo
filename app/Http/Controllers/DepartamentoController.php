<?php

namespace sisTurismo\Http\Controllers;

use sisTurismo\Departamento;
use Illuminate\Http\Request;
use sisTurismo\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;
use sisTurismo\Http\Requests\DepartamentoFormRequest;

class DepartamentoController extends Controller
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
            $departamento=DB::table('departamento')
            ->where('nom_departamento','like','%'.$query.'%')
            ->orderBy('iddepartamento','desc')
            ->get();
        return view('departamento.index',["departamento"=>$departamento,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departamento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartamentoFormRequest $request)
    {
        $departamento=new Departamento();
        $departamento->nom_departamento=$request->get('nombre');
        $departamento->save();
        return Redirect::to('departamento');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("departamento.show",["departamento"=>Departamento::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("departamento.edit",["departamento"=>Departamento::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartamentoFormRequest $request, $id)
    {
        $departamento=Departamento::findOrFail($id);
        $departamento->nom_departamento=$request->get('nombre');
        $departamento->update();
        return Redirect::to('departamento');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $departamento=Departamento::findOrFail($id);
        $departamento->delete();
        return Redirect::to('departamento');
    }
}
