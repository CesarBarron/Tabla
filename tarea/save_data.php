<?php
// Obtener datos enviados desde el cliente
$data = json_decode(file_get_contents('php://input'), true);

if ($data) {
    $file = 'data.txt'; // Nombre del archivo donde se guardarán los datos
    $current = file_get_contents($file); // Leer contenido actual del archivo

    // Formatear y agregar nuevos datos
    foreach ($data as $row) {
        $current .= "Nombre: " . $row['name'] . ", Edad: " . $row['age'] . "\n";
    }

    // Guardar los datos actualizados en el archivo
    file_put_contents($file, $current);

    echo "Datos guardados con éxito.";
} else {
    echo "No se recibieron datos.";
}
?>