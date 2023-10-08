<?php

function makeMessages(){

    $messages = [
        'correo.required' => 'debe ingresar su correo electrónico para iniciar sesión',
        'correo.email' => 'usuario no registrado o contraseña incorrecta',
        'contrasena.required' => 'debe ingresar su contraseña para iniciar sesión',
        'document.required' => 'el campo archivo es requerido.',
        'document.mimes' => 'el archivo seleccionado no es Excel con extensión .xlsx.',
        'document.max' => 'el tamaño máximo del archivo a cargar no puede superar los 5 megabytes',
        'document.filled' => 'hola'

    ];

    return $messages;
}
