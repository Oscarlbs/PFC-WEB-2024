<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión del Administrador</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 400px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
        }

        .container h2 {
            color: #333;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #666;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus {
            border-color: #ff7200;
            outline: none;
        }

        .btn {
            background-color: black;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 12px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

       

        .link {
            margin-top: 20px;
            color: #666;
            font-size: 14px;
        }

        .link a {
            color: #ff7200;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sesión del Administrador</h1>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="adid">Usuario</label>
                <input type="text" id="adid" name="adid" placeholder="Introduce tu usuario">
            </div>
            <div class="form-group">
                <label for="adpass">Contraseña</label>
                <input type="password" id="adpass" name="adpass" placeholder="Introduce tu contraseña">
            </div>
            <button type="submit" name="adlog" class="btn">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>


<?php
    require_once('connection.php');
    if(isset($_POST['adlog'])){
        $id=$_POST['adid'];
        $pass=$_POST['adpass'];
        
        
        if(empty($id)|| empty($pass))
        {
            echo '<script>alert("Por favor, completa los espacios en blanco")</script>';
        }

        else{
            $query="select * from admin where ADMIN_ID='$id'";
            $res=mysqli_query($con,$query);
            if($row=mysqli_fetch_assoc($res)){
                $db_password = $row['ADMIN_PASSWORD'];
                if($pass  == $db_password)
                {
                    
                    // session_start();
                    // $_SESSION['email'] = $email;
                    echo '<script>alert("¡Bienvenido ADMINISTRADOR!");</script>';
                    header("location: admindash.php");
                    
                }
                else{
                    echo '<script>alert("Introduce una contraseña válida")</script>';
                }
            }
            else{
                echo '<script>alert("Introduce un correo electrónico válido")</script>';
            }
        }
    }

?>




