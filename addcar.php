<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMINISTRADOR</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-image: url("../images/regs.jpg");
            background-size: cover;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            display: flex; 
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            background-color: rgba(0, 0, 0, 0.7); 
            padding: 30px;
            border-radius: 15px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            width: 400px;
            text-align: center;
        }

        h2 {
            font-size: 28px;
            margin-bottom: 25px;
            letter-spacing: 1px;
        }

        label {
            display: block; 
            margin-bottom: 5px;
            font-size: 16px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"] {
            width: calc(100% - 20px); 
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #555;
            border-radius: 5px;
            background-color: #f0f0f0;
        }

        input[type="submit"] {
            background-color: #ff7200;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #ff5722; 
        }

        #back {
            background-color: #ff7200; 
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            position: absolute; 
            top: 20px;
            left: 20px;
            transition: background-color 0.3s;
        }

        #back:hover {
            background-color: #ff5722;
        }

        #back a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <button id="back"><a href="adminvehicle.php"><i class="fas fa-arrow-left"></i> INICIO</a></button>
    <div class="container">
        <h2>Ingrese Detalles del Nuevo Coche</h2>
        <form id="register" action="upload.php" method="POST" enctype="multipart/form-data">
            <label for="carname">Nombre del Coche:</label>
            <input type="text" name="carname" id="carname" placeholder="Ingrese el Nombre del Coche" required>

            <label for="ftype">Tipo de Combustible:</label>
            <input type="text" name="ftype" id="ftype" placeholder="Ingrese el Tipo de Combustible" required>

            <label for="capacity">Capacidad:</label>
            <input type="number" name="capacity" id="capacity" min="1" placeholder="Ingrese la Capacidad del Coche" required>

            <label for="price">Precio:</label>
            <input type="number" name="price" id="price" min="1" placeholder="Ingrese el Precio del Coche por Un " required>

            <label for="image">Imagen del Coche:</label>
            <input type="file" name="image" id="image" required>

            <input type="submit" class="btnn" value="AGREGAR COCHE" name="addcar">
        </form>
    </div>
</body>
</html>