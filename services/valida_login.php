<?php

    require '../private/usuario.model.php';

    require '../private/usuario.service.php';

    require '../private/chamado.service.php';

    require '../private/db_conn.php';

    // Iniciando uma sessão
    session_start();

    // Usuários do sistema
    // Só pra teste vai ficar salvo em um array assoc. (dict.)    

    $usuario_autenticado = false;

    // Criando uma string para status de envio e mensagens de erro
    $status_envio = 'OK';
    
    // Regras de negócio
    
    // 1. O endereço de e-mail deve ser um endereço de e-mail
    // 2. Os campos devem ter pelo menos 8 caracteres
    // 3. A senha deve conter números e letras

    // * Mesmo que algumas regras estejam sendo verificadas no frontend, estou verificando aqui
    // no back também

    if (isset($_POST)) {
        // Já estou salvando as variáveis com o método trim aplicado para facilitar a lógica e a
        // leitura
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        
        // Verificando se não está vazio
        if (!empty($email) && !empty($password)) {
            // Iterando sobre os usuários do array e buscando esse cara

            if (strlen($email) >= 8 && strlen($password) >= 8) {
                // Instanciando conexao
                $db_conn = new DbConn();

                $usuarioService = new UsuarioService($db_conn);
                $status_envio = $usuarioService->logarUsuario($email, $password);
                // Defininado usuário admin ou não
                $usuarioService->verificaAdmin($email, $password);

                $status_envio == 'OK' ? $usuario_autenticado = true : $usuario_autenticado = false;
            } else {
                $status_envio = 'FRML';
            }
        } else {
            $status_envio = 'FRME';
        }
    } else {
        $status_envio = 'ERR';
    }

    // Caso ele tenha passando em todas as verificações, enviar OK
    if ($usuario_autenticado) {
        $_SESSION['autenticado'] = true;
        $_SESSION['email'] = $_POST['email'];
    } else {
        $_SESSION['autenticado'] = false;
    }

    // Por fim, enviar pro index passando o status pra GET
    // * É necessário informar esse retorno porque ainda estou usando diretório, e 
    //  não rotas
    
    // die();
    header('Location: ../index.php?status=' . $status_envio);
