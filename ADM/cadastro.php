<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once('bootstrap.html') ?>
  <title>ADM SOS - Cadastro</title>
</head>

<body class="d-flex" style="background-color: black; color:white;">

  <main class="col d-flex justify-content-center align-items-stretch" style="width: 100vh; height: 100vh">
    <form action="cadastro_usuario.php" method="post" class="d-flex flex-column justify-content-center align-items-center">
      <h3 class="mb-4 font-weight-bold text-warning">DADOS DO NOVO ADM</h3>
      <input class="mb-3 form-control border border-warning" type="text" name="nome" placeholder="Digite o nome">
      <input class="mb-3 form-control border border-warning" type="text" name="username" placeholder="Digite um nome de usuário">
      <input class="mb-3 form-control border border-warning" type="email" name="email" placeholder="Digite o e-mail">
      <input class="mb-3 form-control border border-warning" type="url" name="imagem" placeholder="URL do avatar (opcional)">
      <input class="mb-3 form-control border border-warning" type="password" name="senha" placeholder="Digite uma senha">
      <input class="mb-3 form-control border border-warning" type="password" name="conf_senha" placeholder="Confirme a senha">
      <button class="btn btn-outline-warning btn-block" type="submit"><b>Cadastrar</b></button>
    </form>
  </main>

</body>

</html>