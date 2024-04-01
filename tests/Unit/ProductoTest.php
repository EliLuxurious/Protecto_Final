<?php

namespace Tests\Unit;

use App\Models\Producto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductoTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function un_producto_puede_ser_creado()
    {
        $producto = Producto::factory()->create();

        $this->assertDatabaseHas('productos', [
            'noreg' => $producto->noreg
        ]);
    }
    /** @test */
    public function un_producto_puede_ser_actualizado()
    {
        $producto = Producto::factory()->create();

        $producto->update([
            'fecha' => '2024-03-31',
            'detalle' => 'Detalle actualizado',
            'unidad' => 'Pi',
            'producto' => 'hola',
            'calculo' => 1,
            'cancelado' => 0,
            'resto' => 1,
            'turno' => 1,
            'tipo_sesion' => 1,
            'nick' => 'nombredeusuario',
            'codigo_vendedor' => 'codigo123',
            'responsable' => 'Nombre del responsable',
            'link' => 'enlace',
            'ulink' => 'enlace',
            'dual' => 1,
            'fechadetalle' => '2024-03-30',
            'cantidad' => 10.5,
            'pc' => 50.75,
            'pv' => 75.25,
            'monto' => 500.50,
            'unidadproducto' => 'Unidad del producto',
            'pu' => 35.75,
            'librocontable' => 'LIBR',
            'cuentacontable' => 'CUENTA123',
            'esproducto' => 1,
            'marca' => 'Marca del producto',
            'tamanio' => 'TAA',
            'pcusd' => 30.50,
            'despliegue' => 1,
            'tipoisc' => 1,
            'tasaisc' => 0.05,
            'tipodscto' => 1,
            'dsctounit' => 10.25,
            'tipocargo' => 1,
            'cargounit' => 5.75,
            'tipooperacion' => 1,
            'pr' => 20.75,
            'mincompra' => 100.50,
            'fechavencimiento' => '2025-03-30',
            'version_img' => 1,
            'serie' => 'ABC12',
            'codigosunat' => 'CODIGO123',
            'afectoicbper' => 1,
            'ubicacion' => 'Ubicación del producto',
            'peso' => 5.25,
            'pmayor' => 40.75,
            'stockminimo' => 20.50,
            'estadoservprod' => 1,
            'facturable' => 1,
            'perecible' => 1,
            'clasificador' => 'CL',
            'nrolote' => 'Lote123',
            'presentacion' => 'Presentación del producto',
            'receta' => 1
        ]);

        $this->assertDatabaseHas('productos', [
            'noreg' => $producto->noreg,
            'fecha' => '2024-03-31',
            'detalle' => 'Detalle actualizado',
            'unidad' => 'Pi',
            'producto' => 'hola',
            'calculo' => 1,
            'cancelado' => 0,
            'resto' => 1,
            'turno' => 1,
            'tipo_sesion' => 1,
            'nick' => 'nombredeusuario',
            'codigo_vendedor' => 'codigo123',
            'responsable' => 'Nombre del responsable',
            'link' => 'enlace',
            'ulink' => 'enlace',
            'dual' => 1,
            'fechadetalle' => '2024-03-30',
            'cantidad' => 10.5,
            'pc' => 50.75,
            'pv' => 75.25,
            'monto' => 500.50,
            'unidadproducto' => 'Unidad del producto',
            'pu' => 35.75,
            'librocontable' => 'LIBR',
            'cuentacontable' => 'CUENTA123',
            'esproducto' => 1,
            'marca' => 'Marca del producto',
            'tamanio' => 'TAA',
            'pcusd' => 30.50,
            'despliegue' => 1,
            'tipoisc' => 1,
            'tasaisc' => 0.05,
            'tipodscto' => 1,
            'dsctounit' => 10.25,
            'tipocargo' => 1,
            'cargounit' => 5.75,
            'tipooperacion' => 1,
            'pr' => 20.75,
            'mincompra' => 100.50,
            'fechavencimiento' => '2025-03-30',
            'version_img' => 1,
            'serie' => 'ABC12',
            'codigosunat' => 'CODIGO123',
            'afectoicbper' => 1,
            'ubicacion' => 'Ubicación del producto',
            'peso' => 5.25,
            'pmayor' => 40.75,
            'stockminimo' => 20.50,
            'estadoservprod' => 1,
            'facturable' => 1,
            'perecible' => 1,
            'clasificador' => 'CL',
            'nrolote' => 'Lote123',
            'presentacion' => 'Presentación del producto',
            'receta' => 1
        ]);
    }
    /** @test */
    public function un_producto_puede_ser_eliminado()
    {
        $producto = Producto::factory()->create();

        $producto->delete();

        $this->assertDatabaseMissing('productos', [
            'noreg' => $producto->noreg
        ]);
    
    }

}