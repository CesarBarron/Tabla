<?php
// Obtener el índice del registro a eliminar
$data = json_decode(file_get_contents('php://input'), true);
$indexToDelete = $data['index'];

// Leer datos del archivo
$file = 'data.txt';
if (file_exists($file)) {
    $content = file_get_contents($file);
    $lines = explode("\n", trim($content));

    // Verificar que el índice es válido
    if ($indexToDelete >= 0 && $indexToDelete < count($lines)) {
        unset($lines[$indexToDelete]); // Eliminar la línea
        $newContent = implode("\n", $lines);
        file_put_contents($file, $newContent); // Guardar el nuevo contenido en el archivo
        echo "Fila eliminada con éxito.";
    } else {
        echo "Índice inválido.";
    }
} else {
    echo "Archivo no encontrado.";
}
?>
