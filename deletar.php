<?php
    include_once("conexao.php");

    if(!isset($_GET["id"]))
        header("location: index.php");

    if(empty($_GET["id"]))
        header("location: index.php");

    $id = $_GET["id"];

    $sql = "DELETE FROM carro WHERE pk_carro=$id";

    mysqli_query($conn, $sql);

    if(mysqli_error($conn)==""){
        $status = "ok";
        $msg = "Registo Apagado com Sucesso";
    }
    else {
        $status = "erro";
        $msg = "Erro:". mysqli_error($conn); 
    }
    header("location: index.php?status=$status&msg=$msg");
?>