<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Producto;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase;

class ProductoCRUDTest extends TestCase
{
    use RefreshDatabase;

    // Prueba para registrar un producto
    public function test_a_product_can_be_registered()
    {
     //Crear un usuario
    $user=User::factory()->create();

     //Usar el factory para generar datos de un producto
        $productData=Producto::factory()->make()->toArray();
     //Autenticar al usuario y enviar solicitud post a la ruta de registro de producto
        $response=$this->actingAs($user)->post(route('productos.store'),$productData);
     //Afirmar que la respuesta es una redirección a la ruta de creación de productos
        $response->assertRedirect(route('productos.create'));
        //Afirmar que los datos del producto están en la base de datos
        $this->assertDatabaseHas('productos',$productData);
    }
        // Prueba para eliminar un producto
    public function test_a_product_can_be_deleted()
        {
            // Crear un usuario de prueba si la autenticación es necesaria para acceder a la ruta de eliminación.
            $user = User::factory()->create();
        
            // Crear un producto en la base de datos para eliminarlo utilizando el factory.
            $producto = Producto::factory()->create();
        
            // Autenticar al usuario y enviar solicitud DELETE a la ruta de eliminación de producto.
            $response = $this->actingAs($user)->delete(route('productos.destroy', $producto->noreg));
        
            // Afirmar que la respuesta es una redirección a la ruta del índice de productos.
            $response->assertRedirect(route('productos.index'));
        
            // Afirmar que el producto ya no está en la base de datos.
            $this->assertDatabaseMissing('productos', ['noreg' => $producto->noreg]);
    }
    // Prueba para listar productos
    /** @test */
    public function test_products_can_be_listed()
    {
         // Crear un usuario y autenticar
    $user = User::factory()->create();

    // Crear algunos productos de prueba
    Producto::factory()->count(10)->create();

    // Autenticar al usuario
    $this->actingAs($user);

    // Hacer la petición GET a la ruta de listar productos
    $response = $this->get(route('productos.index'));

    // Asegurarse de que la respuesta es 200 OK
    $response->assertStatus(200);

    // Asegurarse de que la vista tiene una variable 'productos'
    $response->assertViewHas('productos');

    // Si necesitas verificar que se trata de un LengthAwarePaginator
    // $response->assertViewHas('productos', function ($viewProductos) {
    //     return $viewProductos instanceof \Illuminate\Pagination\LengthAwarePaginator;
    // });

    // Opcionalmente, verificar contenido específico si es necesario
    // Recuerda que sólo podrás verificar los que están en la primera página de la paginación
    $productosEnPrimeraPagina = Producto::orderBy('noreg', 'asc')->take(6)->get();
    foreach ($productosEnPrimeraPagina as $producto) {
        $response->assertSee(e($producto->detalle), false);
    }
    }
    use InteractsWithDatabase; // Añade el trait InteractsWithDatabase
    /** @test */
    public function testUpdateProducto()
    {
        // Crea un usuario ficticio
        $user = User::factory()->create();
        $this->actingAs($user);

        // Crea un producto ficticio utilizando factory
        $producto = Producto::factory()->create();

         // Utiliza la fábrica adecuada para crear un nuevo producto
        $requestData = [
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
            // Incluye todos los campos requeridos por la validación aquí...
        ];

        $response = $this->put(route('productos.update', $producto), $requestData);

        $response->assertRedirect(route('productos.index'))
            ->assertSessionHas('success', 'PRODUCTOS Editar con exito...');

        $this->assertDatabaseHas('productos', $requestData);
    }



}
