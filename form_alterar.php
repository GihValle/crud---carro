<?php
    include_once("conexao.php");

    if(!isset($_GET["id"]))
        header("location: index.php");

    if($_GET["id"]=="")
        header("location: index.php");

    $id = $_GET["id"];
    
    $sql = "SELECT pk_carro, marca, modelo, cambio, cor, tipo_combustivel, ano, motor, km, descricao, fk_aluno FROM carro WHERE pk_carro=".$id;
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);

    $sql = "SELECT pk_pessoa, nome FROM ALUNO";
    $queryNome = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>CRUD - Create</title>
</head>
<body>
    <div class="container">
        <h1>Veja os dados abaixo e, altere o que desejar: </h1>

        <form action="alterar.php" method="post">
            <div class="mb-3">
                <label for="marca" class="form-label">Marca</label>
                <input type="text" class="form-control" id="marca" aria-describedby="Marca" name="marca" value="<?php echo $row["marca"]; ?>">
                <input type="hidden" name="id" value="<?php echo $row["pk_carro"]; ?>">
            </div>

            <div class="mb-3">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" class="form-control" id="modelo" name="modelo" value="<?php echo $row["modelo"]; ?>">
            </div>

            <div class="mb-3">
                <label for="cambio" class="form-label">Câmbio</label>
                <select name="cambio" id="cambio" class="form-select">
                    <option value="M" <?php echo $row["cambio"]=="M" ? "selected" : ""; ?>>Manual</option>
                    <option value="A" <?php echo $row["cambio"]=="A" ? "selected" : ""; ?>>Automático</option>
                    <option value="CVT" <?php echo $row["cambio"]=="CVT" ? "selected" : ""; ?>>CVT</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="cor" class="form-label">Cor</label>
                <input type="text" class="form-control" id="cor" name="cor" value="<?php echo $row["cor"]; ?>">
            </div>

            <div class="mb-3">
                <label for="tipo_combustivel" class="form-label">Tipo de Combustível</label>
                <select name="tipo_combustivel" id="tipo_combustivel" class="form-select">
                    <option value="D" <?php echo $row["tipo_combustivel"]=="D" ? "selected" : ""; ?>>Diesel</option>
                    <option value="F" <?php echo $row["tipo_combustivel"]=="F" ? "selected" : ""; ?>>FLEX</option>
                    <option value="G" <?php echo $row["tipo_combustivel"]=="G" ? "selected" : ""; ?>>Gasolina</option>
                    <option value="E" <?php echo $row["tipo_combustivel"]=="E" ? "selected" : ""; ?>>Etanol</option>
                    <option value="EL" <?php echo $row["tipo_combustivel"]=="EL" ? "selected" : ""; ?>>Elétrico</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="ano" class="form-label">Ano</label>
                <input type="text" class="form-control" id="ano" name="ano" value="<?php echo $row["ano"]; ?>">
            </div>

            <div class="mb-3">
                <label for="motor" class="form-label">Motor</label>
                <input type="text" class="form-control" id="motor" name="motor" value="<?php echo $row["motor"]; ?>">
            </div>

            <div class="mb-3">
                <label for="km" class="form-label">Km</label>
                <input type="text" class="form-control" id="km" name="km" value="<?php echo $row["km"]; ?>">
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea type="text" class="form-control" id="descricao" name="descricao" value="<?php echo $row["descricao"]; ?>"></textarea>
            </div>

            <div class="mb-3">
                <label for="nome" class="form-label">Dono do Carro</label>
                <select name="nome" id="nome" class="form-select">
                    <option value="">Dono do Carro</option>
                    <?php while ($rowNome = mysqli_fetch_assoc($queryNome)){ ?>
                        <option value="<?php echo $rowNome['pk_pessoa']?>"
                        <?php echo $row['fk_aluno'] == $rowNome["pk_pessoa"] ? "selected
                        " : "" ?>>
                        <?php echo $rowNome['nome']?>
                    </option>
                    <?php } ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>

        </form>

    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>    
</body>
</html>