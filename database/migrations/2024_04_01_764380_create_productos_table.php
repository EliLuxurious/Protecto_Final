<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('productos', function (Blueprint $table) {
			$table->id('noreg');
			$table->date('fecha');
			$table->string('detalle',128);
			$table->string('unidad',18);
			$table->string('producto',18);
			$table->integer('calculo');
			$table->integer('cancelado');
			$table->integer('resto');
			$table->integer('turno');
			$table->integer('tipo_sesion');
			$table->string('nick',32);
			$table->string('codigo_vendedor',36);
			$table->string('responsable',128);
			$table->string('link',32);
			$table->string('ulink',32);
			$table->integer('dual');
			$table->string('fechadetalle',75);
			$table->decimal('cantidad',16,6);
			$table->decimal('pc',16,6);
			$table->decimal('pv',16,6);
			$table->decimal('monto',16,6);
			$table->string('unidadproducto',52);
			$table->decimal('pu',16,6);
			$table->string('librocontable',4);
			$table->string('cuentacontable',12);
			$table->integer('esproducto');
			$table->string('marca',128);
			$table->string('tamanio',16);
			$table->decimal('pcusd',9,6);
			$table->integer('despliegue');
			$table->integer('tipoisc');
			$table->decimal('tasaisc',12,6);
			$table->integer('tipodscto');
			$table->decimal('dsctounit',12,6);
			$table->integer('tipocargo');
			$table->decimal('cargounit',12,6);
			$table->integer('tipooperacion');
			$table->decimal('pr',12,6);
			$table->decimal('mincompra',12,6);
			$table->date('fechavencimiento');
			$table->integer('version_img');
			$table->string('serie',5);
			$table->string('codigosunat',10);
			$table->integer('afectoicbper');
			$table->string('ubicacion',64);
			$table->decimal('peso',12,2);
			$table->decimal('pmayor',12,4);
			$table->decimal('stockminimo',12,4);
			$table->integer('estadoservprod');
			$table->integer('facturable');
			$table->integer('perecible');
			$table->string('clasificador',2);
			$table->string('nrolote',32);
			$table->string('presentacion',64);
			$table->integer('receta');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('productos');
	}
};
