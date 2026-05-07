<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Socios extends Model
{
    protected $fillable = ['nombre', 'email'];

    public function peliculas()
    {
        return $this->belongsToMany(Peliculas::class, 'prestamos')
                ->withPivot('fecha_prestamo')
                ->withTimestamps();
    }
}
