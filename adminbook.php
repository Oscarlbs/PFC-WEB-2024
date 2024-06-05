<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMINISTRADOR</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #ff7200;
            color: #fff;
        }

        .navbar .logo {
            font-size: 35px;
            font-weight: bold;
        }

        .navbar .menu ul {
            list-style: none;
            display: flex;
        }

        .navbar .menu ul li {
            margin-left: 20px;
        }

        .navbar .menu ul li a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            transition: color 0.3s;
        }

        .navbar .menu ul li a:hover {
            color: #333;
        }

        .header {
            text-align: center;
            color: #333;
            padding: 20px;
            border-bottom: 2px solid #f4f4f9;
            margin-bottom: 20px;
        }

        .content-table {
            width: 100%;
            border-collapse: collapse;
        }

        .content-table thead {
            background-color: black;
            color: #fff;
        }

        .content-table th,
        .content-table td {
            padding: 15px;
            text-align: left;
        }

        .content-table th {
            text-transform: uppercase;
        }

        .content-table tbody tr:nth-child(even) {
            background-color: #f4f4f9;
        }

        .content-table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .content-table tbody tr {
            transition: background-color 0.3s;
        }

        .content-table .but a {
            text-decoration: none;
            color: #fff;
            background-color: #ff7200;
            padding: 5px 10px;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
        }

        .content-table .but a:hover {
            background-color: #333;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container">
       
        <h1 class="header">Reservas</h1>
        <table class="content-table">
            <thead>
                <tr>
                    <th>ID del Coche</th>
                    <th>Correo Electrónico</th>
                    <th>Lugar de Reserva</th>
                    <th>Fecha de Reserva</th>
                    <th>Duración</th>
                    <th>Número de Teléfono</th>
                    <th>Destino</th>
                    <th>Fecha de Devolución</th>
                    <th>Estado de Reserva</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                require_once('connection.php');
                $query = "SELECT * FROM booking ORDER BY BOOK_ID DESC";
                $queryy = mysqli_query($con, $query);
                while ($res = mysqli_fetch_array($queryy)) {
                ?>
                    <tr class="active-row">
                        <td><?php echo $res['CAR_ID']; ?></td>
                        <td><?php echo $res['EMAIL']; ?></td>
                        <td><?php echo $res['BOOK_PLACE']; ?></td>
                        <td><?php echo $res['BOOK_DATE']; ?></td>
                        <td><?php echo $res['DURATION']; ?></td>
                        <td><?php echo $res['PHONE_NUMBER']; ?></td>
                        <td><?php echo $res['DESTINATION']; ?></td>
                        <td><?php echo $res['RETURN_DATE']; ?></td>
                        <td><?php echo $res['BOOK_STATUS']; ?></td>
                        
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>
