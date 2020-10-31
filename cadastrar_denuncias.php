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
    
 
    if (isset($_POST['submit'])) {
     
      $ubs_id = $_POST['ubs_id']; 
      $medicamento_id = $_POST['medicamento_id'];
      $comentario = $_POST['comentario'];
      $data_denuncia = $_POST['data_denuncia'];

      $query_insert = "INSERT INTO denuncia(id,ubs_id, medicamento_id, comentario, data_denuncia) VALUES (null,'$ubs_id', '$medicamento_id', '$comentario', '$data_denuncia')";      
      if ($conn->query($query_insert) === TRUE) {
        echo '<div class="alert alert-success" role="alert">
                Denuncia Realizada!
              </div> ';
        } else {
        echo '<div class="alert alert-danger" role="alert">
                Problema ao realizar denuncia!
                </div> ';
        } 
      //$result = $conn->query($query_insert);
    } else {  
      //echo "não entrou";
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
  <?php
    include('menu.html')
  ?>

  <div>
    <form class="container" method="POST" action="cadastrar_denuncias.php">
      <div class="form-group">
        <h1 class="mt-5">Cadastrar Denuncia</h1>
        <label for="ubs_id">Escolha a UBS</label>
        <select name="ubs_id" class="form-control mb-3" >
        <option value="0">Escolha a UBS</option>
        <?php 
        $sql = "SELECT id,nomeUbs FROM ubs " ;
        $result = $conn->query($sql);
        if($result->num_rows > 0){
          while($rows = $result->fetch_assoc()){
            ?>
          
          <option value="<?php echo $rows['id']?>"><?php echo $rows['nomeUbs']; ?></option>
        
           <?php
          }
        }?>
        </select>
     
        <label for="medicamento_id">Medicamentos em falta</label>
      
        <select name="medicamento_id" class="form-control mb-3">
        <option value="0">Escolha o medicamento</option>
        <?php 
        $sql = "SELECT id,nome FROM medicamento " ;
        $result = $conn->query($sql);
        if($result->num_rows > 0){
          while($rows = $result->fetch_assoc()){
            ?>
          <option value="<?php echo $rows['id']?>"><?php echo $rows['nome']; ?></option>
           <?php
          }
        }?>
        </select>
        <label for="data_denuncia">Data de quando faltou o remedio: </label>
        <input type="date" name="data_denuncia" class="form-control data mb-3">
        <label for="comentario">Observações e comentarios: </label>
        <input type="textarea" name="comentario" class="form-control mb-3"><br>
        <button type="submit" name="submit" class="btn btn-primary">Enviar</button>
      </div>

    </form>
  </div>
</body>
</html>