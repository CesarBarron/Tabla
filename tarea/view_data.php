<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Si se recibió una solicitud POST para borrar datos
    if (isset($_POST['delete'])) {
        file_put_contents('data.txt', ''); // Borrar el contenido del archivo
        $message = "Datos borrados con éxito.";
    }
}

// Leer datos del archivo
$file = 'data.txt';
$data = [];
if (file_exists($file)) {
    $content = file_get_contents($file);
    $lines = explode("\n", trim($content));
    foreach ($lines as $line) {
        if (!empty($line)) {
            list($name, $age) = explode(", ", str_replace(['Nombre: ', 'Edad: '], '', $line));
            $data[] = ['name' => $name, 'age' => $age];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver y Borrar Datos Guardados</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>

    <h2>Datos Guardados</h2>
    <?php if (!empty($message)): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Edad</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($data)): ?>
                <tr>
                    <td colspan="2">No hay datos guardados.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($data as $row): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['age']); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <form method="POST" action="view_data.php">
        <button type="submit" name="delete">Borrar Todos los Datos</button>
    </form>

    <button onclick="location.href='index.html'">Volver</button> <!-- Botón para volver a la página principal -->

</body>
</html>
