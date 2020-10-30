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
  <link rel="stylesheet" href="lista_denuncias.css">
</head>
<body>
  <nav class="menu">
    <a href="home.html">Home</a>
    <a href="lista_denuncias.php">Denuncias Recentes</a>
    <a href="cadastrar_denuncias.html">Denunciar</a>
    <a href="fale_conosco_sobre.php">Fale Conosco</a>
  </nav>

    <main>
      
      <div class="container">
        
        <div class="box">
          <h3>Denuncias recentes:</h3>
          <table class="lista">
            <tr>
                <th>Data</th>
                <th>UBS</th>
                <th>MEDICAMENTO</th>
            </tr>
            <tr>
                <td>25/10/2020</td>
                <td>Santa Maria</td>
                <td><?php echo ['nome'] ?></td>
            </tr>
          </table>
        </div>
      </div>
    </main>
    <footer id="rodape">
      <p>&copy; Squad 007 Recode Pro 2020</p>
  </footer>
</body>
</html>