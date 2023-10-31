<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votación</title>
    <link rel="stylesheet" href="../Color/votaciones.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* Estilo para centrar el título */
        .titulo-centrado {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 40px;
            color: white; /* Cambia el color del texto a blanco */

        }
        body {
            background-image: url("../Image/fondo.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
</head>
<body>
    <!-- Título centrado -->
    <h1 class="titulo-centrado">Jurado Mesa #2</h1>
    
    <form id="formularioVoto">
        <input type="text" id="identificacion" name="identificacion" class="input" oninput="this.value = this.value.replace(/[^0-9]/g, ''); if (this.value.length > 10) this.value = this.value.slice(0,10);" maxlength="10" required>
        <button type="submit" class="boton1">Ingresar</button>
    </form>

    <script>
       $("#formularioVoto").submit(function(e) {
    e.preventDefault();

    $.post("vcedulam2.php", $(this).serialize(), function(response) {
        if (response.error) {
            alert(response.message);
        } else {
            window.location.href = response.redirectUrl;
        }
    }, "json");
});
    </script>
</body>
</html>
