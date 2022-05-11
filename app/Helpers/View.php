<?php

declare(strict_types=1);

namespace App\Helpers;

class View
{
    public static function show(string $view, $data = null)
    {
        session_unset();
        if ($data) {
            foreach ($data as $key => $value) {
                $_SESSION[$key] = serialize($value);
            }
        }

        $basePath = realpath(dirname(__FILE__) . '/../..');
        $viewPath = $basePath . '/resources/views/';
        $path = $viewPath . str_replace('.', '/', $view) . '.php';

        require_once $path;
    }
}