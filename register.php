<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .main {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .register h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333333;
            text-align: center;
        }
        .register form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333333;
        }
        .register form input[type="text"], 
        .register form input[type="email"], 
        .register form input[type="tel"], 
        .register form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px;
            border: 1px solid #cccccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .register form .btnn {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-align: center;
        }
        .register form .btnn:hover {
            background-color: #0056b3;
        }
        #back a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
            display: block;
            text-align: center;
            margin-bottom: 20px;
        }
        #back a:hover {
            color: #0056b3;
        }
        #message {
            font-size: 14px;
            color: #333333;
        }
        #message p {
            margin: 5px 0;
        }
        .valid {
            color: green;
        }
        .invalid {
            color: red;
        }
    </style>
</head>
<body>
    <div class="main">
        <div id="back"><a href="index.php">Inicio</a></div>
        <div class="register">
            <h2>Registro</h2>
            <form id="register" action="register.php" method="POST">
                <label>Nombre:</label>
                <input type="text" name="fname" placeholder="Ingrese su nombre" required>

                <label>Apellido:</label>
                <input type="text" name="lname" placeholder="Ingrese su apellido" required>

                <label>Correo electrónico:</label>
                <input type="email" name="email" placeholder="Ingrese un correo electrónico válido" required>
                
                <label>Número de matrícula:</label>
                <input type="text" name="lic" placeholder="Ingrese su número de matrícula" required>

                <label>Número de teléfono:</label>
                <input type="tel" name="ph" maxlength="10" onkeypress="return onlyNumberKey(event)" placeholder="Ingrese su número de teléfono" required>

                <label>Contraseña:</label>
                <input type="password" name="pass" maxlength="12" id="psw" placeholder="Ingrese su contraseña" required>
                
                <label>Confirmar contraseña:</label>
                <input type="password" name="cpass" placeholder="Confirme su contraseña" required>
                <div id="message">
                    <h3>La contraseña debe contener lo siguiente:</h3>
                    <p id="capital" class="invalid">Una <b>letra mayúscula</b></p>
                    <p id="number" class="invalid">Un <b>número</b></p>
                    <p id="length" class="invalid">Mínimo <b>8 caracteres</b></p>
                </div><p></p>
                <input type="submit" class="btnn" value="Registrar" name="regs">
            </form>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                require_once('connection.php');
                if(isset($_POST['regs'])) {
                    $fname = mysqli_real_escape_string($con, $_POST['fname']);
                    $lname = mysqli_real_escape_string($con, $_POST['lname']);
                    $email = mysqli_real_escape_string($con, $_POST['email']);
                    $lic = mysqli_real_escape_string($con, $_POST['lic']);
                    $ph = mysqli_real_escape_string($con, $_POST['ph']);
                    $pass = mysqli_real_escape_string($con, $_POST['pass']);
                    $cpass = mysqli_real_escape_string($con, $_POST['cpass']);
                    
                    if(empty($fname) || empty($lname) || empty($email) || empty($lic) || empty($ph) || empty($pass)) {
                        echo '<script>alert("Por favor, complete todos los campos.")</script>';
                    } else {
                        if($pass == $cpass) {
                            $sql_check_email = "SELECT * FROM users WHERE EMAIL='$email'";
                            $res = mysqli_query($con, $sql_check_email);
                            if(mysqli_num_rows($res) > 0) {
                                echo '<script>alert("¡El correo electrónico ya existe! ¡Presione aceptar para iniciar sesión!")</script>';
                                echo '<script>window.location.href = "iniciosesion.php";</script>';
                            } else {
                                $Pass = md5($pass);
                                $sql_insert_user = "INSERT INTO users (FNAME, LNAME, EMAIL, LIC_NUM, PHONE_NUMBER, PASSWORD) VALUES ('$fname', '$lname', '$email', '$lic', $ph, '$Pass')";
                                $result = mysqli_query($con, $sql_insert_user);
                                if($result) {
                                    echo '<script>window.location.href = "procesandouser.php";</script>';       
                                } else {
                                    echo '<script>alert("Por favor, verifique la conexión")</script>';
                                }
                            }
                        } else {
                            echo '<script>alert("¡La contraseña no coincide!")</script>';
                            echo '<script>window.location.href = "register.php";</script>';
                        }
                    }
                }
            }
            ?>
        </div>
    </div>
    <script>
        function onlyNumberKey(evt) {
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode;
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) {
                return false;
            }
            return true;
        }

        var myInput = document.getElementById("psw");
        var capital = document.getElementById("capital");
        var number = document.getElementById("number");
        var length = document.getElementById("length");

        myInput.onkeyup = function() {
            var upperCaseLetters = /[A-Z]/g;
            if(myInput.value.match(upperCaseLetters)) {  
                capital.classList.remove("invalid");
                capital.classList.add("valid");
            } else {
                capital.classList.remove("valid");
                capital.classList.add("invalid");
            }

            var numbers = /[0-9]/g;
            if(myInput.value.match(numbers)) {  
                number.classList.remove("invalid");
                number.classList.add("valid");
            } else {
                number.classList.remove("valid");
                number.classList.add("invalid");
            }
            
            if(myInput.value.length >= 8) {
                length.classList.remove("invalid");
                length.classList.add("valid");
            } else {
                length.classList.remove("valid");
                length.classList.add("invalid");
            }
        }
    </script>
</body>
</html>
