<?php

namespace App\Http\Controllers;

use App\Municipio;
use App\Departamento;
use Illuminate\Http\Request;
use DB;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function Obtener(Request $request, $id)
    {
        if($request->ajax()){
            $municipios = Municipio::municipios($id);
            return response()->json($municipios);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $municipios = Municipio::all();
        // $departamentos = DB::select('select M.municipio, D.id, D.departamento from municipios as M, departamentos as D where M.departamento = D.id');
        $departamentos = Departamento::all();
        return view('municipio.create')
        ->with(compact('municipios'))
        ->with( compact('departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try 
        {
        $newObject = new Municipio;
        $newObject->municipio = $request->get('municipio');
        $newObject->departamento = $request->get('departamento');

        if($newObject->save())
        {
            return back()->with('msj', 'Registrado');
        }
        else
        if (!$newObject->save())
        {
            return back()->with('error', 'Datos no Guardados');    
        }
    }
    catch(Exception $e)
    {
        $returnData = array(
            'status'    => 500,
            'message'   => $e->getMessage()
        );
        return Response($returnData, 500);
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Municipio  $Municipio
     * @return \Illuminate\Http\Response
     */
    public function show(Municipio $Municipio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Municipio  $Municipio
     * @return \Illuminate\Http\Response
     */
    public function edit(Municipio $municipio)
    {
        $id = Crypt::decrypt($id);
        $municipio = Municipio::find($id);
        return view('municipio.edit', compact('municipio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Municipio  $Municipio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
                try 
        {
        $objectUpdate = new Municipio;
        $objectUpdate->municipio = $request->get('municipio');
        if($objectUpdate->save())
        {
            return back()->with('msj', 'Registrado');
        }
        else
        if (!$objectUpdate->save())
        {
            return back()->with('error', 'Datos no Guardados');    
        }
    }
    catch(Exception $e)
    {
        $returnData = array(
            'status'    => 500,
            'message'   => $e->getMessage()
        );
        return Response($returnData, 500);
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Municipio  $Municipio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Municipio $municipio)
    {
        $id = Crypt::decrypt($id);
        $municipio = Municipio::destroy($id);
        return redirect()->route('municipio.create');
        return back()->with('msj', 'Eliminado Exitosamente');
    }
}
