<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="utf-8">
    <title>MotosportClub</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
 

    <!-- Favicon -->
    <link href="images/autos_vigo.png" rel="icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #ece9e6 0%, #ffffff 100%);
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #2B2E4A;
            padding: ;
        }

        .navbar-brand {
            color: #ffffff;
            font-weight: bold;
            font-size: 30px;
        }

        .navbar-nav .nav-link {
            color: #ffffff;
            margin-left: 20px;
            transition: color 0.3s;
        }

        .navbar-nav .nav-link:hover {
            color: #ffffff;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 40px 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .car {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .car:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        }

        .car-image img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .car-details {
            padding: 20px;
            text-align: center;
        }

        .car-details h2 {
            margin-bottom: 10px;
            font-size: 24px;
            color: #333;
        }

        .car-details h3 {
            margin-bottom: 5px;
            font-size: 18px;
            color: #666;
        }

        .car-details p {
            margin-bottom: 15px;
            font-size: 16px;
            color: #555;
        }

        .price {
            font-size: 20px;
            color: #ff7200;
            margin-top: 10px;
        }

        .book-now-btn {
            display: inline-block;
            padding: 12px 25px;
            background-color: #ff7200;
            color: white;
            border: none;
            border-radius: 25px;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.4s;
        }

        .book-now-btn:hover {
            background-color: #e65c00;
        }
    </style>
</head>
<body>



<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#">MotosportClub</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index2.html">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="aboutus.html">Sobre nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contactus.php">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Log out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>



<div class="container">
    <?php
    require_once('connection.php');
    session_start();

    $value = $_SESSION['email'];
    $_SESSION['email'] = $value;

    $sql = "select * from users where EMAIL='$value'";
    $name = mysqli_query($con, $sql);
    $rows = mysqli_fetch_assoc($name);
    $sql2 = "select * from cars where AVAILABLE='Y'";
    $cars = mysqli_query($con, $sql2);

    while ($result = mysqli_fetch_array($cars)) {
        ?>
        <div class="car">
            <div class="car-image">
                <img src="images/<?php echo $result['CAR_IMG'] ?>" alt="<?php echo $result['CAR_NAME'] ?>">
            </div>
            <div class="car-details">
                <h2><?php echo $result['CAR_NAME'] ?></h2>
                <h3>Combustible: <?php echo $result['FUEL_TYPE'] ?></h3>
                <p>Precio diario: €<?php echo $result['PRICE'] ?></p>
                <a href="booking.php?id=<?php echo $result['CAR_ID'] ?>" class="book-now-btn">RESERVAR</a>
            </div>
        </div>
        <?php
    }
    ?>
</div>

</body>
</html>
