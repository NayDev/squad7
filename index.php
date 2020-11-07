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
    h1,h2,h3,h4,h5,h6,span{
      font-family: 'Bebas Neue', cursive; /*Titulo*/
    }
    /* main {
      background: linear-gradient(223deg, rgb(109,5,141) 0%, rgb(91,49,147) 95%);
    } */
    .jumbotron {
      color: #FFF; 
      /* background: linear-gradient(223deg, rgb(109,5,141) 0%, rgb(91,49,147) 95%); */
      background-color: #6d078e;
    }
    span {
      background-color: #ff7f00;
      padding: 2px;
    }

    .btn{
      background-color: #6d078e;
      background: linear-gradient(223deg, rgb(109,5,141) 0%, rgb(91,49,147) 95%);
    }
    .card-img-top{
      width: 100px;
      
    }
    .text-center .img-responsive {
    margin: 0 auto;
    }
    .slogan{
      font-size: 5rem;
    }
    .card-text {
      color: #6d078e;
    }

    @media(max-width: 1024px){
      .imgnone  {
      display: none;
    }

    .slogan{
      font-size: 60px;
    }
  
   
}
@media(max-width: 600px){
      .imgnone  {
      display: none;
    }

    .slogan{
      width: 100%;
      font-size: 40px;
      text-align: center;
    }
  
   
}

  </style>

</head>

<body>

  <header>
    <!---------------------- MENU --->
    <?php include('menu.html') ?>

  </header>

  <main>

    <div class="jumbotron jumbotron-fluid text-sm-center">
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col">
            <h1 class="slogan lead"> <span class="m-auto"> DENUNCIE </span><br> A FALTA DE MEDICAMENTOS!</h1>
          </div>
          <div class="col imgnone"><img class="rounded float-right" width="" src="./img/med.png" alt=""></div>
        </div>
      </div>
    </div>

    <section>
      <div class="container">
        <div class="row">
          
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <img class="bd-placeholder-img card-img-top img-responsive mx-auto mt-3" src="./img/sirene.png" alt="Logo">
              <div class="card-body">
                <p class="card-text text-justify p-1">Acesse a ultimas denúncias. O acesso à informação junto com o direito à saúde, são uns dos direitos fundamentais.</p>
                <div class="d-flex justify-content-center align-items-center">
                  <div class="btn-group shadow">
                    <a type="button" href="lista_denuncias.php" class="btn btn-md text-white">Ver denúncias</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <img class="bd-placeholder-img card-img-top img-responsive mx-auto mt-3" src="./img/megafone.png" alt="Logo">
              <div class="card-body">
                <p class="card-text text-justify p-1">Faça uma reclamação da falta de algum dos medicamento que deveria ser fornecido pelo Sistema Único de Saúde.</p>
                <div class="d-flex justify-content-center align-items-center">
                  <div class="btn-group shadow">
                    <a type="button" href="cadastrar_denuncias.php" class="btn btn-md text-white">Denunciar</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <img class="bd-placeholder-img card-img-top img-responsive mx-auto mt-3" src="./img/logo_squad.png" alt="Logo">
              <div class="card-body">
                <p class="card-text text-justify p-1">Projeto desenvolvido no ano de 2020 pelos alunos e alunas do Squad 07 (SP1) da Recode Pro 2020.</p>
                <div class="d-flex justify-content-center align-items-center">
                  <div class="btn-group shadow">
                    <a type="button" href="fale_conosco_sobre.php" class="btn btn-md text-white">Fale conosco</a>
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
