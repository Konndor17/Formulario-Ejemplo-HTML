<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Datos Personales</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('https://source.unsplash.com/1600x900/?abstract'); /* Cambia la URL por la imagen que prefieras */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #fff;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
        h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="date"],
        select {
            width: calc(100% - 16px);
            padding: 8px;
            margin-bottom: 20px;
            border-radius: 4px;
            border: none;
            background-color: #555;
            color: #fff;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #d32f2f;
            color: #fff;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #ff5252;
        }
        /* Efecto de movimiento */
        input[type="submit"]:active {
            transform: translateY(2px);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Ingrese sus datos personales</h2>
        <form method="post">
            <label for="alias">Alias:</label>
            <input type="text" id="alias" name="alias" required><br>

            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br>

            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" required><br>

            <label for="email">Correo electrónico:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="telefono">Teléfono (WhatsApp):</label>
            <input type="text" id="lada" name="lada" placeholder="Lada" style="width: calc(30% - 16px);" required>
            <input type="tel" id="telefono" name="telefono" pattern="[0-9]{7,10}" placeholder="Número de teléfono" style="width: calc(70% - 16px);" required><br>

            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion"><br>

            <label for="trabajo">Lugar de trabajo:</label>
            <input type="text" id="trabajo" name="trabajo"><br>

            <label for="fecha_nacimiento">Fecha de nacimiento:</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required><br>

            <label for="sexo">Sexo:</label>
            <select id="sexo" name="sexo">
                <option value="masculino">Masculino</option>
                <option value="femenino">Femenino</option>
                <option value="otro">Otro</option>
            </select><br>

            <input type="submit" value="Guardar">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $alias = $_POST['alias'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $lada = $_POST['lada'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];
            $trabajo = $_POST['trabajo'];
            $fecha_nacimiento = $_POST['fecha_nacimiento'];
            $sexo = $_POST['sexo'];

            $datos = "Alias: $alias\nNombre: $nombre\nApellido: $apellido\nCorreo electrónico: $email\nTeléfono (WhatsApp): +$lada $telefono\nDirección: $direccion\nLugar de trabajo: $trabajo\nFecha de nacimiento: $fecha_nacimiento\nSexo: $sexo\n\n";

            $archivo = 'datos_personales.txt';

            $fp = fopen($archivo, 'a');

            if (fwrite($fp, $datos)) {
                echo "<p>Los datos se han guardado correctamente.</p>";
            } else {
                echo "<p>Ocurrió un error al intentar guardar los datos.</p>";
            }

            fclose($fp);
        }
        ?>
    </div>
</body>
</html>
