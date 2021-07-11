<?php
  $codigo_status = $_GET['status'];

  // Variável para ser mensagem de erro caso tenha erro;
  $msg_erro = '';

  // Se existe algo no índice 'status' do GET, segue
  if (isset($codigo_status)) {
    // Verifique o README do repo para saber mais sobre as mensagens de erro
    switch ($codigo_status) {
      case 'OK':
        header('Location: home.php');
      break;
      case 'WNRPASS':
        $msg_erro = 'Senha incorreta para usuário informado';
      break;
      case 'UNOW':
        $msg_erro = 'Usuário não consta na base de dados';
      break;
      case 'FRML':
        $msg_erro = 'Campos não preenchidos corretamente';
      break;
      case 'FRME':
        $msg_erro = 'Campos vazios detecador';
      break;
      case 'ERR':
        $msg_erro = 'Ocorreu algum erro, tente novamente mais tarde';
      break;
      case 'AUTH':
        $msg_erro = 'Usuário não logado';
      break;
      default:
        header('Location: ' . $_SERVER['PHP_SELF']);
      break;
    }
  }
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
      <div class="card-hdesk" style="width: 350px;">
        <div class="card">
          <div class="card-header">
            Login
          </div>
          <div class="card-body">
            <form action="./services/valida_login.php" method="post">
              <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="E-mail" minlength="8">
              </div>
              <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Senha" minlength="8">
              </div>
              <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <?php
      // Trecho de código PHP para lidar com possíveis erros ou mostrar sucesso

      // Se tiver mensagem de erro
      if (!empty($msg_erro)) {

      // If fechando na linha 98
    ?>
        <div class="row justify-content-center mt-3">
          <div class="alert alert-danger">
            <?= $msg_erro ?>
          </div>
        </div>
    <?php
      }         
    ?>
  </div>
</body>

</html>