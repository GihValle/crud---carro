<?php
    $servername = "localhost";
    $data_base = "quintafeira";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($servername, $username, $password, $data_base);

    if(!$conn){
        die("Falha na conexão " . mysqli_connect_error());
    }

?>