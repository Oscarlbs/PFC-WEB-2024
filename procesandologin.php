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
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .loading-screen {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            text-align: center;
            position: relative;
        }

        .loading-bar {
            width: 100%;
            height: 15px;
            background-color: #ddd;
            border-radius: 7.5px;
            overflow: hidden;
            position: relative;
            margin-bottom: 20px;
        }

        .loading-progress {
            width: 0;
            height: 100%;
            background-color: #77b6ea;
            position: absolute;
            top: 0;
            left: 0;
            animation: loadingAnimation 4s linear infinite;
        }

        @keyframes loadingAnimation {
            0% { width: 0; }
            50% { width: 100%; }
            100% { width: 0; }
        }

        .loading-text {
            font-size: 24px;
            color: #333;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-30px); }
            60% { transform: translateY(-15px); }
        }
    </style>
</head>
<body>
    <div class="loading-screen">
        <div class="loading-bar">
            <div class="loading-progress"></div>
        </div>
        <p class="loading-text">Iniciando sesión...</p>
    </div>

    <script>
        // Redireccionar después de 4 segundos (4000 milisegundos)
        setTimeout(function() {
            window.location.href = "index2.html"; // Reemplaza "index2.html" con la URL de la página a la que deseas redireccionar
        }, 2500);
    </script>
</body>
</html>
