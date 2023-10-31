<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Color/jurado.css">
    <style>
        body {
            background-image: url("../Image/fondo.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
</head>

<body>
    <P class="Pmesa1">Jurado Mesa #1</P>

    <button onclick="jurado_mesa1()">
        <img src="../Image/jurado1.jpg" alt="Mesa Image" class="mesa1">
    </button>

    <p class="Pmesa2">Jurado Mesa #2</p>

    <button onclick="jurado_mesa2()">
        <img src="../Image/jurado2.jpeg" alt="Mesa Image" class="mesa2">
    </button>
    <p class="Pmesa3">Jurado Mesa #3</p>
    

    <button onclick="jurado_mesa3()">
        <img src="../Image/jurado3.jpg" alt="Mesa Image" class="mesa3">
    </button>
    <script src="jurado.js"></script>
    <p class="Pjurado">Resultados votaciones</p>
    <button onclick="resultados()">
        <img src="../Image/resultado.jpg" alt="Mesa Image" class="mesa4">
    </button>
    <script src="../Java/jurado.js"></script>
</body>

</html>
