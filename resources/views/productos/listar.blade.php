@extends('adminlte::page')

@section('title', 'Lista de PRODUCTOS')

@section('content_header')
	<h1 class='m-0 text-dark'>Lista PRODUCTOS</h1>
@stop

@section('content')
	<table class='table table-bordered text-black'>
		<tr>
			<th>NOREG</th>
			<th>FECHA</th>
			<th>DETALLE</th>
			<th>UNIDAD</th>
			<th>PRODUCTO</th>
			<th>CALCULO</th>
			<th>CANCELADO</th>
			<th>RESTO</th>
			<th>TURNO</th>
			<th>TIPO_SESION</th>
			<th>NICK</th>
			<th>CODIGO_VENDEDOR</th>
			<th>RESPONSABLE</th>
			<th>LINK</th>
			<th>ULINK</th>
			<th>DUAL</th>
			<th>FECHADETALLE</th>
			<th>CANTIDAD</th>
			<th>PC</th>
			<th>PV</th>
			<th>MONTO</th>
			<th>UNIDADPRODUCTO</th>
			<th>PU</th>
			<th>LIBROCONTABLE</th>
			<th>CUENTACONTABLE</th>
			<th>ESPRODUCTO</th>
			<th>MARCA</th>
			<th>TAMANIO</th>
			<th>PCUSD</th>
			<th>DESPLIEGUE</th>
			<th>TIPOISC</th>
			<th>TASAISC</th>
			<th>TIPODSCTO</th>
			<th>DSCTOUNIT</th>
			<th>TIPOCARGO</th>
			<th>CARGOUNIT</th>
			<th>TIPOOPERACION</th>
			<th>PR</th>
			<th>MINCOMPRA</th>
			<th>FECHAVENCIMIENTO</th>
			<th>VERSION_IMG</th>
			<th>SERIE</th>
			<th>CODIGOSUNAT</th>
			<th>AFECTOICBPER</th>
			<th>UBICACION</th>
			<th>PESO</th>
			<th>PMAYOR</th>
			<th>STOCKMINIMO</th>
			<th>ESTADOSERVPROD</th>
			<th>FACTURABLE</th>
			<th>PERECIBLE</th>
			<th>CLASIFICADOR</th>
			<th>NROLOTE</th>
			<th>PRESENTACION</th>
			<th>RECETA</th>
			<th>Opciones</th>
		</tr>
		@foreach ($productos as $producto)
			<tr>
				<td> {{$producto->noreg}} </td>
				<td> {{$producto->fecha}} </td>
				<td> {{$producto->detalle}} </td>
				<td> {{$producto->unidad}} </td>
				<td> {{$producto->producto}} </td>
				<td> {{$producto->calculo}} </td>
				<td> {{$producto->cancelado}} </td>
				<td> {{$producto->resto}} </td>
				<td> {{$producto->turno}} </td>
				<td> {{$producto->tipo_sesion}} </td>
				<td> {{$producto->nick}} </td>
				<td> {{$producto->codigo_vendedor}} </td>
				<td> {{$producto->responsable}} </td>
				<td> {{$producto->link}} </td>
				<td> {{$producto->ulink}} </td>
				<td> {{$producto->dual}} </td>
				<td> {{$producto->fechadetalle}} </td>
				<td> {{$producto->cantidad}} </td>
				<td> {{$producto->pc}} </td>
				<td> {{$producto->pv}} </td>
				<td> {{$producto->monto}} </td>
				<td> {{$producto->unidadproducto}} </td>
				<td> {{$producto->pu}} </td>
				<td> {{$producto->librocontable}} </td>
				<td> {{$producto->cuentacontable}} </td>
				<td> {{$producto->esproducto}} </td>
				<td> {{$producto->marca}} </td>
				<td> {{$producto->tamanio}} </td>
				<td> {{$producto->pcusd}} </td>
				<td> {{$producto->despliegue}} </td>
				<td> {{$producto->tipoisc}} </td>
				<td> {{$producto->tasaisc}} </td>
				<td> {{$producto->tipodscto}} </td>
				<td> {{$producto->dsctounit}} </td>
				<td> {{$producto->tipocargo}} </td>
				<td> {{$producto->cargounit}} </td>
				<td> {{$producto->tipooperacion}} </td>
				<td> {{$producto->pr}} </td>
				<td> {{$producto->mincompra}} </td>
				<td> {{$producto->fechavencimiento}} </td>
				<td> {{$producto->version_img}} </td>
				<td> {{$producto->serie}} </td>
				<td> {{$producto->codigosunat}} </td>
				<td> {{$producto->afectoicbper}} </td>
				<td> {{$producto->ubicacion}} </td>
				<td> {{$producto->peso}} </td>
				<td> {{$producto->pmayor}} </td>
				<td> {{$producto->stockminimo}} </td>
				<td> {{$producto->estadoservprod}} </td>
				<td> {{$producto->facturable}} </td>
				<td> {{$producto->perecible}} </td>
				<td> {{$producto->clasificador}} </td>
				<td> {{$producto->nrolote}} </td>
				<td> {{$producto->presentacion}} </td>
				<td> {{$producto->receta}} </td>
				<td>
					<a href="{{route('productos.edit',['producto' => $producto->noreg])}}" class="btn btn-warning ">Editar</a>
					<form action="{{route('productos.destroy',['producto' => $producto->noreg])}}" class="d-inline" method="POST">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-danger">Eliminar</button>
					</form>
				</td>
			</tr>
		@endforeach
	</table>
	<div>{{ $productos->links() }}</div>
@stop