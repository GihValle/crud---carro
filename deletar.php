<?php
    include_once("conexao.php");

    try {
        if(!isset($_GET["id"]) || empty($_GET["id"])) 
            //Confere se a informação está SETADA | CRIADA
            // ! = significa NÃO
            throw new Exception('Não foi informado o usuário', 1);

        $id = base64_decode($_GET["id"]);
        $sql = "DELETE FROM aluno WHERE pk_pessoa=$id";
        mysqli_query($conn, $sql);

        if(mysqli_error($conn) != "")
            throw new Exception('Não foi possível excluir o registro', 2);

        echo $status = base64_encode("ok");
        echo $msg = base64_encode("Registo Apagado com Sucesso");

        header("location: index.php?status=$status&msg=$msg");
    }

    catch(Exception $e) {
        // echo "<pre>";
        // var_dump($e);
        // echo "</pre>";
        // exit;

        // if ($e->getCode()==1){
            $status = base64_encode("erro");
            $msg = base64_encode("Erro: ". $e->getMessage());
        // }
        header("location: index.php?status=$status&msg=$msg");
    }

    finally{
        mysqli_close($conn);
    }

    // if(mysqli_error($conn)==""){
    //     $status = "ok";
    //     $msg = "Registo Apagado com Sucesso";
    // }
    // else {
    //     $status = "erro";
    //     $msg = "Erro:". mysqli_error($conn); 
    // }
?>