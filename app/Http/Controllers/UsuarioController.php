<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\Rol;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Crypt;
use Laracast\Flash\Flash;
use Illuminate\Routing\Route;
use DB;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin',['only' => ['create', 'edit', 'destroy']]);
    }

    public function index()
    {
        // $results = DB::select('select nombre from usuarios where deleted_at = :deleted_at', ['deleted_at' => ""]);
        // return view('usuario.index', compact('results'));
        // return Response::json(Usuarios::with('usuarios','roles')->get(), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = Usuario::paginate(5);
        $roles = DB::select("Select id, nombre from roles");
        return view('usuario.create')
        ->with(compact('usuarios'))
        ->with(compact('roles'));
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
            $newObject = new Usuario;
            $newObject->nombre    = $request->get('nombre');
            $newObject->apellido  = $request->get('apellido');
            $newObject->telefono  = $request->get('telefono');
            $newObject->email     = $request->get('email');
            $newObject->password  = $request->get('password');
            $newObject->rol       = $request->get('rol');
            
            if($newObject->save())
            {
                return back()->with('msj', 'Usuario Registrado');
            }
            else
            if(!$newObject->save())
            {
                return back()->with('error', 'Datos No Guardados');
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
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $usuario = Usuario::find($id);
        return view('usuario.edit', ['usuario' => $usuario]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        try
        {
            $objectUpdate = Usuario::find($id);
            $objectUpdate->nombre    = $request->get('nombre', $objectUpdate->nombre);
            $objectUpdate->apellido  = $request->get('apellido', $objectUpdate->apellido);
            $objectUpdate->telefono  = $request->get('telefono', $objectUpdate->telefono);
            $objectUpdate->password  = $request->get('password', $objectUpdate->password);
            $objectUpdate->rol       = $request->get('rol', $objectUpdate->rol);
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
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        $usuario = Usuario::destroy($id);
        return redirect()->route('usuario.create');
        return back()->with('msj', 'Eliminado Exitosamente');
    }
}
