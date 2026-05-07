<?php

use App\Models\Film;


// tests: 
// -existe modelo pelicula
// -si existe controlador socio
// -si devuelve la informacion el titulo y director

test('Film model exists', function () {
    $this->assertTrue(class_exists(Film::class));
});