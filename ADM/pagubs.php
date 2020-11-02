<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once('connectdb.html') ?>
  <?php require_once('bootstrap.html') ?>
  <title>ADM SOS - UBS's</title>
</head>

<body style="background-color: black;" class="text-white">

  <?php include_once('menu.html') ?>


  <main class="jumbotron card card-image text-white" style="background-color: black;">
    <p class="text-center">Bem vindo ao sistema SOS, <b><?php echo $_SESSION['nome'] ?></b>! - (<?php echo $_SESSION['email'] ?>)</p>
    <h1 class="display-4 text-warning  font-weight-bold">UBS's</h1>
    <button type="button" class="btn btn-warning btn-lg font-weight-bold" data-toggle="modal" data-target="#cadastroUBSModal">
      CADASTRAR NOVA UBS
    </button>
    <hr class="my-4 bg-white">
    <p class="lead font-weight-bold">Atualmente cadastradas:</p>

    <table class="table table-striped table-hover table-dark bg-dark text-center">
      <thead>
        <tr>
          <th scope="col" class=" text-left">ID-UBS</th>
          <th scope="col" class=" text-left">NOME</th>
          <th scope="col" class=" text-left">DISTRITO</th>
          <th scope="col" class=" text-left">N° DENÚNCIAS</th>
        </tr>
      </thead>
      <tbody>



        <?php
        $sql = "
                SELECT
                ubs.*,
                count(den.ubs_id) qtde
                FROM
                ubs
                LEFT JOIN denuncia den ON ubs.id = den.ubs_id GROUP BY den.ubs_id
                ORDER BY ubs.id DESC;
        ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($rows = $result->fetch_assoc()) {
        ?>

            <tr>
              <th class="align-middle text-left" scope="row "><?php echo $rows["id"]; ?></th>
              <td class="align-middle text-left">
                <details>
                  <summary class="font-weight-bold"><?php echo $rows["nome"]; ?></summary>
                  <section>
                    <hr class="border border-white bg-white m-0 p-0">

                    <div>
                      <b>Endereço: </b><br>
                      <?php echo $rows["endereco"]; ?>
                    </div>

                    <div>
                      <b>CEP: </b>
                      <?php echo $rows["cep"]; ?>
                    </div>

                    <div>
                      <b>Telefone: </b>
                      <?php echo $rows["telefone"]; ?>
                    </div>


                    <hr class="border border-white bg-white m-0 p-0">

                  </section>
                </details>
              </td>
              <td class="align-middle text-left"><?php echo $rows["distrito"]; ?></td>
              <td class="align-middle text-center"><?php echo $rows["qtde"]; ?></td>
              <td class="align-middle text-right">
                <div class="btn-group">
                  <button class="btn btn-outline-warning  font-weight-bold">
                    VER
                  </button>
                  <button class="btn btn-outline-warning  font-weight-bold">
                    EDITAR
                  </button>
                  <button class="btn btn-outline-warning  font-weight-bold" onclick="showInfo('<?php echo $rows["id"]; ?>','<?php echo $rows["nome"]; ?>')">
                    APAGAR
                  </button>
                </div>
              </td>
            </tr>

        <?php
          }
        } else {
          echo "Nenhuma UBS cadastrada!";
        }
        ?>

      </tbody>
    </table>

    <!-- Barra de paginacao -->
    <div class="btn-group pagination justify-content-center">
      <a class="btn btn-outline-light disabled" href="#">ANTERIOR</a>
      <a class="btn btn-outline-light active" href="#">1</a>
      <a class="btn btn-outline-light" href="#">2</a>
      <a class="btn btn-outline-light" href="#">3</a>
      <a class="btn btn-outline-light" href="#">PRÓXIMO</a>
    </div>
  </main>

  <!-- Modal para cadastro de UBS -->
  <div class="modal fade text-dark" id="cadastroUBSModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">CADASTRAR UBS</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">

          <form id="cadastrarUBS" class="container-fluid" action="cadastro_ubs.php" method="post">
            <div class="row">
              <div class=" col-sm-5 form-group">
                <label class="col-form-label">Cadastrado por:</label>
                <select class="custom-select mr-sm-2 border border-primary" name="cadastrado_por_id">
                  <option selected value="<?php echo $_SESSION['username'] ?>"><?php echo $_SESSION['username'] ?></option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <input type="text" name="nome" class="form-control border border-primary" placeholder="Nome da UBS" />
            </div>

            <div class="form-group">
              <textarea class="form-control border border-primary" name="descricao" placeholder="Observações sobre a UBS"></textarea>
            </div>

            <div class="form-group">
              <input type="text" name="endereco" class="form-control border border-primary" placeholder="Endereço" />
            </div>


            <div class="row">
              <div class="col-lg-8 mr-auto form-group">
                <select class="custom-select mr-sm-2 border border-primary" name="distrito">
                  <option selected>Escolha o distrito</option>
                  <option value="SÃO MIGUEL PAULISTA">SÃO MIGUEL PAULISTA</option>
                </select>
              </div>

              <div class=" col-lg-4 form-group btn-group btn-group-toggle d-flex justify-content-lg-end" data-toggle="buttons">
                <label class="btn btn-outline-primary">
                  <input type="radio" name="zona" value="ZN"> ZN
                </label>
                <label class="btn btn-outline-primary">
                  <input type="radio" name="zona" value="ZL"> ZL
                </label>
                <label class="btn btn-outline-primary">
                  <input type="radio" name="zona" value="ZS"> ZS
                </label>
                <label class="btn btn-outline-primary">
                  <input type="radio" name="zona" value="ZO"> ZO
                </label>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-8 mr-auto form-group">
                <select class="custom-select mr-sm-2 border border-primary" name="cidade">
                  <option selected>Escolha a cidade</option>
                  <option value="SÃO PAULO">SÃO PAULO</option>
                </select>
              </div>

              <div class="col-4 col-lg-2 form-group">
                <select class="custom-select mr-sm-2 border border-primary" name="uf">
                  <option selected>UF</option>
                  <option value="SP">SP</option>
                  <option value="RJ">RJ</option>
                </select>
              </div>
            </div>

            <div class="row">
              <div class="col-7 col-md-6 mr-auto form-group">
                <input type="text" name="cep" class="form-control border border-primary" placeholder="CEP" />
              </div>

              <div class="col-7 col-md-6 form-group">
                <input type="text" name="telefone" class="form-control border border-primary" placeholder="Telefone" />
              </div>
            </div>

          </form>

        </div>

        <div class="modal-footer d-flex justify-content-between align-items-center">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">SAIR</button>

          <div class="d-flex">
            <input type="reset" class="btn btn-primary mx-2" form="cadastrarUBS" value="LIMPAR">
            <input type="submit" class="btn btn-primary mx-2" form="cadastrarUBS" value="CADASTRAR">
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- DIV para hovering alerts -->
  <div id="displayAlerts" class="fixed-top container"></div>

  <script>
    function showInfo(id, nome) {
      displayAlerts.innerHTML += `
      <div class="alert alert-danger alert-dismissible m-4" role="alert">
      <button class="close" data-dismiss="alert">&times;</button>
      <h4 class="alert-heading">Botao clicado com sucesso!</h4>
      <p>Este botao pertence a UBS ${id} - "${nome}".</p>
      <hr>
      <p class="mb-0">Esta caixa está em fase de testes para futura implantação.</p>
      </div>
      `
    }
  </script>

</body>

</html>