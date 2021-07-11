<?php
    session_start();
    // Removendo índices do array de sessão
    // Remove só se não existir
    // unset();

    // Não vou usar essa estratégia porque quero matar tudo e não salvar mais cookies agr
    // unset($_SESSION['autenticado']);

    // OU

    // Destruindo variável de sessão
    session_destroy();    

    // Redirecionando pra não ter as variáveis de sessão agora
    // Seria legal tirar com o unset, mas vou usar o destroy porque quero
    header('Location: index.php');