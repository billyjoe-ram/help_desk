<?php
  // Iniciando uma sessão;
  session_start();

  // Caso não exista o índice "autenticado" ou "autenticado" seja false, redirecione
  if (!isset($_SESSION['autenticado']) || !$_SESSION['autenticado']) {
    header('Location: index.php?status=AUTH');
  }
