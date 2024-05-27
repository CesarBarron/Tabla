<?php
$file = 'data.txt'; // Nombre del archivo donde se guardan los datos

// Verificar si el archivo existe y leer su contenido
if (file_exists($file)) {
    $content = file_get_contents($file);
    $lines = explode("\n", trim($content));
    $data = [];

    foreach ($lines as $line) {
        if (!empty($line)) {
            list($name, $age) = explode(", ", str_replace(['Nombre: ', 'Edad: '], '', $line));
            $data[] = ['name' => $name, 'age' => $age];
        }
    }

    // Devolver datos en formato JSON
    echo json_encode($data);
} else {
    echo json_encode([]);
}
?>