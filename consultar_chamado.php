<?php
  // Requerindo o script de verificação de autenticação

  require_once './services/valida_acesso.php';

  require_once './private/db_conn.php';

  require_once './private/chamado.model.php';

  require_once './private/chamado.service.php';

  // Instanciando conexao
  $db_conn = new DbConn();

  // Instanciando classe requerida
  $chamado = new Chamado();

  $chamado_service = new ChamadoService($db_conn, $chamado);

  $todosChamados = $chamado_service->recuperarChamados();
?>

<html>
  <?php
    // Requerindo o head padrão

    require_once './components/head.php';
  ?>

  <body>

    <?php
      require_once './components/navbar.php';
    ?>

    <div class="container">    
      <div class="row">

        <div class="card-hdesk">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              <?php
                // Iterando para cada chamado na lista de chamados
                // Foreach fechando na linha 64
                foreach($todosChamados as $chamado) {
                
              ?>
                <div class="card mb-3 bg-light">
                  <div class="card-body">
                    <h5 class="card-title"><?= $chamado['nm_titulo'] ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted">
                      <?= $chamado['ds_categoria'] ?>
                    </h6>
                    <p class="card-text">
                      <?= $chamado['ds_chamado'] ?>
                    </p>
                  </div>
                </div>
              <?php
                }
              ?>

              <div class="row mt-5">
                <div class="col-6">
                  <a href="home.php" class="btn btn-lg btn-warning btn-block" type="submit">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>