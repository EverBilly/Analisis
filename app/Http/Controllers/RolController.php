<?php

namespace App\Http\Controllers;

use App\Rol;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Crypt;
use Laracast\Flash\Flash;
use DB;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $roles = Rol::all();
        // return view('rol.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Rol::paginate(5);
        return view('rol.create', compact('roles'));
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
        $newObject = new Rol;
        $newObject->nombre = $request->get('nombre');
        if($newObject->save())
        {
            return back()->with('msj', 'Rol Registrado');
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
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function show(Rol $rol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $rol = Rol::find($id);
        return view('rol.edit', ['rol' => $rol]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        try
        {
            $objectUpdate = Rol::find($id);
            $objectUpdate->nombre    = $request->get('nombre', $objectUpdate->nombre);
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
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rol $rol)
    {
        //
    }
}
