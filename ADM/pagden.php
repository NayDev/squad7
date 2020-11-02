<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once('connectdb.html') ?>
  <?php require_once('bootstrap.html') ?>
  <title>ADM SOS - Denúncias</title>
</head>

<body style="background-color: black;" class="text-white">

  <?php include_once('menu.html') ?>

  <div class="jumbotron card card-image text-white" style="background-color: black;">
    <p class="text-center">Bem vindo ao sistema SOS, <b><?php echo $_SESSION['nome'] ?></b>! - (<?php echo $_SESSION['email'] ?>)</p>
    <h1 class="display-4 text-danger  font-weight-bold">Denúncias</h1>
    <hr class="my-4 bg-white">
    <p class="lead font-weight-bold">Denúncias presentes no sistema:</p>

    <table class="table table-striped table-hover table-dark bg-dark text-center">
      <thead>
        <tr>
          <th scope="col" class=" text-left">ID-DEN</th>
          <th scope="col" class=" text-left">UBS</th>
          <th scope="col" class=" text-left">MEDICAMENTO</th>
          <th scope="col" class=" text-left">DATA DENUNCIA</th>
        </tr>
      </thead>
      <tbody>



        <?php
        $sql = "
          SELECT
          den.id id,
          ubs.nome ubs,
          med.nome med,
          den.data_ocorrencia data
          FROM
          denuncia den
          JOIN ubs ON den.ubs_id = ubs.id
          JOIN medicamento med ON den.medicamento_id = med.id
          ORDER BY den.id DESC;
        ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($rows = $result->fetch_assoc()) {
        ?>

            <tr>
              <th class="align-middle text-left" scope="row "><?php echo $rows["id"]; ?></th>
              <td class="align-middle text-left font-weight-bold"><?php echo $rows["ubs"]; ?></td>
              <td class="align-middle text-left"><?php echo $rows["med"]; ?></td>
              <td class="align-middle text-left"><?php echo $rows["data"]; ?></td>
              <td class="align-middle text-right">
                <div class="btn-group">
                  <button class="btn btn-outline-danger font-weight-bold">VER</button>
                  <button class="btn btn-outline-danger font-weight-bold">APAGAR</button>
                </div>
              </td>
            </tr>

        <?php
          }
        } else {
          echo "Nenhuma denúncia cadastrada!";
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

  <div id="displayInfo" class="fixed-top container"></div>

  <script>
    function showInfo(id) {
      displayInfo.innerHTML += `
      <h3 class="alert alert-info alert-dismissible m-4">
      <button class="close" data-dismiss="alert">&times;</button>
      Este botao pertence a denuncia ID #${id}.
      </h3>
      `
    }
  </script>


</body>

</html>