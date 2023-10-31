<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Color/House.css">
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
    <p class="Pmesa1">Mesa #1</p>

    <button onclick="Mesa1()">
        <img src="../Image/jovenes.jpg" alt="Mesa Image" class="mesa1">
    </button>

    <p class="Pmesa2">Mesa #2</p>

    <button onclick="Mesa2()">
        <img src="../Image/viejitos.jpg" alt="Mesa Image" class="mesa2">
    </button>
    <p class="Pmesa3">Mesa #3</p>
    
    <button onclick="Mesa3()">
        <img src="../Image/adulto.jpg" alt="Mesa Image" class="mesa3">
    </button>

    <p class="Pjurado">Jurado</p>

    <button onclick="jurados()">
        <img src="../Image/jurado.png" alt="Mesa Image" class="jurado">
    </button>
    <script src="../Java/house.js"></script>
</body>

</html>
