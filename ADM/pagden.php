<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once('connectdb.html') ?>
  <?php require_once('bootstrap.html') ?>
  <title>ADM SOS - Denúncias</title>
</head>

<body style="background: rgb(18,18,20);
background: linear-gradient(180deg, rgba(18,18,20,1) 0%, rgba(44,35,69,1) 100%);" class="text-white">

  <?php include_once('menu.html') ?>

  <div class="jumbotron card card-image text-white" style="background-color: rgba(0,0,0,0);">
    <p class="text-center">Bem vindo ao sistema SOS, <b><?php echo $_SESSION['nome'] ?></b>! - (<?php echo $_SESSION['email'] ?>)</p>
    <h1 class="display-4 text-danger  font-weight-bold">Denúncias</h1>
    <hr class="my-4 bg-white">
    <p class="lead font-weight-bold">Denúncias presentes no sistema:</p>

    <table class="table table-striped table-hover table-dark bg-dark text-center">
      <thead>
        <tr>
          <th scope="col" class=" text-left">ID</th>
          <th scope="col" class=" text-left">UBS/MEDICAMENTO</th>
          <th scope="col" class=" text-center">DATA</th>
        </tr>
      </thead>
      <tbody>



        <?php
        $sql = "
          SELECT
          den.id id,
          den.comentario com,
          ubs.nomeUbs ubs,
          med.nome med,
          med.id id_med,
          den.data_ocorrencia data
          FROM
          denuncia den
          JOIN ubs ON den.ubs_id = ubs.id
          JOIN medicamento med ON den.medicamento_id = med.id
          ORDER BY den.data_ocorrencia DESC;
        ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($rows = $result->fetch_assoc()) {
        ?>

            <tr>
              <th class="align-middle text-left" scope="row "><?php echo $rows["id"]; ?></th>
              <td class="align-middle text-left ">

                <details>
                  <summary>
                    <b><?php echo $rows["ubs"]; ?>: <span class="text-danger">FALTANDO</span> <?php echo $rows["id_med"]; ?></b><br>
                    <?php echo $rows["med"]; ?>
                  </summary>

                  <section>

                    <hr class="border border-white bg-white mx-0 my-2 p-0">

                    <div>
                      <b class="text-danger">OBS. DO PACIENTE: </b>
                      "<?php echo $rows["com"]; ?>"
                    </div>

                    <hr class="border border-white bg-white mx-0 my-2 p-0">

                  </section>
                </details>

              </td>
              <td class="align-middle text-center"><?php echo date('d/m/Y', strtotime($rows['data'])); ?></td>
              <!-- <td class="align-middle text-right">
                <div class="btn-group">
                  <button class="btn btn-outline-danger font-weight-bold" onclick="showInfo()">VER</button>
                  <button class="btn btn-outline-danger font-weight-bold" onclick="showInfo()">APAGAR</button>
                </div>
              </td> -->
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

  <!-- DIV para hovering alerts -->
  <div id="displayAlerts" class="fixed-top container"></div>



  <script>
    function showInfo() {
      console.log('Clicou no botao!!!');
      displayAlerts.innerHTML += `
      <div class="alert alert-danger alert-dismissible fade show m-4" role="alert">
      <button class="close" data-dismiss="alert">&times;</button>
      <h4 class="alert-heading">Botao clicado com sucesso!</h4>
      <p>Este botao pertence a denuncia.</p>
      <hr>
      <p class="mb-0">Esta caixa está em fase de testes para futura implantação.</p>
      </div>
      `
    }
  </script>


</body>

</html>