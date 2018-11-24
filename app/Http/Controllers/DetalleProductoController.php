<?php

namespace App\Http\Controllers;

use App\Detalle_Producto;
use App\Entrada;
use App\Salida;
use App\Producto;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Crypt;
use DB;

class DetalleProductoController extends Controller
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
        $detalles = Detalle_Producto::all();
        $entradas = DB::select("select id, descripcion from salidas");
        $salidas = DB::select("select id, descripcion from entradas");
        $productos = DB::select("select id, nombre from productos");
        return view('detalleproducto.create')
        ->with(compact('detalles'))   
        ->with(compact('entradas'))   
        ->with(compact('salidas'))   
        ->with(compact('productos'));
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
        $newObject = new Detalle_Producto;
        $newObject->existencia_minima   = $request->get('existencia_minima');
        $newObject->existencia_maxima   = $request->get('existencia_maxima');
        $newObject->existencia          = $request->get('existencia');
        $newObject->entrada             = $request->get('entrada');
        $newObject->salida              = $request->get('salida');
        $newObject->producto            = $request->get('producto');
        if($newObject->save())
        {
            return back()->with('msj', 'Producto Registrado');
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
     * @param  \App\Detalle_Producto  $detalle_Producto
     * @return \Illuminate\Http\Response
     */
    public function show(Detalle_Producto $detalle_Producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Detalle_Producto  $detalle_Producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $detalleproducto = Detalle_Producto::find($id);
        return view('detalleproducto.edit', ['detalleproducto' => $detalleproducto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Detalle_Producto  $detalle_Producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try
        {
        $objectUpdate = new Detalle_Producto;
        $objectUpdate->existencia_minima   = $request->get('existencia_minima');
        $objectUpdate->existencia_maxima   = $request->get('existencia_maxima');
        $objectUpdate->existencia          = $request->get('existencia');
        $objectUpdate->entrada             = $request->get('entrada');
        $objectUpdate->salida              = $request->get('salida');
        $objectUpdate->producto            = $request->get('producto');
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
     * @param  \App\Detalle_Producto  $detalle_Producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        $usuario = Detalle_Producto::destroy($id);
        return redirect()->route('detalleproducto.create');
        return back()->with('msj', 'Eliminado Exitosamente');
    }
}
