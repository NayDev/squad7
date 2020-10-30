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
            <input class="form-control mb-3" id="button" type="submit" name="submit" value="Enviar">
        </form> 
        <h2>Lista de Mensagem</h2>
        <hr />
       
        <?php
        
                $sql = "select * from fale_conosco";
                $result = $conn->query($sql);

                if($result->num_rows > 0){
                    while($rows = $result->fetch_assoc()){
                        echo "Data: ", date('d/m/Y H:i:s', strtotime($rows['data'])); "<br />";
                        echo "Nome: ", $rows['nome'], "<br />";
                        echo "Mensagem: ", $rows['msg'], "<br />";
                        echo "<hr />";
                }
                }else{
                    echo "Nenhum comentário ainda!!!";
                }
                
            ?>   
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