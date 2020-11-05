<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once('bootstrap.html') ?>
  <title>ADM SOS - Login</title>
</head>

<body style="background: rgb(18,18,20);
background: linear-gradient(90deg, rgba(18,18,20,1) 0%, rgba(18,18,20,1) 50%, rgba(83,66,131,1) 100%); color:white;">

  <main class="d-flex">


    <section class="col d-flex justify-content-center align-items-center" style="width: 50vh; height: 100vh;">
      <div style="background-image: url(./img/sos_med.svg); width: 60%; height: 80vh; background-position: center; background-size:contain; background-repeat:no-repeat"></div>
    </section>

    <section class="col d-flex justify-content-center align-items-stretch" style="width: 50vh; height: 100vh;">

      <form action="./login_usuario.php" method="post" class="d-flex flex-column justify-content-center align-items-center">
        <h3 class="mb-4 font-weight-bold text-white">ÁREA DO ADMINISTRADOR</h3>



        <input class="mb-3 form-control border border-white" type="text" name="username" placeholder="Digite o seu username">
        <input class="mb-3 form-control border border-white" type="password" name="senha" placeholder="Digite a sua senha">
        <button class="btn btn-outline-light btn-block" type="submit"><b>Entrar</b></button>
      </form>



    </section>


  </main>
</body>

</html>