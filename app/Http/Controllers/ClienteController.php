<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Departamento;
use App\Municipio;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Crypt;
use DB;

class ClienteController extends Controller
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
        $clientes = Cliente::all();
        $departamentos = DB::select('select id, departamento from departamentos');
        $municipios = DB::select('select D.id, M.municipio, D.departamento from municipios as M, departamentos as D
        where M.departamento = D.id');
        return view('cliente.create')
        ->with(compact('clientes'))
        ->with(compact('departamentos'))
        ->with(compact('municipios'));
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
        $newObject = new Cliente;
        $newObject->nombre = $request->get('nombre');
        $newObject->apellido = $request->get('apellido');
        $newObject->telefono = $request->get('telefono');
        $newObject->email = $request->get('email');
        $newObject->direccion = $request->get('direccion');        
        $newObject->municipio = $request->get('municipio');
        if($newObject->save())
        {
            return back()->with('msj', 'Cliente Registrado');
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
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($idi)
    {
        $id = Crypt::decrypt($id);
        $cliente = Cliente::find($id);
        return view('cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
                try 
        {
        $objectUpdate = new Cliente;
        $objectUpdate->nombre = $request->get('nombre');
        $objectUpdate->apellido = $request->get('apellido');
        $objectUpdate->telefono = $request->get('telefono');
        $objectUpdate->email = $request->get('email');
        $objectUpdate->direccion = $request->get('direccion');

        if($objectUpdate->save())
        {
            return back()->with('msj', 'Datos Editados');
        }
        else
        if (!$objectUpdate->save())
        {
            return back()->with('error', 'Datos no Editados');    
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
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        $cliente = Cliente::destroy($id);
        return redirect()->route('cliente.create');
        return back()->with('msj', 'Eliminado Exitosamente');
    }
}
