<?php

use App\Models\Film;


// tests: 
// -existe modelo pelicula
// -si existe controlador socio
// -si devuelve la informacion el titulo y director

test('Film model exists', function () {
    $this->assertTrue(class_exists(Film::class));
});

test('Socio controller exists', function () {
    $this->assertTrue(class_exists(SocioController::class));
});

test('Film information is returned', function () {
    $film = Film::factory()->create([
        'title' => 'Inception',
        'director' => 'Christopher Nolan',
    ]);

    $this->assertEquals('Inception', $film->title);
    $this->assertEquals('Christopher Nolan', $film->director);
});