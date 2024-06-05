<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>MotosportClub</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
  

    <!-- Favicon -->
    <link href="images/autos_vigo-Photoroom.png" rel="icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
   
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #ece9e6 0%, #ffffff 100%);
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        .navbar {
            width: 100%;
            background: #333;
            padding: 10px 0;
            color: #fff;
        }

        .navbar .logo {
            display: inline-block;
            font-size: 22px;
            margin-left: 20px;
        }

        .navbar .menu {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .navbar .menu ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .navbar .menu ul li {
            margin: 0 15px;
        }

        .navbar .menu ul li a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
        }

        .navbar .menu ul li .nn {
            border: none;
            background: none;
        }

        .navbar .menu ul li img.circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .navbar .menu ul li .phello {
            color: #fff;
        }

        .container {
            max-width: 800px;
            width: 100%;
            margin: 20px auto;
            padding: 40px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        h1, h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input[type="text"],
        input[type="date"],
        input[type="tel"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
        
    </style>
</head>
<body>
<?php 
    require_once('connection.php');
    session_start();
 
    $carid = $_GET['id'];
    
    $sql = "SELECT * FROM cars WHERE CAR_ID='$carid'";
    $cname = mysqli_query($con, $sql);
    $email = mysqli_fetch_assoc($cname);
    
    $value = $_SESSION['email'];
    $sql = "SELECT * FROM users WHERE EMAIL='$value'";
    $name = mysqli_query($con, $sql);
    $rows = mysqli_fetch_assoc($name);
    $uemail = $rows['EMAIL'];
    $carprice = $email['PRICE'];
    
    if (isset($_POST['book'])) {
        $bplace = mysqli_real_escape_string($con, $_POST['place']);
        $bdate = date('Y-m-d', strtotime($_POST['date']));
        $phno = mysqli_real_escape_string($con, $_POST['ph']);
        $des = mysqli_real_escape_string($con, $_POST['des']);
        $rdate = date('Y-m-d', strtotime($_POST['rdate']));
        
        $startDate = new DateTime($bdate);
        $endDate = new DateTime($rdate);
        $duration = $startDate->diff($endDate)->days;
        
        if (empty($bplace) || empty($bdate) || empty($phno) || empty($des) || empty($rdate)) {
            echo '<script>alert("Por favor complete todos los campos")</script>';
        } else {
            if ($bdate < $rdate) {
                $price = ($duration * $carprice);
                $sql = "INSERT INTO booking (CAR_ID, EMAIL, BOOK_PLACE, BOOK_DATE, DURATION, PHONE_NUMBER, DESTINATION, PRICE, RETURN_DATE) VALUES ($carid, '$uemail', '$bplace', '$bdate', $duration, $phno, '$des', $price, '$rdate')";
                $result = mysqli_query($con, $sql);
                
                if ($result) {
                    $_SESSION['email'] = $uemail;
                    header("Location: bookingsuccess.php");
                } else {
                    echo '<script>alert("Por favor verifique la conexión")</script>';
                }
            } else {
                echo '<script>alert("Por favor ingrese una fecha de devolución correcta")</script>';
            }
        }
    }
?>
<div class="navbar">
    <div class="icon">
        <h2 class="logo">CaRs</h2>
    </div>
    <div class="menu">
        <ul>
            <li><a href="index2.html">Inicio</a></li>
            <li><a href="aboutus.html">Sobre Nosotros</a></li>
            <li><a href="contactus.php">Contacto</a></li>
            <li><button class="nn"><a href="index.html">Cerrar Sesión</a></button></li>
            <li><a class="phello">Bienvenido! &nbsp;<a id="pname"><?php echo $rows['FNAME'] . " " . $rows['LNAME'] ?></a></></li>
        </ul>
    </div>
</div>

<div class="container">
    <h1>Reserva</h1>
    <form id="register" method="POST">
        <h2>Vehículo seleccionado: <?php echo $email['CAR_NAME'] ?></h2>
        <label>Ubicacion para recoger:</label>
        <input type="text" name="place" placeholder="Escribe tu destino">
        
        <label>Fecha de reserva:</label>
        <input type="date" name="date" id="datefield" placeholder="Selecciona la fecha de reserva">
        
        <label>Número de teléfono:</label>
        <input type="tel" name="ph" maxlength="10" placeholder="Introduce tu número de teléfono">
        
        <label>Destino:</label>
        <input type="text" name="des" placeholder="Introduce el destino">
        
        <label>Fecha de devolución:</label>
        <input type="date" name="rdate" id="dfield" placeholder="Introduce la duración">
        
        <input type="submit" class="btnn" value="RESERVAR" name="book">
    </form>
</div>

<script>
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();
    if (dd < 10) {
        dd = '0' + dd
    }
    if (mm < 10) {
        mm = '0' + mm
    }

    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById("datefield").setAttribute("min", today);
    document.getElementById("dfield").setAttribute("min", today);
</script>
</body>
</html>
