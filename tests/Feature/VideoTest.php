<?php

use App\Http\Controllers\SociosController;
use App\Models\Peliculas;


// tests: 
// -existe modelo pelicula
// -si existe controlador socio
// -si devuelve la informacion el titulo y director

test('Film model exists', function () {
    $this->assertTrue(class_exists(Peliculas::class));
});

test('Socio controller exists', function () {
    $this->assertTrue(class_exists(SociosController::class));
});

test('Film information is returned', function () {
    $film = Peliculas::factory()->create([
        'title' => 'Inception',
        'director' => 'Christopher Nolan',
    ]);

    $this->assertEquals('Inception', $film->title);
    $this->assertEquals('Christopher Nolan', $film->director);
});