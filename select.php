<?php
include_once("conexao.php"); 

$sql = "select * from carro";

$query = mysqli_query($conn, $sql);

// echo "<pre>";
// var_dump($query);
// echo "</pre>";

// while($array = mysqli_fetch_assoc($query)){
// echo "<pre>";
// var_dump($array);
// echo "</pre>";
// }

while ($row = mysqli_fetch_assoc($query)){
    echo $row['pk_carro'] . " - " . $row['marca'] . " - " . $row['modelo'] . "<br>";
}

mysqli_close($conn);

?>