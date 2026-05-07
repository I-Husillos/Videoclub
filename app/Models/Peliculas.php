<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peliculas extends Model
{
    protected $fillable = ['titulo', 'director'];

    public function socios()
    {
        return $this->belongsToMany(Socios::class, 'prestamos')
                ->withPivot('fecha_prestamo')
                ->withTimestamps();
    }
}
