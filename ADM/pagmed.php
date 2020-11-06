<!DOCTYPE html>
<html lang="pt-br">

<head>
  <?php 
    require_once('connectdb.html');

    /*Aqui Faz a Paginação pega do banco de dados*/

    $pag = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1; // Pega Via Get a Pag

    $busca = "SELECT med.*,  count(den.medicamento_id) qtde FROM  medicamento med LEFT JOIN denuncia den ON med.id = den.medicamento_id GROUP BY med.id ORDER BY qtde DESC";
    $todos = mysqli_query($conn, "$busca");
    
    $registros = 20;
    
    $tr = mysqli_num_rows($todos);
    $tp = ceil($tr / $registros);
    
    $inicio = ($registros * $pag) - $registros; //Inicia os Reg * o numero da pag - a quantidade de Registros
    
    $buscaPaginada = "SELECT med.*,  count(den.medicamento_id) qtde FROM  medicamento med LEFT JOIN denuncia den ON med.id = den.medicamento_id GROUP BY med.id ORDER BY qtde DESC LIMIT $inicio,$registros";
    $registrosPaginados = mysqli_query($conn, "$buscaPaginada");
    
    $anterior = $pag - 1;
    $proximo = $pag + 1;  
  ?>
  <?php require_once('bootstrap.html') ?>
  <title>ADM SOS - Medicamentos</title>
</head>

<body style="background: rgb(18,18,20);
background: linear-gradient(180deg, rgba(18,18,20,1) 0%, rgba(44,35,69,1) 100%);" class="text-white">

  <?php include_once('menu.html') ?>

  <div class="jumbotron card card-image text-white" style="background-color: rgba(0,0,0,0);">
    <p class="text-center">Bem vindo ao sistema SOS, <b><?php echo $_SESSION['nome'] ?></b>! - (<?php echo $_SESSION['email'] ?>)</p>
    <h1 class="display-4 text-success  font-weight-bold">Medicamentos</h1>

    <button type="button" class="btn btn-success btn-lg font-weight-bold" data-toggle="modal" data-target="#cadastroMEDModal">
      CADASTRAR NOVO MEDICAMENTO
    </button>

    <hr class="my-4 bg-white">
    <p class="lead font-weight-bold">Atualmente cadastrados:</p>

    <table class="table table-striped table-hover table-dark bg-dark text-center">
      <thead>
        <tr>
          <th scope="col" class=" text-left">ID</th>
          <th scope="col" class=" text-left">NOME</th>
          <th scope="col" class=" text-center">N°_DENÚNCIAS</th>
        </tr>
      </thead>
      <tbody>
            <tr>
            <?php
              if ($registrosPaginados->num_rows > 0) {
                while ($rows = $registrosPaginados->fetch_assoc()) {
              ?>
              <th class="align-middle text-left" scope="row "><?php echo $rows["id"]; ?></th>
              <td class="align-middle text-left">

                <details>
                  <summary class="font-weight-bold"><?php echo $rows["nome"]; ?></summary>
                  <section>

                    <hr class="border border-white bg-white mx-0 my-2 p-0">

                    <div>
                      <b class="text-success">Cadastrado por: </b>
                      <?php echo $rows["cadastrado_por_id"]; ?>
                    </div>

                    <div>
                      <b class="text-success">Cadastrado em: </b>
                      <?php echo date('d/m/Y', strtotime($rows['data_cadastro'])); ?>
                    </div>

                    <hr class="border border-white bg-white mx-0 my-2 p-0">

                  </section>
                </details>

              </td>
              <td class="align-middle text-center"><?php echo $rows["qtde"]; ?></td>
              <td class="align-middle text-right">
                <div class="btn-group">

                  <!-- <button class="btn btn-outline-success font-weight-bold" onclick="showInfo()">VER</button>
                  <button class="btn btn-outline-success font-weight-bold" onclick="showInfo()">EDITAR</button>
                  <button class="btn btn-outline-success font-weight-bold" onclick="showInfo()">APAGAR</button> -->
                </div>
              </td>
            </tr>

        <?php
          }
        } else {
          echo "Nenhum medicamento cadastrado!";
        }
        ?>

      </tbody>
    </table>


    <nav class="d-flex justify-content-center" aria-label="Page navigation">
        <ul class="pagination">
          <?php
          if ($pag > 1) {
          ?>
            <li class="page-item" ><a class="page-link" style="color: rgb(61, 3, 77); font-size: 20px;" href="?pagina=<?= $anterior; ?>">Anterior</a></li>
          <?php } ?>
          <?php
          for ($i = 1; $i <= $tp; $i++) {
            if ($pag == $i) {
              echo "<li class='page-item active'><a class='page-link' style='background: rgb(61, 3, 77); font-size: 20px;' href='?pagina=$i'>$i</a></li>";
            } else {
              echo "<li class='page-item'><a class='page-link'  style='color: rgb(61, 3, 77); font-size: 20px;' href='?pagina=$i'>$i</a></li>";
            }
          }
          ?>
          <?php
          if ($pag < $tp) {
          ?>
            <li class="page-item"><a class="page-link" style="color: rgb(61, 3, 77); font-size: 20px;" href="?pagina=<?= $proximo; ?>">Proximo</a></li>
          <?php } ?>
        </ul>
      </nav>
    </div>

  </div>

  <!-- Modal para cadastro de medicamento -->
  <div class="modal fade text-dark" id="cadastroMEDModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">CADASTRAR MEDICAMENTO</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">

          <form id="cadastrarMED" class="container-fluid" action="cadastro_med.php" method="post">
            <div class="row">
              <div class=" col-sm-5 form-group">
                <label class="col-form-label">CADASTRADO POR:</label>
                <select class="custom-select mr-sm-2 border border-primary" name="cadastrado_por_id">
                  <option selected value="<?php echo $_SESSION['username'] ?>"><?php echo $_SESSION['username'] ?></option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-form-label">ID:</label>
              <input type="text" name="id" class="form-control border border-primary" placeholder="Digite o ID oficial do medicamento" />
            </div>

            <div class="form-group">
              <label class="col-form-label">DESCRIÇÃO COMPLETA:</label>
              <textarea class="form-control border border-primary" name="nome" placeholder="Digite o nome completo do medicamento"></textarea>
            </div>

            <div class="form-group">
              <label class="col-form-label">Observações extras sobre o medicamento a ser cadastrado:</label>
              <textarea class="form-control border border-primary" name="observacao"></textarea>
            </div>

          </form>

        </div>

        <div class="modal-footer d-flex justify-content-between align-items-center">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">SAIR</button>

          <div class="d-flex">
            <input type="reset" class="btn btn-outline-warning mx-2" form="cadastrarMED" value="LIMPAR">
            <input type="submit" class="btn btn-primary mx-2" form="cadastrarMED" value="CADASTRAR">
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- DIV para hovering alerts -->
  <div id="displayAlerts" class="fixed-top container"></div>



  <script>
    function showInfo() {
      console.log('Clicou no botao!!!');
      displayAlerts.innerHTML += `
      <div class="alert alert-success alert-dismissible fade show m-4" role="alert">
      <button class="close" data-dismiss="alert">&times;</button>
      <h4 class="alert-heading">Botao clicado com sucesso!</h4>
      <p>Este botao pertence ao medicamento.</p>
      <hr>
      <p class="mb-0">Esta caixa está em fase de testes para futura implantação.</p>
      </div>
      `
    }
  </script>


</body>

</html>