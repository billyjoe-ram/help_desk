<?php
  // Requerindo o script de verificação de autenticação

  require_once './services/valida_acesso.php';
?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-home {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <?php
      require_once './components/navbar.php';
    ?>

    <div class="container">    
      <div class="row">

        <div class="card-home">
          <div class="card">
            <div class="card-header">
              Menu
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-6 d-flex justify-content-center">
                  <a href="abrir_chamado.php" style="text-align: center;">
                    <img
                      src="./img/formulario_abrir_chamado.png"
                      width="70"
                      height="70"
                    >
                    <p>Abrir chamado</p>
                  </a>
                </div>
                <div class="col-6 d-flex justify-content-center">
                  <a href="consultar_chamado.php" style="text-align: center;">
                    <img
                      src="./img/formulario_consultar_chamado.png"
                      width="70"
                      height="70"
                    >
                    <p>Consultar chamado</p>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>