<?php
    include_once("conexao.php");

    if (!isset($_POST["marca"]))
        header("location: index.php");

    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $cambio = $_POST["cambio"];
    $cor = $_POST["cor"];
    $tipo_combustivel = $_POST["tipo_combustivel"];
    $ano = $_POST["ano"];
    $motor = $_POST["motor"];
    $km = $_POST["km"];
    $descricao = $_POST["descricao"];
    $nome = $_POST["nome"];

    $sql = "INSERT INTO carro(marca, modelo, cambio, cor, tipo_combustivel, ano, motor, km, descricao, fk_aluno)
    VALUES('$marca', '$modelo', '$cambio', '$cor', '$tipo_combustivel', $ano, $motor, $km, '$descricao', '$nome')";

    mysqli_query($conn, $sql);

    if(mysqli_error($conn)==""){
        $status = "ok";
        $msg = "Registo Incluido com Sucesso";
    }
    else {
        $status = "erro";
        $msg = "Erro:". mysqli_error($conn); 
    }
    header("location: index.php?status=$status&msg=$msg");

?>