<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suma Total de Votaciones</title>
    <link rel="stylesheet" href="../Color/votos.css">
    <style>
        /* Estilo para centrar el texto del total de votos */
        .total-votos-section {
            text-align: center;
            margin-top: 20px;
            color: white; /* Cambiar el color del texto a blanco */

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
    <h1>Resultados de las votaciones</h1>
    <ul class="votos-list">
        <?php
        // Conexión a la base de datos
        $conn = new mysqli("localhost", "root", "", "votaciones");
        
        // Verificar conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Variable para almacenar el total de votos acumulados
        $total_votos_acumulados = 0;

        // Obtener el conteo de votos para todos los aspirantes
        $query = "SELECT nombre, votos FROM mesa2";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $total_votos_acumulados += $row["votos"];
                
                echo '<li class="voto-item" data-aspirante="' . $row["nombre"] . '">';
                echo '<div class="aspirante-name">' . $row["nombre"] . '</div>';
                echo '<div class="votos-count">' . $row["votos"] . ' votos</div>';
                echo '</li>';
            }
        } else {
            echo "0 resultados.";
        }
        ?>
    </ul>

    <!-- Sección para mostrar el total de votos acumulados -->
    <div class="total-votos-section">
        <h2>Total de votos:</h2>
        <p><?php echo $total_votos_acumulados; ?> votos</p>
    </div>

    <!-- Secciones de imágenes -->
    <div>
        <img class="liberal" src="../Image/LL1.png" alt="">
    </div>
    <div>
        <img class="liberal1" src="../Image/LL1.png" alt="">
    </div>
    <div>
        <img class="verde" src="../Image/partidoverde.png" alt="">
    </div>
    <div>
        <img class="verde1" src="../Image/partidoverde.png" alt="">
    </div>
    <div>
        <img class="centro" src="../Image/centrod.png" alt="">
    </div>
    <div>
        <img class="centro1" src="../Image/centrod.png" alt="">
    </div>
    <div>
        <img class="carlo" src="../Image/calos.jpg" alt="">
    </div>
    <div>
        <img class="cris" src="../Image/cr7.jpg" alt="">
    </div>
    <div>
        <img class="ney" src="../Image/Ney.jpg" alt="">
    </div>
    <div>
        <img class="messi" src="../Image/10.jpg" alt="">
    </div>
    <div>
        <img class="zidane" src="../Image/zidane.jpg" alt="">
    </div>
    <div>
        <img class="pep" src="../Image/Pep.jpg" alt="">
    </div>


    <?php
    // Cerrar la conexión a la base de datos
    $conn->close();
    ?>
    
</body>
</html>
