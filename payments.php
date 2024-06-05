<!DOCTYPE html>
<html>
<head>
    <title>Página de Pagos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<?php
$error = "";
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si todos los campos están cubiertos
    if (!empty($_POST['nombre']) && !empty($_POST['tarjeta']) && !empty($_POST['fecha']) && !empty($_POST['cvv'])) {
        // Todos los campos están cubiertos, redirigir a la siguiente página
        header("Location: procesandopagos.php");
        exit;
    } else {
        // Mostrar mensaje de error si algún campo está vacío
        $error = "Por favor, complete todos los campos.";
    }
}
?>

<div class="container">
    <h2>Formulario de Pago</h2>
    <?php if ($error) echo "<p class='error-message'>$error</p>"; ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="nombre">Nombre en la Tarjeta:</label>
        <input type="text" id="nombre" name="nombre">

        <label for="tarjeta">Número de Tarjeta:</label>
        <input type="text" id="tarjeta" name="tarjeta">

        <label for="fecha">Fecha de Expiración:</label>
        <input type="text" id="fecha" name="fecha">

        <label for="cvv">CVV:</label>
        <input type="text" id="cvv" name="cvv">

        <input type="submit" value="Pagar">
    </form>
</div>

</body>
</html>
