<?php

return [
    'required' => 'El campo :attribute es obligatorio.',
    'email'    => 'El campo :attribute debe ser una dirección de correo válida.',
    'string'   => 'El campo :attribute debe ser un cadena de texto.',
    'date'     => 'El campo :attribute debe tener formato de fecha.',
    'min'      => [
        'string' => 'El campo :attribute debe tener al menos :min caracteres.',
    ],
    'max'      => [
        'string' => 'El campo :attribute no debe tener más de :max caracteres.',
    ],
    'unique'   => 'El :attribute ya está registrado.',
    'confirmed' => 'La confirmación de :attribute no coincide.',
    'regex'     => 'El formato de :attribute no es válido.',

    'attributes' => require __DIR__ .  './attributes.php',
];
