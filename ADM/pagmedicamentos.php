<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once('connectdb.html') ?>
  <?php require_once('bootstrap.html') ?>
  <title>ADM SOS - Medicamentos</title>
</head>

<body style="background-color: black;" class="text-white">

  <?php include_once('menu.html') ?>

  <div class="jumbotron card card-image text-white" style="background-color: black;">
    <p class="text-center">Bem vindo ao sistema SOS, <b><?php echo $_SESSION['nome'] ?></b>! - (<?php echo $_SESSION['email'] ?>)</p>
    <h1 class="display-4 text-success  font-weight-bold">Medicamentos</h1>
    <a class="btn btn-success btn-lg font-weight-bold" href="#" role="button">CADASTRAR NOVO MEDICAMENTO</a>
    <hr class="my-4 bg-white">
    <p class="lead font-weight-bold">Atualmente cadastrados:</p>

    <table class="table table-striped table-hover table-dark bg-dark text-center">
      <thead>
        <tr>
          <th scope="col" class=" text-left">ID-MED</th>
          <th scope="col" class=" text-left">NOME</th>
          <th scope="col" class=" text-left">CLASSIFICAÇÃO</th>
          <th scope="col" class=" text-left">CADASTRADO POR</th>
        </tr>
      </thead>
      <tbody>



        <?php
        $sql = "SELECT * FROM medicamento";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($rows = $result->fetch_assoc()) {
        ?>

            <tr>
              <th class="align-middle text-left" scope="row "><?php echo $rows["id"]; ?></th>
              <td class="align-middle text-left"><?php echo $rows["nome"]; ?></td>
              <td class="align-middle text-left"><?php echo $rows["classificacao"]; ?></td>
              <td class="align-middle text-left"><?php echo $rows["cadastrado_por_id"]; ?></td>
              <td class="align-middle text-right">
                <div class="btn-group">
                  <button class="btn btn-outline-success font-weight-bold">VER</button>
                  <button class="btn btn-outline-success font-weight-bold">EDITAR</button>
                  <button class="btn btn-outline-success font-weight-bold" onclick="showInfo('<?php echo $rows["id"]; ?>','<?php echo $rows["nome"]; ?>')">APAGAR</button>
                </div>
              </td>
            </tr>

        <?php
          }
        } else {
          echo "Nenhum produto cadastrado!";
        }
        ?>







      </tbody>
    </table>


  </div>

  <section id="displayInfo"></section>


  <footer class="mb-5">
    <div class="btn-group pagination justify-content-center">
      <a class="btn btn-outline-light disabled" href="#">ANTERIOR</a>
      <a class="btn btn-outline-light active" href="#">1</a>
      <a class="btn btn-outline-light" href="#">2</a>
      <a class="btn btn-outline-light" href="#">3</a>
      <a class="btn btn-outline-light" href="#">PRÓXIMO</a>
    </div>
  </footer>


  <script>
    function showInfo(id, nome) {
      displayInfo.innerHTML += `
      <h1 class="alert alert-info alert-dismissible">
      <button class="close" data-dismiss="alert">&times;</button>
      Sem info para este evento para a UBS ${id} -  ${nome} 
      </h1>
      `
    }
  </script>


</body>

</html>