<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMINISTRATOR</title>
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
            max-width: 1200px;
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
            background-color: red;
            padding: 5px 10px;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
        }

        .content-table .but a:hover {
            background-color: red;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container">
        
        <h1 class="header">NUESTROS CLIENTES</h1>
        <table class="content-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Número de matrícula</th>
                    <th>Número de teléfono</th>
                    <th>Eliminar usuarios</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once('connection.php');
                $query = "SELECT * FROM users";
                $queryy = mysqli_query($con, $query);
                while ($res = mysqli_fetch_array($queryy)) {
                ?>
                    <tr>
                        <td><?php echo $res['FNAME'] . " " . $res['LNAME']; ?></td>
                        <td><?php echo $res['EMAIL']; ?></td>
                        <td><?php echo $res['LIC_NUM']; ?></td>
                        <td><?php echo $res['PHONE_NUMBER']; ?></td>
                        <td><button type="submit" class="but"><a href="deleteuser.php?id=<?php echo $res['EMAIL'] ?>">Elminar usuario</a></button></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>
