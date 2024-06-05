<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COCHES</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
        }

        .navbar {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 10px 0;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 20px;
        }

        .header {
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 28px;
            margin-bottom: 10px;
        }

        .add-btn {
            background-color: black;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .add-btn:hover {
            background-color: black;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: black;
            color: #fff;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .delete-btn {
            background-color: #ff3333;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 3px;
            font-size: 14px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .delete-btn:hover {
            background-color: #ff6666;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <div class="header">
            
            
            <a href="addcar.php" class="add-btn">Añadir vehículo</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID VEHÍCULO</th>
                    <th>FABRICANTE</th>
                    <th>COMBUSTIBLE</th>
                    <th>CAPACIDAD</th>
                    <th>PRECIO</th>
                    <th>DISPONIBILIDAD</th>
                    <th>ELIMINAR</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once('connection.php');
                $query = "SELECT * FROM cars";
                $queryy = mysqli_query($con, $query);
                while ($res = mysqli_fetch_array($queryy)) {
                    ?>
                    <tr>
                        <td><?php echo $res['CAR_ID']; ?></td>
                        <td><?php echo $res['CAR_NAME']; ?></td>
                        <td><?php echo $res['FUEL_TYPE']; ?></td>
                        <td><?php echo $res['CAPACITY']; ?></td>
                        <td><?php echo $res['PRICE']; ?></td>
                        <td><?php echo $res['AVAILABLE'] == 'Y' ? 'Si' : 'No'; ?></td>
                        <td><a href="deletecar.php?id=<?php echo $res['CAR_ID']; ?>" class="delete-btn">Eliminar vehículo</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
