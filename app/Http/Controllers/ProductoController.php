<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Crypt;
use DB;

class ProductoController extends Controller
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
        $productos = DB::select("Select  P.id, P.nombre,P.descripcion, P.precio1, P.precio2,
        P.precio3, P.precio4, P.precio_anterior, P.precio_actual,
        P.categoria, C.categoria, P.marca, Ma.marca, P.medida, M.medida
        from productos as P, categorias as C, marcas as Ma, medidas as M 
        where C.id = P.categoria and Ma.id = P.marca and M.id = P.medida");
        $categorias = DB::select("select id, categoria from categorias");
        $marcas = DB::select("select id, marca from marcas");
        $medidas = DB::select("select id, medida from medidas");
        return view('producto.create')
        ->with(compact('productos'))
        ->with(compact('categorias'))
        ->with(compact('marcas'))
        ->with(compact('medidas'));
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
        $newObject = new Producto;
        $newObject->nombre          = $request->get('nombre');
        $newObject->descripcion     = $request->get('descripcion');
        $newObject->precio1         = $request->get('precio1');
        $newObject->precio2         = $request->get('precio2');
        $newObject->precio3         = $request->get('precio3');
        $newObject->precio4         = $request->get('precio4');
        $newObject->precio_anterior = $request->get('precio_anterior');
        $newObject->precio_actual   = $request->get('precio_actual');
        $newObject->categoria       = $request->get('categoria');
        $newObject->medida          = $request->get('medida');
        $newObject->marca           = $request->get('marca');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $producto = Producto::find($id);
        return view('producto.edit', ['producto' => $producto]);
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
        try
        {
            $objectUpdate = Producto::find($id);
            $objectUpdate->nombre          = $request->get('nombre');
            $objectUpdate->descripcion     = $request->get('descripcion');
            $objectUpdate->precio1         = $request->get('precio1');
            $objectUpdate->precio2         = $request->get('precio2');
            $objectUpdate->precio3         = $request->get('precio3');
            $objectUpdate->precio4         = $request->get('precio4');
            $objectUpdate->precio_anterior = $request->get('precio_anterior');
            $objectUpdate->precio_actual   = $request->get('precio_actual');
            $objectUpdate->categoria       = $request->get('categoria');
            $objectUpdate->medida          = $request->get('medida');
            $objectUpdate->marca           = $request->get('marca');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        $usuario = Producto::destroy($id);
        return redirect()->route('producto.create');
        return back()->with('msj', 'Eliminado Exitosamente');
    }
}
