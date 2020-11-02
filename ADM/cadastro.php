<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once('connectdb.html') ?>
  <?php require_once('bootstrap.html') ?>
  <title>ADM SOS - Cadastro</title>
</head>

<body style="background-color: black; color:white;">
  <?php include_once('menu.html') ?>



  <main class="container">
    <section class="row">


      <div class="col">
        <div class="jumbotron card card-image text-white" style="background-color: black;">
          <h1 class="display-4 text-primary  font-weight-bold">ADM's</h1>
          <p class="lead font-weight-bold">Atuais ADM's do sistema SOS</p>

          <table class="table table-striped table-hover table-dark bg-dark text-center">

            <tbody>

              <?php
              $sql = "SELECT * FROM administrador";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                while ($rows = $result->fetch_assoc()) {
              ?>

                  <tr>
                    <th class="align-middle text-center" scope="row" style="width: 60px;">
                      <img src="<?php echo $rows['imagem'] ?>" width="45" height="45" class="d-inline-block align-top rounded-circle" alt="<?php echo $rows['nome'] ?>" loading="lazy" />
                    </th>

                    <td class="align-middle text-left">
                      <details>
                        <summary class="font-weight-bold"><?php echo $rows["nome"]; ?></summary>
                        <section>
                          <div>
                            <b>Username: </b>
                            <?php echo $rows["username"]; ?>
                          </div>

                          <div>
                            <b>Email: </b>
                            <?php echo $rows["email"]; ?>
                          </div>

                          <div>
                            <b>Membro desde: </b>
                            <?php
                            $datestr = strval($rows["adm_desde"]);
                            echo substr($datestr, 5, 2);
                            echo "/";
                            echo substr($datestr, 0, 4);
                            ?>
                          </div>


                        </section>
                      </details>
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
      </div>

      <div class="col">
        <div class="jumbotron card card-image text-white" style="background-color: black;">
          <h1 class="display-4 text-primary  font-weight-bold">CADASTRAR</h1>
          <p class="lead font-weight-bold">Insira abaixo dados do novo ADM</p>

          <form action="cadastro_usuario.php" method="post" class="d-flex flex-column justify-content-center align-items-center ">
            <input class="mb-3 form-control border border-primary" type="text" name="nome" placeholder="Digite o nome">
            <input class="mb-3 form-control border border-primary" type="text" name="username" placeholder="Digite um nome de usuário">
            <input class="mb-3 form-control border border-primary" type="email" name="email" placeholder="Digite o e-mail">
            <input class="mb-3 form-control border border-primary" type="url" name="imagem" placeholder="URL do avatar (opcional)">
            <input class="mb-3 form-control border border-primary" type="password" name="senha" placeholder="Digite uma senha">
            <input class="mb-3 form-control border border-primary" type="password" name="conf_senha" placeholder="Confirme a senha">
            <button class="btn btn-primary btn-block" type="submit"><b>Cadastrar</b></button>
            <button class="btn btn-outline-primary btn-block" type="reset"><b>Limpar</b></button>
          </form>
        </div>
      </div>
    </section>
  </main>


  <div id="displayInfo" class="fixed-top container"></div>


</body>

</html>