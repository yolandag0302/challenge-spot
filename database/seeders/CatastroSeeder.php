<?php

namespace Database\Seeders;

use App\Models\Catastro;
use Illuminate\Database\Seeder;

class CatastroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Catastro::truncate();
        $csvData = fopen(base_path('database/csv/sig_cdmx_GUSTAVO_A_MADERO_08_2020.csv'), 'r');
        $transRow = true;
        while (($data = fgetcsv($csvData, 0, ',')) !== false) {
            if (!$transRow) {
                Catastro::create([
                    'codigo_postal' => (!empty($data[3]) && is_numeric($data[3])) ? $data[3] : 0,
                    'superficie_terreno' => $data[5],
                    'superficie_construccion' => $data[6],
                    'uso_construccion' => $data[7],
                    'price_unit' => (!empty($data[12]) && is_numeric($data[12]) && $data[5] > 0) ? $data[12]/$data[5]-$data[16] : 0,
                    'price_unit_construction' => (!empty($data[12]) && is_numeric($data[12]) && $data[6] > 0) ? $data[12]/$data[6]-$data[16] : 0,
                    'valor_suelo' => (!empty($data[12]) && is_numeric($data[12])) ? $data[12] : 0 ,
                    'subsidio' => $data[16],
                ]);
            }
            $transRow = false;
        }
        fclose($csvData);
    }
}
