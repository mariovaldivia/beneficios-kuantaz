<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\Ficha;

class FichaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/json/ficha.json');
        $datos = json_decode($json, true);

        $fichas = collect($datos['data']);

        $fichas->each(function ($ficha) {

            Ficha::insert([
                'id' => $ficha['id'],
                'nombre' => $ficha['nombre'],
                'url' => $ficha['url'],
                'categoria' => $ficha['categoria'],
                'descripcion' => $ficha['descripcion'],
                'id_programa' => $ficha['id_programa'],
            ]);
        });
    }
}
