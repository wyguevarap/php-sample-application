<?php
// Incluir autoload de Composer para dependencias externas
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}

spl_autoload_register(
    function ($className)
    {
        if (stream_resolve_include_path($file = ("src/" . str_replace("\\", "/", $className) . ".php"))) {
            include $file;
        }
    }
);
