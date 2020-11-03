<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home - SOS Medicamentos</title>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Bree+Serif&display=swap" rel="stylesheet">
  <?php include('./ADM/bootstrap.html') ?>


  <style>
    *{
      font-family: 'Bree Serif', serif;
    }
    h1,h2,h3,h4,h5,h6{
      font-family: 'Bebas Neue', cursive; /*Titulo*/
    }
    main {
      background-color: #631647;
    }
    .jumbotron {
      color: #ff8b0d; 
      background: linear-gradient(223deg, rgb(109,5,141) 0%, rgb(91,49,147) 95%);
    }
  </style>

</head>

<body>

  <header>
    <!----------------------------- MENU --->
    <?php include('menu.html') ?>

  </header>

  <main>



    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-6">
            <h1>DENUNCIE A FALTA DE MEDICAMENTO!</h1>
          </div>
          <div class="col-6"><img width="100%" src="./img/pesq.png" alt=""></div>
        </div>
      </div>
    </div>

    <section>

      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <img class="bd-placeholder-img card-img-top" width="100%" src="https://c.files.bbci.co.uk/1E5C/production/_107427770_hi053578994.jpg" alt="">
              <div class="card-body">
                <p class="card-text">Acesse a ultimas denúncias. O acesso à informação junto com o direito à saúde, são uns dos direitos fundamentais.</p>
                <div class="d-flex justify-content-center align-items-center">
                  <div class="btn-group">
                    <a type="button" href="lista_denuncias.php" class="btn btn-md btn-outline-warning">Ver denuncias</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <img class="bd-placeholder-img card-img-top" width="100%" src="https://c.files.bbci.co.uk/1E5C/production/_107427770_hi053578994.jpg" alt="">
              <div class="card-body">
                <p class="card-text">Faça uma reclamação da falta de algum dos medicamento que deveria ser fornecido pelo Sistema Único de Saúde</p>
                <div class="d-flex justify-content-center align-items-center">
                  <div class="btn-group">
                    <a type="button" href="cadastrar_denuncias.php" class="btn btn-md btn-outline-warning">Denunciar</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <img class="bd-placeholder-img card-img-top" width="100%" src="https://c.files.bbci.co.uk/1E5C/production/_107427770_hi053578994.jpg" alt="">
              <div class="card-body">
                <p class="card-text">Projeto desenvolvido no ano de 2020 pelos alunos e alunas do Squad 07 (SP-01) da Recode Pro.</p>
                <div class="d-flex justify-content-center align-items-center">
                  <div class="btn-group">
                    <a type="button" href="fale_conosco_sobre.php" class="btn btn-md btn-outline-warning">Fale conosco</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include('rodape.html') ?>

</body>

</html>