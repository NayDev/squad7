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

    if(isset($_POST['nome']) && isset($_POST['msg'])){
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

<?php
    include('menu.html')
  ?>

  <main>
    <section class="container">
      <h2 class="mt-5">Visão</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
        Unde eum reiciendis sint perspiciatis voluptatem, quidem distinctio 
        temporibus vero expedita maxime ex nesciunt odit incidunt porro. 
        Exercitationem perspiciatis commodi minus error.
      </p>
      <h2 class="mt-5">Missão</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
        Unde eum reiciendis sint perspiciatis voluptatem, quidem distinctio 
        temporibus vero expedita maxime ex nesciunt odit incidunt porro. 
        Exercitationem perspiciatis commodi minus error.
      </p>
      <h2 class="mt-5">Valor</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
        Unde eum reiciendis sint perspiciatis voluptatem, quidem distinctio 
        temporibus vero expedita maxime ex nesciunt odit incidunt porro. 
        Exercitationem perspiciatis commodi minus error.
      </p>
    </section>
    <div class="container">
        <form class="form-group" method="post" action=""> 
            <h4 class="mt-5">Nome </h4>
            <input class="form-control mb-3" type="text" name="nome" placeholder="Digite seu Nome">
            <h4 class="mt-5">Mensagem </h4>
            <textarea class="form-control mb-3" name="msg"placeholder="Digite uma mensagem"></textarea>
            <br/><br/>
            <input class="btn btn-primary form-control mb-3" id="button" type="submit" name="submit" value="Enviar">
        </form> 

          <!------------------------------ Mensagens ----------------------------->
          <div class="container my-3 p-3 bg-light rounded shadow-lg">
            <h6 class="border-bottom border-gray pb-2 mb-0">Mensagens</h6>
            
        <?php 
            $sql = "select * from fale_conosco";
            $result = $conn->query($sql);
        
            if ($result->num_rows > 0) {
                while($rows = $result->fetch_assoc()){
        ?>
            <div class="media text-muted pt-3">
                <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
                <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <strong class="text-gray-dark"><?php echo $rows["nome"];?></strong>  
                        <p><?php echo date('d/m/Y H:i:s', strtotime($rows['data'])); ?></p>
                    </div>
                    <p class="d-block"><?php echo $rows["msg"]; ?></p>
                </div>
            </div>  
        <?php  
                }
            }else {
                echo "Nenhum comentário ainda!";
            }
        ?>
        </div>
        <script>
          if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
          }
        </script>     
    </div>
  </main>
    <footer class="text-center">
      <p>&copy; Squad 007 Recode Pro 2020</p>
    </footer>
</body>
</html>