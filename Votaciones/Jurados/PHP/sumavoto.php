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
    <h1 class="titulo">Resultados de las votaciones</h1>
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

        // Recopilar una lista de todos los aspirantes de las mesas
        $query_aspirantes = "SELECT DISTINCT nombre FROM mesa1 UNION SELECT DISTINCT nombre FROM mesa2 UNION SELECT DISTINCT nombre FROM mesa3";
        $result_aspirantes = $conn->query($query_aspirantes);

        if ($result_aspirantes->num_rows > 0) {
            while($row_aspirante = $result_aspirantes->fetch_assoc()) {
                $nombre_aspirante = $row_aspirante["nombre"];
                
                // Sumar los votos del aspirante en las tres mesas
                $query_suma = "SELECT (IFNULL((SELECT votos FROM mesa1 WHERE nombre = '$nombre_aspirante'), 0) + IFNULL((SELECT votos FROM mesa2 WHERE nombre = '$nombre_aspirante'), 0) + IFNULL((SELECT votos FROM mesa3 WHERE nombre = '$nombre_aspirante'), 0)) as total_votos";
                $result_suma = $conn->query($query_suma);
                $row_suma = $result_suma->fetch_assoc();
                
                // Acumular los votos
                $total_votos_acumulados += $row_suma["total_votos"];

                echo '<li class="voto-item" data-aspirante="' . $nombre_aspirante . '">';
                echo '<div class="aspirante-name">' . $nombre_aspirante . '</div>';
                echo '<div class="voto-count">' . $row_suma["total_votos"] . ' votos</div>';
                echo '</li>';
            }
        } else {
            echo "No hay resultados.";
        }

        $conn->close();
        ?>
    </ul>

    <!-- Sección aparte para mostrar el total de votos acumulados -->
    <div class="total-votos-section">
        <h2>Total de votos:</h2>
        <p><?php echo $total_votos_acumulados; ?> votos</p>
    </div>
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
</body>
</html>
