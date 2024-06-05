<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loading Screen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .loading-screen {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            position: relative;
        }

        .loading-bar {
            width: 100%;
            height: 10px;
            background-color: #ddd;
            border-radius: 5px;
            overflow: hidden;
            position: relative;
        }

        .loading-progress {
            width: 0;
            height: 100%;
            background-color: #77b6ea;
            position: absolute;
            top: 0;
            left: 0;
            animation: loadingAnimation 2s linear infinite; /* Animación de la barra de carga */
        }

        @keyframes loadingAnimation {
            0% { width: 0; }
            50% { width: 50%; }
            100% { width: 100%; }
        }

        .loading-text {
            font-size: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="loading-screen">
        <div class="loading-bar">
            <div class="loading-progress"></div>
        </div>
        <p class="loading-text">Procesando reserva...</p>
    </div>

    <script>
        // Redireccionar después de 3 segundos (3000 milisegundos)
        setTimeout(function() {
            window.location.href = "bookingsuccess.php"; // Reemplaza "otra_pagina.php" con la URL de la página a la que deseas redireccionar
        }, 4000);
    </script>
</body>
</html>
