<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Ficha;

class Filtro extends Model
{
    use HasFactory;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the ficha associated with the filtro.
     */
    public function ficha(): HasOne
    {
        return $this->hasOne(Ficha::class, 'id', 'ficha_id');
    }
}
