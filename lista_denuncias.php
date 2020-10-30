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
    $conn = mysqli_connect("localhost", "root", "", "sosmedicamentos");

    // Execução da instrução SQL
   
    $resultado_consulta = $conn->query("SELECT md.*,me.* from medicamento_denunciado as md, medicamento as me  WHERE (md.medicamento_id=me.id)");
    
    $medicamentos = mysqli_fetch_all($resultado_consulta);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Denuncias</title>
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
      <a class="nav-link active text-white" href="cadastrar_denuncias.html">Denunciar</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active text-white" href="fale_conosco_sobre.php">Fale Conosco</a>
    </li>
  </ul>
</div>
</nav>

    <main>
      
      <div class="container">
          <h3 class="mt-5">Denuncias recentes:</h3>
          <table class="table table-striped">
            <tr>
                <th scope="col">Data</th>
                <th scope="col">UBS</th>
                <th scope="col">MEDICAMENTO</th>
            </tr>
            <tr>
                <td>25/10/2020</td>
                <td>Santa Maria</td>
                <td>Dipirona</td>
            </tr>
          </table>
        </div>
    </main>
    <footer id="rodape">
      <p>&copy; Squad 007 Recode Pro 2020</p>
  </footer>
</body>
</html>