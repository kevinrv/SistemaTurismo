<?php

namespace sisTurismo\Http\Controllers;

use Illuminate\Http\Request;

use sisTurismo\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisTurismo\Http\Requests\PaqueteFormRequest;
use sisTurismo\Paquete;
use DB;
use Response;
use Illuminate\Support\Collection;

class PaqueteController extends Controller
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
            return view('paquete.agencias.index',["agencias"=>$agencias,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paquete.agencias');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaqueteFormRequest $request)
    {
        $paquete=new Paquete();
        $paquete->precio=$request->get('precio');
        $paquete->num_persona=$request->get('personas');
        $paquete->descuento=$request->get('descuento');
        $paquete->idlugar_turistico=$request->get('idlugar_turistico');
        $paquete->idagencias=$request->get('idagencias');
        $paquete->save();
        return Redirect::to('paquete/agencias');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lugar=DB::table('lugar_turistico')->get();
        $agencias=DB::table('agencias as a')
            ->where('a.idagencias','=',$id)
            ->first();
        $paquete=DB::table('paquete as p')
            ->join('lugar_turistico as lt','p.idlugar_turistico','=','lt.idlugar_turistico')
            ->join('agencias as a','p.idagencias','=','a.idagencias')    
            ->select('p.idpaquete','p.precio','p.num_persona','p.descuento','lt.nombre',DB::raw('(p.precio-p.descuento) as total'))
            ->where('a.idagencias','=',$id)
            ->orderBy('p.idpaquete','desc')
            ->get();
            return view("paquete.agencias.show",["agencias"=>$agencias,"paquete"=>$paquete,"lugar"=>$lugar]);
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
        $paquete=Paquete::findOrFail($id);
        $paquete->delete();
        return Redirect::to('paquete/agencias');
    }
}
