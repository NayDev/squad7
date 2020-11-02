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

  $pag = (isset($_GET['pagina']))?$_GET['pagina'] : 1; // Pega Via Get a Pag

  $busca = "SELECT * FROM denuncia INNER JOIN ubs ON denuncia.ubs_id = ubs.id INNER JOIN medicamento ON denuncia.medicamento_id = medicamento.id; " ;
  $todos = mysqli_query($conn,"$busca");

  $registros = 5;

  $tr = mysqli_num_rows($todos);
  $tp = ceil($tr/$registros);

  $inicio = ($registros*$pag) - $registros; //Inicia os Reg * o numero da pag - a quantidade de Registros

  $buscaPaginada = "SELECT * FROM denuncia INNER JOIN ubs ON denuncia.ubs_id = ubs.id INNER JOIN medicamento ON denuncia.medicamento_id = medicamento.id LIMIT $inicio,$registros";
  $registrosPaginados = mysqli_query($conn, "$buscaPaginada");

  $anterior = $pag - 1;
  $proximo = $pag + 1;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Denuncias</title>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
<?php
    include('menu.html')
  ?>
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
            <?php
            
      if($registrosPaginados->num_rows > 0){
          while($rows = $registrosPaginados->fetch_assoc()){
            
            ?>
                <td><?php echo date('d/m/Y', strtotime($rows['data_denuncia']));?></td>
                <td><?php echo $rows['nomeUbs'];?></td>
                <td><?php echo $rows['nome'];?></td>
            </tr>
          
            <?php
          }
      }else{
        echo "Nenhuma denuncia feita ainda!!!";
      }
       
        ?>
         
    <script>
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
      }
    </script>     
          </table>
          <nav class="d-flex justify-content-center" aria-label="Page navigation" >
            <ul class="pagination">
              <?php 
                if($pag > 1){  
              ?>
              <li class="page-item"><a class="page-link" href="?pagina=<?=$anterior;?>">Anterior</a></li>
               <?php }?>
               <?php 
                for($i = 1; $i <= $tp; $i++){
                  if($pag == $i){
                    echo "<li class='page-item active'><a class='page-link' href='?pagina=$i'>$i</a></li>";
                  }else{
                    echo "<li class='page-item'><a class='page-link' href='?pagina=$i'>$i</a></li>";
                  }
                }
               ?>
              <?php 
              if($pag < $tp){
              ?>
              <li class="page-item"><a class="page-link" href="?pagina=<?=$proximo;?>">Proximo</a></li>
              <?php }?>
            </ul>
          </nav>
        </div>
    </main>
    <footer class="navbar fixed-bottom row d-flex justify-content-center">
      <p>&copy; Squad 007 Recode Pro 2020</p>
    </footer>
</body>
</html>