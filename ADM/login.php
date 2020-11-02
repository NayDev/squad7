<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once('bootstrap.html') ?>
  <title>ADM SOS - Login</title>
</head>

<body style="background-color: black; color:white;">

  <main class="d-flex">


    <section class="col d-flex justify-content-center align-items-center" style="width: 50vh; height: 100vh">
      <div style="background-image: url(./img/logo.png); width: 60%; height: 80vh; background-position: center; background-size:contain; background-repeat:no-repeat"></div>
    </section>

    <section class="col d-flex justify-content-center align-items-stretch" style="width: 50vh; height: 100vh">

      <form action="./login_usuario.php" method="post" class="d-flex flex-column justify-content-center align-items-center">
        <h3 class="mb-4 font-weight-bold text-warning">ÁREA DO ADMINISTRADOR</h3>



        <input class="mb-3 form-control border border-warning" type="text" name="username" placeholder="Digite o seu username">
        <input class="mb-3 form-control border border-warning" type="password" name="senha" placeholder="Digite a sua senha">
        <button class="btn btn-outline-warning btn-block" type="submit"><b>Entrar</b></button>
      </form>

    </section>


  </main>
</body>

</html>