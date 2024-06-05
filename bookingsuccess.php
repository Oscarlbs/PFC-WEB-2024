<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Status</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Roboto', sans-serif;
}

body {
    background: url("fondoporche.jpg") center center/cover no-repeat;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-attachment: fixed;
}

.container {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 10px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
    padding: 40px;
    max-width: 700px;
    width: 90%;
    text-align: center;
}

.container h1 {
    margin-bottom: 20px;
    font-size: 2.5rem;
    color: #333;
}

.container h2 {
    margin-bottom: 15px;
    font-size: 1.5rem;
    color: #555;
}

.button, .button a {
    display: inline-block;
    padding: 10px 25px;
    background: #FF2800; /* Color rojo Ferrari */
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
    font-size: 1rem;
    transition: background 0.4s ease;
}

.button:hover, .button a:hover {
    background: #CC2100; /* Color rojo Ferrari más oscuro al pasar el ratón */
}

.info {
    margin: 25px 0;
    font-size: 1.2rem;
    color: #444;
}

.user-greeting {
    font-size: 1.5rem;
    font-weight: bold;
    margin-bottom: 20px;
    color: #333;
}

.nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
}

.nav a {
    color: #ff7200;
    text-decoration: none;
    font-weight: bold;
    transition: color 0.4s ease;
}

.nav a:hover {
    color: #e65c00;
}

    </style>
</head>
<body>

<?php
    require_once('connection.php');
    session_start();
    $email = $_SESSION['email'];

    $sql = "SELECT * FROM booking WHERE EMAIL='$email' ORDER BY BOOK_ID DESC LIMIT 1";
    $result = mysqli_query($con, $sql);
    $booking = mysqli_fetch_assoc($result);

    if ($booking == null) {
        echo '<script>alert("NO HAY DETALLES DE LA RESERVA")</script>';
        echo '<script> window.location.href = "cardetails.php";</script>';
    } else {
        $sql2 = "SELECT * FROM users WHERE EMAIL='$email'";
        $result2 = mysqli_query($con, $sql2);
        $user = mysqli_fetch_assoc($result2);

        $car_id = $booking['CAR_ID'];
        $sql3 = "SELECT * FROM cars WHERE CAR_ID='$car_id'";
        $result3 = mysqli_query($con, $sql3);
        $car = mysqli_fetch_assoc($result3);
?>

<div class="container">
    <div class="nav">
    <button class="button" onclick="window.location.href='index2.html'">Inicio</button>
        <div class="user-greeting">Usuario: <?php echo $user['FNAME'] . " " . $user['LNAME']; ?></div>
    </div>
    <h1>¡Reserva realizada con éxito!</h1>
    <div class="info">
        <h2>Coche: <?php echo $car['CAR_NAME']; ?></h2>
        <h2>Número de días en alquiler: <?php echo $booking['DURATION']; ?></h2>
        <h2>Estado de la reserva: <?php echo $booking['BOOK_STATUS']; ?></h2>
        <div class="button"><a href="reservasclientes.php">Más información</a></div>
    </div>
</div>

<?php
    }
?>

</body>
</html>
