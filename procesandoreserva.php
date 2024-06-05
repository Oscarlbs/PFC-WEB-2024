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
            margin: 0;
            overflow: hidden; /* Evita que el video se desborde */
        }

        /* Estilo para el video de fondo */
        video {
            position: fixed; /* Fija el video en la ventana */
            top: 0;
            left: 0;
            min-width: 100%; /* Asegura que el video cubra toda la pantalla */
            min-height: 100%;
            z-index: -1; /* Coloca el video detrás de otros elementos */
        }

        .loading-screen {
            background-color: rgba(255, 255, 255, 0.8); /* Fondo semitransparente para el contenido */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            position: relative;
            z-index: 1; /* Asegura que el contenido esté por encima del video */
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
    <!-- Video de fondo -->
    <video autoplay muted loop id="bgvideo">
        <source src="mclaren.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <div class="loading-screen">
        <div class="loading-bar">
            <div class="loading-progress"></div>
        </div>
        <p class="loading-text">Buscando vehículos disponibles para reservar...</p>
        <p class="loading-text">Por favor espere...</p>
    </div>

    <script>
    // Comprobación de la carga del video
    var video = document.getElementById('bgvideo');
    video.onerror = function() {
        console.error('Error al cargar el video.');
    };

    // Generar un tiempo aleatorio entre 2000 ms (2 segundos) y 5000 ms (5 segundos)
    var randomTime = Math.floor(Math.random() * (5000 - 2000 + 1)) + 2000;

    
        // Redireccionar después de 3 segundos (3000 milisegundos)
        setTimeout(function() {
            window.location.href = "cardetails.php"; // Reemplaza "otra_pagina.php" con la URL de la página a la que deseas redireccionar
        }, 2500);
    </script>
</body>
</html>
