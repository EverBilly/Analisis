<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Crypt;
use DB;


class CategoriaController extends Controller
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
        $categorias = Categoria::paginate(5);
        return view('categoria.create', compact('categorias'));
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
        $newObject = new Categoria;
        $newObject->nombre = $request->get('nombre');
        if($newObject->save())
        {
            return back()->with('msj', 'Categoria Registrada');
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
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $categoria = Categoria::find($id);
        return view('categoria.edit', ['categoria' => $categoria]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try
        {
            $objectUpdate = Categoria::find($id);
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
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        $categoria = Categoria::destroy($id);
        return redirect()->route('categoria.create');
        return back()->with('msj', 'Eliminado Exitosamente');
    }
}
