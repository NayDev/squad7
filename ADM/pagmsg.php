<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once('connectdb.html') ?>
  <?php require_once('bootstrap.html') ?>
  <title>ADM SOS - Mensagens</title>
</head>

<body style="background: rgb(18,18,20);
background: linear-gradient(180deg, rgba(18,18,20,1) 0%, rgba(44,35,69,1) 100%);" class="text-white">

  <?php include_once('menu.html') ?>

  <div class="jumbotron card card-image text-white" style="background-color: rgba(0,0,0,0);">
    <p class="text-center">Bem vindo ao sistema SOS, <b><?php echo $_SESSION['nome'] ?></b>! - (<?php echo $_SESSION['email'] ?>)</p>
    <h1 class="display-4 text-primary  font-weight-bold">Mensagens</h1>
    <hr class="my-4 bg-white">
    <p class="lead font-weight-bold">Mensagens recentes:</p>

    <table class="table table-striped table-hover table-dark bg-dark text-center">
      <thead>
        <tr>
          <th scope="col" class=" text-center">DATA/HORA</th>
          <th scope="col" class=" text-left">NOME/MENSAGEM</th>
        </tr>
      </thead>
      <tbody>


        <?php
        $sql = "
            SELECT * FROM fale_conosco ORDER BY fale_conosco.data DESC;
        ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($rows = $result->fetch_assoc()) {
        ?>

            <tr>
              <th class="align-middle text-center text-primary" scope="row ">
                <?php echo date('d/m/Y', strtotime($rows['data'])); ?><br>
                <?php echo date('h:i A', strtotime($rows['data'])); ?>
              </th>
              <td class="align-middle text-left">
                <b class="text-primary"><?php echo $rows["nome"]; ?>:</b><br>
                <?php echo $rows["msg"]; ?>
              </td>
              <!-- <td class="align-middle text-right">
                <div class="btn-group">
                  <button class="btn btn-outline-primary font-weight-bold" onclick="showInfo()">APAGAR</button>
                </div>
              </td> -->
            </tr>

        <?php
          }
        } else {
          echo "Nenhuma mensagem recebida!";
        }
        ?>

      </tbody>
    </table>


    <div class="btn-group pagination justify-content-center">
      <a class="btn btn-outline-light disabled" href="#">ANTERIOR</a>
      <a class="btn btn-outline-light active" href="#">1</a>
      <a class="btn btn-outline-light" href="#">2</a>
      <a class="btn btn-outline-light" href="#">3</a>
      <a class="btn btn-outline-light" href="#">PRÓXIMO</a>
    </div>

  </div>

  <!-- DIV para hovering alerts -->
  <div id="displayAlerts" class="fixed-top container"></div>



  <script>
    function showInfo() {
      console.log('Clicou no botao!!!');
      displayAlerts.innerHTML += `
      <div class="alert alert-primary alert-dismissible fade show m-4" role="alert">
      <button class="close" data-dismiss="alert">&times;</button>
      <h4 class="alert-heading">Botao clicado com sucesso!</h4>
      <p>Este botao pertence a uma mensagem.</p>
      <hr>
      <p class="mb-0">Esta caixa está em fase de testes para futura implantação.</p>
      </div>
      `
    }
  </script>


</body>

</html>