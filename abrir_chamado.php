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
                  
                  <form action="./services/registra_chamado.php" method="post">
                    <div class="form-group">
                      <label for="titulo">Título</label>
                      <input
                        type="text"
                        name="titulo"
                        id="titulo"
                        class="form-control"
                        placeholder="Título"
                      >
                    </div>
                    
                    <div class="form-group">
                      <label for="categoria">Categoria</label>
                      <select class="form-control" name="categoria" id="categoria">
                        <option>Criação Usuário</option>
                        <option>Impressora</option>
                        <option>Hardware</option>
                        <option>Software</option>
                        <option>Rede</option>
                      </select>
                    </div>
                    
                    <div class="form-group">
                      <label for="descricao">Descrição</label>
                      <textarea
                        name="descricao"
                        id="descricao"
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
                          <button
                            name="enviar"
                            class="btn btn-lg btn-info btn-block"
                            type="submit"
                          >
                            Abrir                          
                          </button>
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