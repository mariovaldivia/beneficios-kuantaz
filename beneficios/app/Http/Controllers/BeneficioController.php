<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beneficio;
use App\Models\Filtro;
use Illuminate\Support\Facades\DB;

class BeneficioController extends Controller
{
    /**
     * Display a listing of beneficios
     */
    public function index()
    {

        $years = Beneficio::
            join('filtros', 'filtros.id_programa', '=', 'beneficios.id_programa')
            ->whereRaw('beneficios.monto >= filtros.min')
            ->whereRaw('beneficios.monto < filtros.max')->select(
                DB::raw('year(fecha) as year_b'),
                DB::raw("count(*) as total"),
                DB::raw("SUM(monto) as monto_total")
            )
            ->orderBy(DB::raw('year(fecha)'), 'DESC')
            ->groupBy(DB::raw('year(fecha)'))
            ->get();

        $beneficios = $years->map(function (Beneficio $item, int $key)  {
            $beneficios_anio = Beneficio::
                join('filtros', 'filtros.id_programa', '=', 'beneficios.id_programa')
                ->whereRaw('beneficios.monto >= filtros.min')
                ->whereRaw('beneficios.monto < filtros.max')
                ->select('beneficios.id_programa', 'monto', 'fecha_recepcion', 'fecha')
                ->whereYear('fecha', $item->year_b);

            // $beneficios_anio->filtro()->where('')
            return [
                'year' => $item->year_b,
                'num' => $beneficios_anio->count(),
                'monto_total' => $item->monto_total,
                'beneficios' => $beneficios_anio->get()
            ];
        });

        return [
            'code' => 200,
            'success' => true,
            'data' => $beneficios
        ];
    }

}
