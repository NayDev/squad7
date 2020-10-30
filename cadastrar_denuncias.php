<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "sosmedicamentos";

    //Criando conexão
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Verificando conexão
    if(!$conn){
        die("A conexão ao Banco falhou: " .mysqli_connect_error());
    }

    if(isset($_POST['ubs_id']) && isset($_POST['comentario'])){
        $nome = $_POST['ubs_id'];
        $msg = $_POST['comentario'];

        $sql = "insert  into denuncia (ubs_id, comentario) values ('$ubs_id','$comentario')";
        $result = $conn->query($sql);
    }

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cadastrar Denuncia</title>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>

    <style>
      .data {
        max-width: 300px;
      }
    </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">

    <a class="navbar-brand" href="home.html">Home</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapseNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="collapseNavbar">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link text-white" href="lista_denuncias.php">Denuncias Recentes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-white" href="cadastrar_denuncias.php">Denunciar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-white" href="fale_conosco_sobre.php">Fale Conosco</a>
        </li>
      </ul>
    </div>
  </nav>

  <div>
    <form class="container" method="post">
      <div class="form-group">
        <h1 class="mt-5">Cadastrar Denuncia</h1>
        <label for="ubs">Escolha a UBS</label>
        <select name="ubs" class="form-control mb-3" >
        <?php 
        $sql = "SELECT nome FROM ubs " ;
        $result = $conn->query($sql);
        if($result->num_rows > 0){
          while($rows = $result->fetch_assoc()){
            ?>
          
          <option placeholder="Escolha a UBS"><?php echo $rows['nome']; ?></option>
        
           <?php
          }
        }?>
        </select>
     
        <label for="">Medicamentos em falta</label>
      
        <select name="med" class="form-control mb-3" placeholder="Escolha o medicamento">
        <?php 
        $sql = "SELECT nome FROM medicamento " ;
        $result = $conn->query($sql);
        if($result->num_rows > 0){
          while($rows = $result->fetch_assoc()){
            ?>
          <option placeholder="Escolha o medicamento"><?php echo $rows['nome']; ?></option>
           <?php
          }
        }?>
        </select>
        <label for="data">Data de quando faltou o remedio: </label>
        <input type="checkbox" name="data"> Hoje
        <input type="date" class="form-control data mb-3">
        <label for="coment">Observações e comentarios: </label>
        <input type="textarea" class="form-control mb-3"><br>
        <button type="submit" class="btn btn-primary">Enviar</button>
      </div>

    </form>
  </div>
</body>

</html>