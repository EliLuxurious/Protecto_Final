<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
	use HasFactory;

	protected $primaryKey = 'noreg';
	protected $fillable = ['noreg', 'fecha', 'detalle', 'unidad', 'producto', 'calculo', 'cancelado', 'resto', 'turno', 'tipo_sesion', 'nick', 'codigo_vendedor', 'responsable', 'link', 'ulink', 'dual', 'fechadetalle', 'cantidad', 'pc', 'pv', 'monto', 'unidadproducto', 'pu', 'librocontable', 'cuentacontable', 'esproducto', 'marca', 'tamanio', 'pcusd', 'despliegue', 'tipoisc', 'tasaisc', 'tipodscto', 'dsctounit', 'tipocargo', 'cargounit', 'tipooperacion', 'pr', 'mincompra', 'fechavencimiento', 'version_img', 'serie', 'codigosunat', 'afectoicbper', 'ubicacion', 'peso', 'pmayor', 'stockminimo', 'estadoservprod', 'facturable', 'perecible', 'clasificador', 'nrolote', 'presentacion', 'receta'];
}
