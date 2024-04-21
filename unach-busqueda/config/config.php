<?php 

        $servername ="localhost";
        $database ="id20757300_ulises";
        $username ="id20757300_unachh";
        $password ="mike2928.A";
        $conn = new mysqli($servername, $username, $password, $database);

        if($conn->connect_error){
            die("error en la conexion" . $conn->conect_error);
        }

    ?>