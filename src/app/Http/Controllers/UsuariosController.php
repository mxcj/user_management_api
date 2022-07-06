<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Usuarios;
use Spatie\QueryBuilder\QueryBuilder;


class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = QueryBuilder::for(Usuarios::class)
            ->allowedFilters(['nombre','apellido', 'direccion'])
            ->defaultSort('id')
            ->allowedSorts('nombre', 'apellido')
            ->get();
        return $usuarios;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuarios = new Usuarios();
        $usuarios->nombre = $request->nombre;
        $usuarios->apellido = $request->apellido;
        $usuarios->direccion = $request->direccion;
        $usuarios->telefono = $request->telefono;
        $usuarios->edad = $request->edad;
        $usuarios->fecha_contratacion = $request->fecha_contratacion;
        $usuarios->fecha_salida = $request->fecha_salida;

        $usuarios->save();
        return $usuarios;
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
        $usuarios = Usuarios::findOrFail($request->id);
        $usuarios->nombre = $request->nombre;
        $usuarios->apellido = $request->apellido;
        $usuarios->direccion = $request->direccion;
        $usuarios->telefono = $request->telefono;
        $usuarios->edad = $request->edad;
        $usuarios->fecha_contratacion = $request->fecha_contratacion;
        $usuarios->fecha_salida = $request->fecha_salida;

        $usuarios->save();

        return $usuarios;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $usuarios = Usuarios::destroy($request->id);
        return $usuarios;
    }
}
