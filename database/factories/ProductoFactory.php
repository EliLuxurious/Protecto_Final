<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fecha' => $this->faker->date(),
            'detalle' => $this->faker->text(128),
            'unidad' => $this->faker->word(),
            'producto' => $this->faker->word(),
            'calculo' => $this->faker->randomNumber(),
            'cancelado' => $this->faker->numberBetween(0, 1),
            'resto' => $this->faker->randomNumber(),
            'turno' => $this->faker->randomDigit(),
            'tipo_sesion' => $this->faker->randomDigit(),
            'nick' => $this->faker->userName(),
            'codigo_vendedor' => $this->faker->uuid(),
            'responsable' => $this->faker->name(),
            'link' => $this->faker->text(32),
            'ulink' => $this->faker->text(32),
            'dual' => $this->faker->numberBetween(0, 1),
            'fechadetalle' => $this->faker->text(75),
            'cantidad' => $this->faker->randomFloat(6, 0, 1000),
            'pc' => $this->faker->randomFloat(6, 0, 1000),
            'pv' => $this->faker->randomFloat(6, 0, 1000),
            'monto' => $this->faker->randomFloat(6, 0, 1000),
            'unidadproducto' => $this->faker->word(),
            'pu' => $this->faker->randomFloat(6, 0, 1000),
            'librocontable' => $this->faker->numerify('####'),
            'cuentacontable' => $this->faker->numerify('##########'),
            'esproducto' => $this->faker->numberBetween(0, 1),
            'marca' => $this->faker->word(),
            'tamanio' => $this->faker->randomElement(['Pequeño', 'Mediano', 'Grande']),
            'pcusd' => $this->faker->randomFloat(6, 0, 100),
            'despliegue' => $this->faker->randomDigit(),
            'tipoisc' => $this->faker->randomDigit(),
            'tasaisc' => $this->faker->randomFloat(6, 0, 100),
            'tipodscto' => $this->faker->randomDigit(),
            'dsctounit' => $this->faker->randomFloat(6, 0, 100),
            'tipocargo' => $this->faker->randomDigit(),
            'cargounit' => $this->faker->randomFloat(6, 0, 100),
            'tipooperacion' => $this->faker->randomDigit(),
            'pr' => $this->faker->randomFloat(6, 0, 100),
            'mincompra' => $this->faker->randomFloat(6, 0, 1000),
            'fechavencimiento' => $this->faker->date(),
            'version_img' => $this->faker->randomDigit(),
            'serie' => $this->faker->lexify('?????'),
            'codigosunat' => $this->faker->numerify('##########'),
            'afectoicbper' => $this->faker->numberBetween(0, 1),
            'ubicacion' => $this->faker->word(),
            'peso' => $this->faker->randomFloat(2, 0, 100),
            'pmayor' => $this->faker->randomFloat(4,0, 1000),
            'stockminimo' => $this->faker->randomFloat(4, 0, 500),
            'estadoservprod' => $this->faker->randomDigit(),
            'facturable' => $this->faker->numberBetween(0, 1),
            'perecible' => $this->faker->numberBetween(0, 1),
            'clasificador' => $this->faker->lexify('??'),
            'nrolote' => $this->faker->numerify('#####'),
            'presentacion' => $this->faker->word(),
            'receta' => $this->faker->numberBetween(0, 1),
            ];
    }
}
