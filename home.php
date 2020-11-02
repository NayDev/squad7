<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home - SOS Medicamentos</title>

  <?php include('./ADM/bootstrap.html') ?>


  <style>
    main {
      background-color: #631647;
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
            <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h2>
          </div>
          <div class="col-6"><img width="100%" src="https://c.files.bbci.co.uk/1E5C/production/_107427770_hi053578994.jpg" alt=""></div>
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
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, aspernatur!</p>
                <div class="d-flex justify-content-center align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-md btn-outline-warning">Ver denuncias</button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <img class="bd-placeholder-img card-img-top" width="100%" src="https://c.files.bbci.co.uk/1E5C/production/_107427770_hi053578994.jpg" alt="">
              <div class="card-body">
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, aspernatur!</p>
                <div class="d-flex justify-content-center align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-md btn-outline-warning">Denunciar</button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <img class="bd-placeholder-img card-img-top" width="100%" src="https://c.files.bbci.co.uk/1E5C/production/_107427770_hi053578994.jpg" alt="">
              <div class="card-body">
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, aspernatur!</p>
                <div class="d-flex justify-content-center align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-md btn-outline-warning">Fale conosco</button>
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