<?php
    include_once("conexao.php");

    if (!isset($_POST["id"]))
        header("location: index.php");

    $id = $_POST["id"];
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $cambio = $_POST["cambio"];
    $cor = $_POST["cor"];
    $tipo_combustivel = $_POST["tipo_combustivel"];
    $ano = $_POST["ano"];
    $motor = $_POST["motor"];
    $km = $_POST["km"];
    $descricao = $_POST["descricao"];

    $sql = "UPDATE carro SET marca='$marca', modelo='$modelo', cambio='$cambio', cor='$cor', tipo_combustivel='$tipo_combustivel', ano='$ano', motor='$motor', km='$km', descricao='$descricao' WHERE pk_carro = $id";

    mysqli_query($conn, $sql);

    if(mysqli_error($conn)=="")
        header("location: index.php");
    else
        echo mysqli_error($conn);
?>