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
        <h1>Informe os dados a serem inseridos: </h1>

        <form action="novo.php" method="post">
            <div class="mb-3">
                <label for="marca" class="form-label">Marca</label>
                <input type="text" class="form-control" id="marca" aria-describedby="Marca" name="marca">
            </div>

            <div class="mb-3">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" class="form-control" id="modelo" name="modelo">
            </div>

            <div class="mb-3">
                <label for="cambio" class="form-label">Câmbio</label>
                <select name="cambio" id="cambio" class="form-select">
                    <option value="M">Manual</option>
                    <option value="A">Automático</option>
                    <option value="CVT">CVT</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="cor" class="form-label">Cor</label>
                <input type="text" class="form-control" id="cor" name="cor">
            </div>

            <div class="mb-3">
                <label for="tipo_combustivel" class="form-label">Tipo de Combustível</label>
                <select name="tipo_combustivel" id="tipo_combustivel" class="form-select">
                    <option value="D">Diesel</option>
                    <option value="F">Gasolina e Álcool</option>
                    <option value="G">Gasolina</option>
                    <option value="E">Etanol</option>
                    <option value="EL">Elétrico</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="ano" class="form-label">Ano</label>
                <input type="text" class="form-control" id="ano" name="ano">
            </div>

            <div class="mb-3">
                <label for="motor" class="form-label">Motor</label>
                <input type="text" class="form-control" id="motor" name="motor">
            </div>

            <div class="mb-3">
                <label for="km" class="form-label">Km</label>
                <input type="text" class="form-control" id="km" name="km">
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea type="text" class="form-control" id="descricao" name="descricao"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>

        </form>

    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>    
</body>
</html>