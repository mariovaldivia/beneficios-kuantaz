<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\Filtro;
use DateTime;

class FiltroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/json/filtro.json');
        $datos = json_decode($json, true);

        $filtros = collect($datos['data']);

        $filtros->each(function ($filtro) {

            Filtro::insert([
                'tramite' => $filtro['tramite'],
                'min' => $filtro['min'],
                'max' => $filtro['max'],
                'id_programa' => $filtro['id_programa'],
                'ficha_id' => $filtro['ficha_id'],
            ]);
        });
    }
}
