<?php

function dtilde_upper($string)
{
    $tildes = ['á','é','í','ó','ú','Á','É','Í','Ó','Ú','ñ'];
    $correcciones = ['A','E','I','O','U','A','E','I','O','U','Ñ'];

    return str_replace($tildes, $correcciones, $string);
}

function dtilde_lower($string)
{
    $tildes = ['á','é','í','ó','ú','Á','É','Í','Ó','Ú','Ñ'];
    $correcciones = ['a','e','i','o','u','a','e','i','o','u','ñ'];

    return str_replace($tildes, $correcciones, $string);
}

function strtoupper_sanitize($string)
{
    return strtoupper(dtilde_upper(trim($string)));
}

function strtolower_sanitize($string)
{
    return strtolower(dtilde_lower(trim($string)));
}

function sanitize_upper_string($request, $columns)
{
    $input = $request->all();

    foreach ($columns as $element) {
        if($request->has($element))
            $input[$element] = strtoupper_sanitize($request->get($element));
    }

    $request->replace($input);
}

function sanitize_lower_string($request, $columns)
{
    $input = $request->all();

    foreach ($columns as $element) {
        if($request->has($element))
            $input[$element] = strtolower_sanitize($request->get($element));
    }

    $request->replace($input);
}

function request_trim($request, $columns)
{
    $input = $request->all();

    foreach ($columns as $element) {
        if($request->has($element))
            $input[$element] = trim($request->get($element));
    }

    $request->replace($input);
}