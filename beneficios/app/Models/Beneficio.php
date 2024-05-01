<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Filtro;


class Beneficio extends Model
{
    use HasFactory;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the filtro associated with beneficio.
     */
    public function filtro(): HasOne
    {
        return $this->hasOne(Filtro::class, 'id_programa', 'id_programa');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'filtro'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'fecha_recepcion' => 'datetime:d/m/Y',
            'fecha' => 'datetime:Y-m-d',
        ];
    }

    protected $appends = ['year', 'ficha'];



    public function getYearAttribute(){
        if(!$this->fecha)
            return null;
        return $this->fecha->format('Y');
    }

    public function getFichaAttribute(){
        return $this->filtro->ficha;
    }
}
