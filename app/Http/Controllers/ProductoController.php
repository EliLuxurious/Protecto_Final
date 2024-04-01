<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		//
		//return 'Estoy en el indice de productos';
		//$productos=Producto::all();
		//$productos=Producto::latest()->paginate(6);
		$productos=Producto::orderBy('noreg', 'asc')->paginate(6);
		return view('productos.listar',
		compact('productos'));  // ['productos' =>$productos]
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		// ESTO MUESTRA LA VISTA DE CREACION
		return view('productos.registrar');
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		// CON LA VISTA Y SUS DATOS SE GUARDA LA INFO DB
		//dd($request->all());

		$request->validate([
			'fecha' => 'required|date',
			'detalle' => 'required|string|max:128',
			'unidad' => 'required|string|max:18',
			'producto' => 'required|string|max:18',
			'calculo' => 'required|integer',
			'cancelado' => 'required|integer',
			'resto' => 'required|integer',
			'turno' => 'required|integer',
			'tipo_sesion' => 'required|integer',
			'nick' => 'required|string|max:32',
			'codigo_vendedor' => 'required|string|max:36',
			'responsable' => 'required|string|max:128',
			'link' => 'required|string|max:32',
			'ulink' => 'required|string|max:32',
			'dual' => 'required|integer',
			'fechadetalle' => 'required|string|max:75',
			'cantidad' => ['required','numeric','regex:/^\d{1,16}(\.\d{1,6})?$/'],
			'pc' => ['required','numeric','regex:/^\d{1,16}(\.\d{1,6})?$/'],
			'pv' => ['required','numeric','regex:/^\d{1,16}(\.\d{1,6})?$/'],
			'monto' => ['required','numeric','regex:/^\d{1,16}(\.\d{1,6})?$/'],
			'unidadproducto' => 'required|string|max:52',
			'pu' => ['required','numeric','regex:/^\d{1,16}(\.\d{1,6})?$/'],
			'librocontable' => 'required|string|max:4',
			'cuentacontable' => 'required|string|max:12',
			'esproducto' => 'required|integer',
			'marca' => 'required|string|max:128',
			'tamanio' => 'required|string|max:16',
			'pcusd' => ['required','numeric','regex:/^\d{1,9}(\.\d{1,6})?$/'],
			'despliegue' => 'required|integer',
			'tipoisc' => 'required|integer',
			'tasaisc' => ['required','numeric','regex:/^\d{1,12}(\.\d{1,6})?$/'],
			'tipodscto' => 'required|integer',
			'dsctounit' => ['required','numeric','regex:/^\d{1,12}(\.\d{1,6})?$/'],
			'tipocargo' => 'required|integer',
			'cargounit' => ['required','numeric','regex:/^\d{1,12}(\.\d{1,6})?$/'],
			'tipooperacion' => 'required|integer',
			'pr' => ['required','numeric','regex:/^\d{1,12}(\.\d{1,6})?$/'],
			'mincompra' => ['required','numeric','regex:/^\d{1,12}(\.\d{1,6})?$/'],
			'fechavencimiento' => 'required|date',
			'version_img' => 'required|integer',
			'serie' => 'required|string|max:5',
			'codigosunat' => 'required|string|max:10',
			'afectoicbper' => 'required|integer',
			'ubicacion' => 'required|string|max:64',
			'peso' => ['required','numeric','regex:/^\d{1,12}(\.\d{1,2})?$/'],
			'pmayor' => ['required','numeric','regex:/^\d{1,12}(\.\d{1,4})?$/'],
			'stockminimo' => ['required','numeric','regex:/^\d{1,12}(\.\d{1,4})?$/'],
			'estadoservprod' => 'required|integer',
			'facturable' => 'required|integer',
			'perecible' => 'required|integer',
			'clasificador' => 'required|string|max:2',
			'nrolote' => 'required|string|max:32',
			'presentacion' => 'required|string|max:64',
			'receta' => 'required|integer'
		]);

		Producto::create($request->all());
		return redirect()->route('productos.create')
		->with('success','PRODUCTOS Registrado con exito...');
	}

	/**
	 * Display the specified resource.
	 */
	public function show(Producto $producto)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(Producto $producto)
	{
		//dd($productos);
		return view('productos.editar',['producto'=>$producto]);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, Producto $producto)
	{
		//
		//dd($productos);
		$request->validate([
			'fecha' => 'required|date',
			'detalle' => 'required|string|max:128',
			'unidad' => 'required|string|max:18',
			'producto' => 'required|string|max:18',
			'calculo' => 'required|integer',
			'cancelado' => 'required|integer',
			'resto' => 'required|integer',
			'turno' => 'required|integer',
			'tipo_sesion' => 'required|integer',
			'nick' => 'required|string|max:32',
			'codigo_vendedor' => 'required|string|max:36',
			'responsable' => 'required|string|max:128',
			'link' => 'required|string|max:32',
			'ulink' => 'required|string|max:32',
			'dual' => 'required|integer',
			'fechadetalle' => 'required|string|max:75',
			'cantidad' => ['required','numeric','regex:/^\d{1,16}(\.\d{1,6})?$/'],
			'pc' => ['required','numeric','regex:/^\d{1,16}(\.\d{1,6})?$/'],
			'pv' => ['required','numeric','regex:/^\d{1,16}(\.\d{1,6})?$/'],
			'monto' => ['required','numeric','regex:/^\d{1,16}(\.\d{1,6})?$/'],
			'unidadproducto' => 'required|string|max:52',
			'pu' => ['required','numeric','regex:/^\d{1,16}(\.\d{1,6})?$/'],
			'librocontable' => 'required|string|max:4',
			'cuentacontable' => 'required|string|max:12',
			'esproducto' => 'required|integer',
			'marca' => 'required|string|max:128',
			'tamanio' => 'required|string|max:16',
			'pcusd' => ['required','numeric','regex:/^\d{1,9}(\.\d{1,6})?$/'],
			'despliegue' => 'required|integer',
			'tipoisc' => 'required|integer',
			'tasaisc' => ['required','numeric','regex:/^\d{1,12}(\.\d{1,6})?$/'],
			'tipodscto' => 'required|integer',
			'dsctounit' => ['required','numeric','regex:/^\d{1,12}(\.\d{1,6})?$/'],
			'tipocargo' => 'required|integer',
			'cargounit' => ['required','numeric','regex:/^\d{1,12}(\.\d{1,6})?$/'],
			'tipooperacion' => 'required|integer',
			'pr' => ['required','numeric','regex:/^\d{1,12}(\.\d{1,6})?$/'],
			'mincompra' => ['required','numeric','regex:/^\d{1,12}(\.\d{1,6})?$/'],
			'fechavencimiento' => 'required|date',
			'version_img' => 'required|integer',
			'serie' => 'required|string|max:5',
			'codigosunat' => 'required|string|max:10',
			'afectoicbper' => 'required|integer',
			'ubicacion' => 'required|string|max:64',
			'peso' => ['required','numeric','regex:/^\d{1,12}(\.\d{1,2})?$/'],
			'pmayor' => ['required','numeric','regex:/^\d{1,12}(\.\d{1,4})?$/'],
			'stockminimo' => ['required','numeric','regex:/^\d{1,12}(\.\d{1,4})?$/'],
			'estadoservprod' => 'required|integer',
			'facturable' => 'required|integer',
			'perecible' => 'required|integer',
			'clasificador' => 'required|string|max:2',
			'nrolote' => 'required|string|max:32',
			'presentacion' => 'required|string|max:64',
			'receta' => 'required|integer'
		]);

		$producto->update($request->all());
		return redirect()->route('productos.index')
		->with('success','PRODUCTOS Editar con exito...');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Producto $producto)
	{
		$producto->delete();
		return redirect()->route('productos.index');
		//->with('success','PRODUCTOS Registrado con exito...');
		//dd($producto);
	}
}
