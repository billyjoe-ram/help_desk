<?php
  // Requerindo o script de verificação de autenticação

  require_once './services/valida_acesso.php';
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
              Abertura de chamado
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col">
                  
                  <form>
                    <div class="form-group">
                      <label>Título</label>
                      <input type="text" class="form-control" placeholder="Título">
                    </div>
                    
                    <div class="form-group">
                      <label>Categoria</label>
                      <select class="form-control">
                        <option>Criação Usuário</option>
                        <option>Impressora</option>
                        <option>Hardware</option>
                        <option>Software</option>
                        <option>Rede</option>
                      </select>
                    </div>
                    
                    <div class="form-group">
                      <label>Descrição</label>
                      <textarea
                        class="form-control"
                        rows="3"
                        style="resize: none;"
                      ></textarea>
                    </div>

                    <div class="row mt-5">
                      <div class="col-6">
                        <a href="home.php" style="text-decoration: none;">
                          <button
                            class="btn btn-lg btn-warning btn-block"
                            type="button"
                          >
                            Voltar
                          </button>
                        </a>
                      </div>

                      <div class="col-6">
                        <a href="#" style="text-decoration: none;">
                          <button
                            class="btn btn-lg btn-info btn-block"
                            type="button"
                          >
                            Abrir                          
                          </button>
                        </a>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>