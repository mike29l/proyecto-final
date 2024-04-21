<?php
include 'config/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNACH</title>
    <link rel="shortcut icon" href="descarga.jpeg">
    <style>
        body {
            margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-image: url('fondo.gif'); /* Reemplaza 'ruta/a/tu/gif/fondo.gif' con la ruta de tu GIF animado */
    background-color: black; /* Color de fondo de respaldo */
    background-size: cover;
    background-position: center;
        }

        .contenedor {
            border-radius: 20px;
            padding: 40px;
            max-width: 400px;
            width: 100%;
            text-align: center; /* Centrar el contenido horizontalmente */
        }
        .titulo{
    display: block;
    width: 90%;
    padding: 10px;
    margin: 10px;
    border-radius: 10px;
    color:transparent;
    background-clip:text;
    background: linear-gradient(#1497be,#1c2aec);
    -webkit-background-clip:text;
    -moz-background-clip:text;
    animation: text 5s linear infinite;
}
@keyframes text{
    0%{
      filter: hue-rotate(0deg);
    }
    100%{
      filter:hue-rotate(360deg);
    }
}

        .text {
            margin-bottom: 20px;
            padding: 10px 20px;
            background-color: #e1e1d5;
            border-radius: 20px;
            border: none;
            width: calc(100% - 40px);
        }

        .text::placeholder {
            color: black;
            padding-left: 50px;
        }

        .b{
            color: black;
  border: 2px solid rgb(216, 2, 134);
  border-radius: 2px;
  padding: 18px 36px;
  display: inline-block;
  font-family: "Lucida Console", Monaco, monospace;
  font-size: 14px;
  letter-spacing: 1px;
  cursor: pointer;
  box-shadow: inset 0 0 0 0 #D80286;
  -webkit-transition: ease-out 0.4s;
  -moz-transition: ease-out 0.4s;
  transition: ease-out 0.4s;
}
.b:hover {
    box-shadow: inset 0 0 0 50px #D80286;
}

.data-container{
  background:#ffebee;
  height:100vh;
  display:flex;
  justify-content:center;
  align-items:center;
}



        .resultados {
            margin-top: 20px;
            text-align: left;
            color: white;
        }

        @media screen and (max-width: 500px) {
            
            .contenedor {
                width: 90%;
            }
            .b {
                color: black;
  border: 2px solid rgb(216, 2, 134);
  border-radius: 2px;
  padding: 18px 36px;
  display: inline-block;
  font-family: "Lucida Console", Monaco, monospace;
  font-size: 14px;
  letter-spacing: 1px;
  cursor: pointer;
  box-shadow: inset 0 0 0 0 #D80286;
  -webkit-transition: ease-out 0.4s;
  -moz-transition: ease-out 0.4s;
  transition: ease-out 0.4s;
}

.b:hover {
    box-shadow: inset 0 0 0 50px #D80286;
}
        }
    </style>
</head>
<body>

<div class="contenedor">
    <form action="" method="GET">
        <p class="titulo">POR LA CONCIENCIA DE LA NECESIDAD DE SERVIR</p>
        <div class="imagen">
            <img src="descarga.jpeg" width="100" alt="Logo UNACH">
        </div>
        <input type="text" class="text" name="busqueda" placeholder="Ingrese la MATRICULA"><br><br>
        <input type="submit" class="b" name="enviar" value="Buscar"><br><br>
    </form>
    <?php 
    if(isset($_GET['enviar'])) {
        if(!empty($_GET['busqueda'])) {
            $busqueda = $_GET['busqueda'];
            $consulta = $conn->query("SELECT * FROM alumnos WHERE matricula = '$busqueda'");

            if($consulta->num_rows > 0){
                echo "<div class='resultados'>";
                while($row = $consulta->fetch_assoc()){
                    echo "Nombre del Alumno: " . $row["nombre"] . "<br>" . " Carrera actual: " . $row["carrera"] . "<br>" . " Matricula: " . $row["matricula"] . "<br>";
                    if(!empty($row['foto'])) {
                        echo '<img src="' . $row['foto'] . '" alt="Foto del alumno" width="300" height="250"><br>';
                    }
                }
                echo "</div>";
            } else {
                echo "<div class='resultados'>No está registrado $busqueda en la institución.</div>";
            }
        } else {
            echo "<div class='resultados'>No se ingresó ninguna búsqueda.</div>";
        }
        $conn->close();
    }
    ?>
</div>

</body>

</html>
