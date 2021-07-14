<?php

    // Iniciando uma sessão
    session_start();

    // Usuários do sistema
    // Só pra teste vai ficar salvo em um array assoc. (dict.)
    $usuarios_app = [
        ['email' => 'admin@admin.com', 'password' => 'administrator'],
        ['email' => 'test@test.com', 'password' => 'testing!'],
        ['email' => 'dev@dev.com', 'password' => 'developer'],
    ];

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
                foreach($usuarios_app as $usuario) {
                    if ($email == $usuario['email']) {
                        // Estou fazendo essa verificação para dizer se a senha está errada ou
                        // não
                        if ($password == $usuario['password']) {
                            $usuario_autenticado = true;
                        } else {
                            // Código de senha incorreta
                            $status_envio = 'WNRPASS';
                        }

                        // Terminando o foreach se achar, porque se o usuário buscado
                        // for o primeiro do array, não vai dar certo, ele vai acabar false
                        break;
                    } else {
                        $usuario_autenticado = false;
                        $status_envio = 'UNOW';
                    }
                }
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
        $status_envio = 'OK';
        
        $_SESSION['autenticado'] = true;
        $_SESSION['email'] = $_POST['email'];
    } else {
        $_SESSION['autenticado'] = false;
    }

    // Por fim, enviar pro index passando o status pra GET
    // * É necessário informar esse retorno porque ainda estou usando diretório, e 
    //  não rotas
    header('Location: ../index.php?status=' . $status_envio);
