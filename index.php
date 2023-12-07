<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Puertos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            color: #333;
        }
        form {
            max-width: 400px;
            margin: 20px 0;
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
    <form action="gestion_puertos.php" method="post">
        <label for="puerto">Número de Puerto:</label>
        <input type="text" name="puerto" required>
        
        <label for="accion">Acción:</label>
        <select name="accion">
            <option value="allow">Permitir</option>
            <option value="deny">Denegar</option>
        </select>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
