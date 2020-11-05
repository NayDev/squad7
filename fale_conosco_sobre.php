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

if (isset($_POST['nome']) && isset($_POST['msg'])) {
  $nome = $_POST['nome'];
  $msg = $_POST['msg'];

  $sql = "insert  into fale_conosco (nome, msg) values ('$nome','$msg')";
  $result = $conn->query($sql);
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fale conosco</title>
  <link rel="stylesheet" href="fale_conosco_sobre.css">

  <?php include('./ADM/bootstrap.html') ?>

  <style>
    body {
      color: #ff8b0d;
      background: linear-gradient(223deg, rgb(109,5,141) 0%, rgb(91,49,147) 95%);
    }
  </style>

</head>

<body>
  <!--------------------- MENU ---------------------------->
  <?php include('menu.html') ?>

  <main>

    <div class="container">
      <!------------------------------ Formulario de msg --------------------------->
      <form class="form-group" method="post" action="">
        <h4 class="mt-5">Nome </h4>
        <input class="form-control mb-3" type="text" name="nome" placeholder="Digite seu Nome">
        <h4 class="mt-5">Mensagem </h4>
        <textarea class="form-control mb-3" name="msg" placeholder="Digite uma mensagem"></textarea>
        <br /><br />
        <input class="btn btn-primary form-control mb-3" id="button" type="submit" name="submit" value="Enviar">
      </form>

      <!--- Função para evitar o reenvio da msg ao atualizar a pagina -->
      <script>
        if (window.history.replaceState) {
          window.history.replaceState(null, null, window.location.href);
        }
      </script>
    </div>
  </main>
  <!------------------------------- Rodape -->
  <?php include('rodape.html') ?>
</body>

</html>
