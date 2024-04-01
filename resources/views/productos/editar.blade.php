@extends('adminlte::page')

@section('title', 'Editar PRODUCTOS')

@section('content_header')
	<h1 class='m-0 text-dark'>Editar PRODUCTOS</h1>
@stop

@section('content')
	@if ($errors->any())
		<div class='alert alert-danger'>
			<strong>Hubo errores en los datos</strong>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
	@endif

	@if (Session::get('success'))
		<div class='alert alert-success mt-2'>
			<strong>{{Session::get('success')}}</strong>
		</div>
	@endif

	<form action="{{route('productos.update',$producto)}}" method="POST" autocomplete="off">
		@csrf
		@method('PUT')
		<div class="row">
			<x-adminlte-input name="fecha" label="fecha" placeholder="fecha del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->fecha}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="detalle" label="detalle" placeholder="detalle del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->detalle}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="unidad" label="unidad" placeholder="unidad del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->unidad}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="producto" label="producto" placeholder="producto del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->producto}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="calculo" label="calculo" placeholder="calculo del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->calculo}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="cancelado" label="cancelado" placeholder="cancelado del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->cancelado}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="resto" label="resto" placeholder="resto del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->resto}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="turno" label="turno" placeholder="turno del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->turno}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="tipo_sesion" label="tipo_sesion" placeholder="tipo_sesion del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->tipo_sesion}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="nick" label="nick" placeholder="nick del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->nick}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="codigo_vendedor" label="codigo_vendedor" placeholder="codigo_vendedor del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->codigo_vendedor}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="responsable" label="responsable" placeholder="responsable del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->responsable}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="link" label="link" placeholder="link del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->link}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="ulink" label="ulink" placeholder="ulink del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->ulink}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="dual" label="dual" placeholder="dual del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->dual}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="fechadetalle" label="fechadetalle" placeholder="fechadetalle del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->fechadetalle}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="cantidad" label="cantidad" placeholder="cantidad del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->cantidad}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="pc" label="pc" placeholder="pc del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->pc}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="pv" label="pv" placeholder="pv del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->pv}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="monto" label="monto" placeholder="monto del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->monto}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="unidadproducto" label="unidadproducto" placeholder="unidadproducto del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->unidadproducto}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="pu" label="pu" placeholder="pu del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->pu}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="librocontable" label="librocontable" placeholder="librocontable del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->librocontable}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="cuentacontable" label="cuentacontable" placeholder="cuentacontable del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->cuentacontable}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="esproducto" label="esproducto" placeholder="esproducto del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->esproducto}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="marca" label="marca" placeholder="marca del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->marca}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="tamanio" label="tamanio" placeholder="tamanio del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->tamanio}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="pcusd" label="pcusd" placeholder="pcusd del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->pcusd}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="despliegue" label="despliegue" placeholder="despliegue del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->despliegue}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="tipoisc" label="tipoisc" placeholder="tipoisc del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->tipoisc}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="tasaisc" label="tasaisc" placeholder="tasaisc del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->tasaisc}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="tipodscto" label="tipodscto" placeholder="tipodscto del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->tipodscto}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="dsctounit" label="dsctounit" placeholder="dsctounit del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->dsctounit}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="tipocargo" label="tipocargo" placeholder="tipocargo del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->tipocargo}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="cargounit" label="cargounit" placeholder="cargounit del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->cargounit}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="tipooperacion" label="tipooperacion" placeholder="tipooperacion del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->tipooperacion}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="pr" label="pr" placeholder="pr del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->pr}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="mincompra" label="mincompra" placeholder="mincompra del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->mincompra}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="fechavencimiento" label="fechavencimiento" placeholder="fechavencimiento del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->fechavencimiento}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="version_img" label="version_img" placeholder="version_img del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->version_img}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="serie" label="serie" placeholder="serie del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->serie}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="codigosunat" label="codigosunat" placeholder="codigosunat del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->codigosunat}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="afectoicbper" label="afectoicbper" placeholder="afectoicbper del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->afectoicbper}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="ubicacion" label="ubicacion" placeholder="ubicacion del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->ubicacion}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="peso" label="peso" placeholder="peso del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->peso}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="pmayor" label="pmayor" placeholder="pmayor del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->pmayor}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="stockminimo" label="stockminimo" placeholder="stockminimo del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->stockminimo}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="estadoservprod" label="estadoservprod" placeholder="estadoservprod del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->estadoservprod}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="facturable" label="facturable" placeholder="facturable del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->facturable}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="perecible" label="perecible" placeholder="perecible del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->perecible}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="clasificador" label="clasificador" placeholder="clasificador del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->clasificador}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="nrolote" label="nrolote" placeholder="nrolote del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->nrolote}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="presentacion" label="presentacion" placeholder="presentacion del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->presentacion}}"/>
		</div>
		<div class="row">
			<x-adminlte-input name="receta" label="receta" placeholder="receta del PRODUCTOS" fgroup-class="col-md-6" disable-feedback value="{{$producto->receta}}"/>
		</div>
		<x-adminlte-button class="btn-flat" type="submit" label="Actualizar" theme="success" icon="fas fa-lg fa-save"/>
	</form>
@stop