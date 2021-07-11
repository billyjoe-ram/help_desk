<?php
    session_start();

    echo '
        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand" href="#">
            <img
                src="./img/logo.png"
                width="30"
                height="30"
                class="d-inline-block align-top"
                alt=""
            >
            App Help Desk
            </a>
    ';
    // Verificando se autenticado não existe e
    // não está autenticado ou não está na página de login.

    // Então jogar um botão pra sair
    if (
        (isset($_SESSION['autenticado'])
        && $_SESSION['autenticado'])
        ||
        !strpos($_SERVER['PHP_SELF'], 'index.php')
    ) {
        echo '
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="logout.php" class="nav-link">SAIR</a>
                </li>
            </ul>
        ';
    }

    // Fechando a navbar
    echo '</nav>';
?>
