<?php

namespace App\Http\Controllers;

use App\Medida;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Crypt;
use DB;

class MedidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medidas = Medida::paginate(5);
        return view('medida.create', compact('medidas'));
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
        $newObject = new Medida;
        $newObject->medida = $request->get('medida');
        if($newObject->save())
        {
            return back()->with('msj', 'Medida Registrada');
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
     * @param  \App\Medida  $medida
     * @return \Illuminate\Http\Response
     */
    public function show(Medida $medida)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medida  $medida
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $medida = Medida::find($id);
        return view('medida.edit', ['medida' => $medida]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medida  $medida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try
        {
            $objectUpdate = Medida::find($id);
            $objectUpdate->medida    = $request->get('medida', $objectUpdate->medida);
            if($objectUpdate->save())
            {
                return back()->with('msj', 'Datos Editados');
            }
            else
            if(!$objectUpdate->save())
            {
                return back()->with('error', 'Error al Editar');
            }
        }
        catch(Exception $e)
        {
            $returnData  = array(
                'status'    => 500,
                'message'   => $e->getMessage()
            );
            return Response($returnData, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medida  $medida
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        $medida = Medida::destroy($id);
        return redirect()->route('medida.create');
        return back()->with('msj', 'Eliminado Exitosamente');
    }
}
