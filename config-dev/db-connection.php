<?php

// Leer datos de conexión desde variables de entorno
$dbHost = getenv('DB_HOST') ?: 'localhost';
$dbName = getenv('DB_NAME') ?: 'sample';
$dbUser = getenv('DB_USER') ?: 'sampleuser';
$dbPass = getenv('DB_PASSWORD') ?: 'samplepass';

return new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass, [PDO::ATTR_PERSISTENT => true]);
