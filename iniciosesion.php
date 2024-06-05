<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f3f3;
        }

        .container {
            max-width: 400px;
            margin: 100px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .logo {
            display: block;
            margin: 10 auto;
            margin-left: 30px;
            width: 300px; /* Ajuste el tamaño del logo según su preferencia */
            height: auto;
            margin-bottom: 20px;
        }

        .form-input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }

        .form-btn {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
        }

        .form-btn:hover {
            background-color: #0056b3;
        }

        .form-footer {
            text-align: center;
            margin-top: 20px;
        }

        .form-footer a {
            color: #007bff;
            text-decoration: none;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }

        .error-msg {
            color: red;
         
            text-align: center;
            margin-top: 30px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="container">
        <img src="images/logo.png" alt="Logo" class="logo">
        <form method="POST" action="">
            <label for="email" class="form-label">Correo:</label>
            <input type="email" name="email" id="email" placeholder="Introduce correo" class="form-input" required>
            <label for="pass" class="form-label">Contraseña:</label>
            <input type="password" name="pass" id="pass" placeholder="Introduce contraseña" class="form-input" required>
            <button type="submit" name="login" class="form-btn">Iniciar Sesión</button>
        </form>
        <div class="form-footer">
            ¿No tienes una cuenta? <a href="register.php">Regístrate aquí</a>
        </div>
        <div class="form-footer">
            ¿Administrador? <a href="adminlogin.php">Inicia sesión aquí</a>
        </div>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            require_once('connection.php');

            $email = $_POST['email'];
            $pass = $_POST['pass'];

            if (empty($email) || empty($pass)) {
                echo '<p class="error-msg">Por favor, complete todos los campos.</p>';
            } else {
                $query = "SELECT * FROM users WHERE EMAIL='$email'";
                $res = mysqli_query($con, $query);
                if ($row = mysqli_fetch_assoc($res)) {
                    $db_password = $row['PASSWORD'];
                    if (md5($pass) == $db_password) {
                        session_start();
                        $_SESSION['email'] = $email;
                        header("location: procesandologin.php");
                    } else {
                        echo '<p class="error-msg">Contraseña incorrecta.</p>';
                    }
                } else {
                    echo '<p class="error-msg">Correo electrónico no registrado.</p>';
                }
            }
        }
        ?>
    </div>
</body>

</html>
