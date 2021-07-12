<?php

    require '../private/chamado.model.php';

    require '../private/chamado.service.php';

    require '../private/db_conn.php';

    // Checando se veio informação do btn:submit
    if (isset($_POST['enviar'])) {
        if (!empty($_POST['titulo'])
            && !empty($_POST['categoria'])
            && !empty($_POST['descricao'])
        ) {
            // Instanciando conexao
            $db_conn = new DbConn();

            // Instanciando classe requerida
            $chamado = new Chamado();
                        
            $dt_descricao = date('Ymd_His');
            
            $chamado->__set('ds_titulo', $_POST['titulo']);
            $chamado->__set('ds_categoria', $_POST['categoria']);
            $chamado->__set('ds_chamado', $_POST['descricao']);

            $chamado->__set('dt_chamado', $dt_descricao);

            $chamado_service = new ChamadoService($db_conn, $chamado);
            
            $chamado_service->abrirChamado();

            header('Location: ../abrir_chamado.php');
        }
    }