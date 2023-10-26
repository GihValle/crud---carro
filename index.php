<?php
  include_once("conexao.php");

  $sql = "select pk_carro, marca, modelo, ano, nome from carro
          RIGHT JOIN aluno ON carro.fk_aluno=aluno.pk_pessoa";
  $query = mysqli_query($conn, $sql);

  if(isset($_GET['status']) && isset($_GET["msg"])){
    $status = base64_decode($_GET['status']);
    $msg = base64_decode($_GET["msg"]);
  }
  else{
    $status = "";
    $msg = "";
  }
  
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <title>CRUD - Persistência em banco de dados</title>
</head>

<body>
<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
  <symbol id="check-circle-fill" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>


    <div class="container">
      <h1 class="mb-5">CRUD - CARRO</h1>
      <p>CRUD é um acronimo para ações realizada em banco de dados, onde:</p>
      <ul>
          <li>C - Create, Criar Informações (dados/registros) | SQL - INSERT;</li>
          <li>R - Read, Ler Informações | SQL - SELECT;</li>
          <li>U - Update, Alterar Informações | SQL - UPDATE; </li>
          <li>D - Delete, Deletar Informações | SQL -  DELETE.</li>
      </ul>

      <div class="d-flex justify-content-end">
          <a href="form_adicionar.php" class="btn btn-primary"><i class="bi bi-plus-circle"></i></a>
      </div>

      <div id="success" class="alert alert-success" role="alert" onClick="fecharSuccess();">
        <svg class="bi flex-shrink-0 me-2" widht="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div id="success-msg"></div>
      </div>

      <div id="danger" class="alert alert-danger" role="alert" onClick="fecharDanger();">
        <svg class="bi flex-shrink-0 me-2" widht="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div id="danger-msg"></div>
      </div>

      <table class="table">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Marca</th>
              <th scope="col">Modelo</th>
              <th scope="col">Ano</th>
              <th scope="col">Dono</th>
              <th scope="col">Opções</th>
            </tr>
        </thead>

        <tbody>
          <?php 
            while ($row = mysqli_fetch_assoc($query)){
          ?>
            <tr>
              <th scope="row"><?php echo $row['pk_carro']; ?></th>
              <td><?php echo $row['marca']; ?></td>
              <td><?php echo $row['modelo']; ?></td>
              <td><?php echo $row['ano']; ?></td>
              <td><?php echo $row['nome']; ?></td>
              <td> <a class="btn btn-outline-secondary btn-sm" href="form_alterar.php?id=<?php echo base64_encode($row['pk_carro']); ?>"><i class="bi bi-pencil-square"></i></a> 
                
                <a class="btn btn-outline-danger btn-sm" href="deletar.php?id=<?php echo base64_encode($row['pk_carro']); ?>"><i class="bi bi-trash"></i></td></td>
            </tr>
          <?php
            }
          ?>
          
        </tbody>
      </table> 
    </div>
    
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <script>
    var status = '<?php echo $status?>';
    var msg = '<?php echo $msg?>';

    if(msg!='' && status=='ok'){
      document.getElementById("success").style.display = 'flex';
      document.getElementById('success-msg').innerHTML = msg;
    }

    function fecharSuccess(){
      document.getElementById("success").style.display = 'none';
    }

    if(msg!='' && status=='erro'){
      document.getElementById("danger").style.display = 'flex';
      document.getElementById('danger-msg').innerHTML = msg;
    }

    function fecharDanger(){
      document.getElementById("danger").style.display = 'none';
    }

  </script>
    
</body>
</html>