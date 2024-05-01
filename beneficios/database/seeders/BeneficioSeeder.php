<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\Beneficio;
use DateTime;

class BeneficioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/json/beneficio.json');
        $datos = json_decode($json, true);

        $beneficios = collect($datos['data']);

        $beneficios->each(function ($beneficio) {
            print($beneficio['fecha']);
            Beneficio::insert([
                'id_programa' => $beneficio['id_programa'],
                'monto' => $beneficio['monto'],
                'fecha' => DateTime::createFromFormat('Y-m-d', (string)$beneficio['fecha']),
                'fecha_recepcion' => DateTime::createFromFormat('d/m/Y', (string)$beneficio['fecha_recepcion']),
            ]);
        });
    }
}
