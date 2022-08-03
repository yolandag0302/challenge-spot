<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Catastro;
use Tests\TestCase;

class CatastroTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A Catastro test.
     *
     * @return void
     */
    public function testCatastroIsShownCorrectly()
    {
        $catastro = Catastro::create(
            [
                'codigo_postal' => 7800,
                'uso_construccion' => 'Habitacional',
                'superficie_terreno' => 152,
                'superficie_construccion' => 455,
                'valor_suelo' => 476986.64,
                'subsidio' => 0,
                'price_unit' => 3138.07,
                'price_unit_construction' => 1048.32,
            ]
        );

        $this->json('get', "api/price-m2/zip-codes/$catastro->codigo_postal/aggregate/max?construction_type=4")
            ->assertStatus(200)
            ->assertExactJson(
                [
                    'status' => true,
                    'payload' => [
                        'type' => 'max',
                        'price_unit' => "3138.07",
                        'price_unit_construction' => "1048.32",
                        'elements' => 1
                    ]
                ]
            );
    }
}
