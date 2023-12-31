<?php
// Función para obtener la información de los puertos desde firewalld

function obtenerInformacionPuertos() {
    $comando = "sudo /usr/bin/firewall-cmd --list-ports";
    $informacionPuertos = shell_exec($comando);
    return $informacionPuertos;
}

// Función para procesar la acción del formulario
function procesarAccion() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $puerto = $_POST["puerto"];
        $accion = $_POST["accion"];

        // Validar y sanitizar la entrada del usuario

        // Ejecutar comandos de firewalld
        $comando = "sudo /usr/bin/firewall-cmd --$accion-port=$puerto/tcp";
        echo $comando;
        $resultado = shell_exec($comando);

        // Recargar firewalld para aplicar los cambios
        // $comando_recarga = "sudo /usr/bin/firewall-cmd --reload";
        // shell_exec($comando_recarga);

        $mensaje = "Comando ejecutado: $comando";
    }
}

// Obtener información de los puertos antes de procesar la acción
$informacionPuertos = obtenerInformacionPuertos();

// Procesar la acción del formulario
procesarAccion();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Puertos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1, h2 {
            color: #333;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        form {
            max-width: 400px;
            margin-top: 20px;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Control de Puertos</h1>
    
    <h2>Puertos Abiertos:</h2>
    <table>
        <tr>
            <th>Puerto</th>
            <th>Protocolo</th>
        </tr>
        <?php
        // Parsear y mostrar la información de los puertos
        $puertos = explode(" ", trim($informacionPuertos));
        foreach ($puertos as $puerto) {
            // Separar el puerto y el protocolo
            list($numeroPuerto, $protocolo) = explode("/", $puerto);
    
            // Mostrar la información en la tabla
            echo "<tr><td>$numeroPuerto</td><td>$protocolo</td></tr>";
        }
        ?>
    </table>
    
    <h2>Realizar Acción</h2>
    <form action="index.php" method="post">
        <label for="puerto">Número de Puerto:</label>
        <input type="text" name="puerto" required>
        
        <label for="accion">Acción:</label>
        <select name="accion">
            <option value="add">Añadir</option>
            <option value="remove">Quitar</option>
        </select>

        <input type="submit" value="Enviar">
    </form>
    
    <?php if (isset($mensaje)) : ?>
        <h2>Resultado de la Operación</h2>
        <p><?php echo $mensaje; ?></p>
    <?php endif; ?>
</body>
</html>
