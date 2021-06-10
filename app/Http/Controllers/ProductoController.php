<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $DATOS['productos']=Producto::paginate(7);
        return view('producto.index',$DATOS);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('producto.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $DATOS=request()->except('_token');
        if($request->hasFile('fotoP')){
            $DATOS['fotoP']=$request->file('fotoP')->store('uploads','public');
        }
        Producto::insert($DATOS);
        return redirect('producto');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Producto::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto=Producto::findOrFail($id);
        return view('producto.editar',compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $DATOS=request()->except('_token','_method');

        if($request->hasFile('fotoP')){
            $producto=Producto::findOrFail($id);
            Storage::delete('public/'.$producto->fotoP );
            $DATOS['fotoP']=$request->file('fotoP')->store('uploads','public');
        }
        
        Producto::where('id','=',$id)->update($DATOS);
        $producto=Producto::findOrFail($id);
        return view('producto.editar',compact('producto'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto=Producto::findOrFail($id);

        if(Storage::delete('public/'.$producto->fotoP)){
            Producto::destroy($id);
        }
        return redirect('producto');
    }
}
