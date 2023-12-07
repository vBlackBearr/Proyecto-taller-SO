<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $puerto = $_POST["puerto"];
    $accion = $_POST["accion"];

    // Validar y sanitizar la entrada del usuario (puedes implementar según tus necesidades)

    // Ejecutar comandos de firewalld
    $comando = "firewall-cmd --$accion-port=$puerto --permanent";
    $resultado = shell_exec($comando);

    // Recargar firewalld para aplicar los cambios
    $comando_recarga = "firewall-cmd --reload";
    shell_exec($comando_recarga);

    $mensaje = "Comando ejecutado: $comando";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de la Operación</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h2 {
            color: #333;
        }
    </style>
</head>
<body>
    <h2>Resultado de la Operación</h2>
    <?php if (isset($mensaje)) : ?>
        <p><?php echo $mensaje; ?></p>
    <?php else : ?>
        <p>No se ha recibido información válida.</p>
    <?php endif; ?>
</body>
</html>
