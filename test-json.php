<?php

// Ruta absoluta al archivo goat.json
$archivo = __DIR__ . '/storage/app/goat.json';

echo "🔍 Buscando archivo en: " . $archivo . "\n\n";

// Verifica si el archivo existe
if (!file_exists($archivo)) {
    die("❌ ERROR: El archivo NO EXISTE en esa ruta.\n");
}

// Verifica permisos de lectura
if (!is_readable($archivo)) {
    die("❌ ERROR: El archivo existe pero NO se puede leer (permisos).\n");
}

// Lee el contenido
$contenido = file_get_contents($archivo);

echo "✅ Archivo encontrado y leído.\n";
echo "📏 Tamaño: " . strlen($contenido) . " bytes\n\n";

// Muestra los primeros 200 caracteres (para detectar basura)
echo "📋 Contenido (primeros 200 caracteres):\n";
echo substr($contenido, 0, 200) . "\n\n";

// Intenta decodificar
$datos = json_decode($contenido, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    echo "❌ ERROR al decodificar JSON: " . json_last_error_msg() . "\n";
    echo "🔍 Byte 0-10 (hex): ";
    for ($i = 0; $i < 10 && $i < strlen($contenido); $i++) {
        printf('%02X ', ord($contenido[$i]));
    }
    echo "\n";
} else {
    echo "✅ JSON decodificado correctamente.\n";
    echo "📊 Número de preguntas: " . count($datos) . "\n";
}