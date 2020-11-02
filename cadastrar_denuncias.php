<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "sosmedicamentos";

//Criando conexão
$conn = mysqli_connect($servername, $username, $password, $database);

// Verificando conexão
if (!$conn) {
  die("A conexão ao Banco falhou: " . mysqli_connect_error());
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

  <?php include('./ADM/bootstrap.html') ?>

  <style>
    .data {
      max-width: 300px;
    }
  </style>
</head>

<body>
  <!----------------------------- MENU --->
  <?php include('menu.html') ?>

  <div class="container my-3 p-3 bg-light rounded shadow-lg">
    <form class="container" method="POST" action="cadastrar_denuncias.php">
      <div class="form-group">
        <h1 class="mt-5">Cadastrar Denuncia</h1>
        <label for="ubs_id">Escolha a UBS</label>
        <select name="ubs_id" class="form-control mb-3">
          <option value="0">Escolha a UBS</option>
          <?php
          $sql = "SELECT id,nomeUbs FROM ubs ";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            while ($rows = $result->fetch_assoc()) {
          ?>

              <option value="<?php echo $rows['id'] ?>"><?php echo $rows['nomeUbs']; ?></option>

          <?php
            }
          } ?>
        </select>

        <label for="medicamento_id">Medicamentos em falta</label>

        <select name="medicamento_id" class="form-control mb-3">
          <option value="0">Escolha o medicamento</option>
          <?php
          $sql = "SELECT id,nome FROM medicamento ";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            while ($rows = $result->fetch_assoc()) {
          ?>
              <option value="<?php echo $rows['id'] ?>"><?php echo $rows['nome']; ?></option>
          <?php
            }
          } ?>
        </select>
        <label for="data_denuncia">Data de quando faltou o remedio: </label>
        <input type="date" name="data_denuncia" class="form-control data mb-3">
        <label for="comentario">Observações e comentarios: </label>
        <input type="textarea" name="comentario" class="form-control mb-3"><br>
        <button type="submit" name="submit" class="btn btn-primary">Enviar</button>
      </div>

    </form>
  </div>

  <?php include('rodape.html') ?>
</body>

</html>