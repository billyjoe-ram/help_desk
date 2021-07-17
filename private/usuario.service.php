<?php

class UsuarioService {

    private $conexao;

    public function __construct(DbConn $conexao) {
        $this->conexao = $conexao->conectar();
    }

    // Função que retorna um código de autenticação caso ache o usuário,
    // ache mas não ache a senha
    // ou caso não ache o usuário
    public function logarUsuario($email, $password) {
        $queryUsuario = "select ds_email, ds_senha from tb_usuarios
            where ds_email = :ds_email";

        // Statement
        $stmtAutenticacao = $this->conexao->prepare($queryUsuario);        
        
        $stmtAutenticacao->bindValue(":ds_email", $email);

        $stmtAutenticacao->execute();

        $usuarioAutenticacao = $stmtAutenticacao->fetchAll(PDO::FETCH_ASSOC);

        // Verificando se veio algo
        if (count($usuarioAutenticacao)) {
            // Pegando o índice 0 para prevenir usuários MÚLTIPOS
            $senhaUsuario = $usuarioAutenticacao[0]['ds_senha'];

            return password_verify($password, $senhaUsuario) ? 'OK' : 'WNRPASS';
        }
        return 'UNOW';
    }

    public function verificaAdmin($email, $password) {
        // PROVAVELMENTE (99% DE CTZ) NÃO É ESSE O MELHOR JEITO DE GUARDAR OS USUÁRIOS
        // QUE PODEM ACESSAR TUDO (ADMIN) KKKKKKK
        $usuariosAdmin = ['admin@admin.com'];

        $codigoAutenticacao = $this->logarUsuario($email, $password);

        // Se é um dos admins e ele é "logável" ("autenticável")
        if (in_array($email ,$usuariosAdmin) && $codigoAutenticacao === 'OK') {
            $_SESSION['admin'] = true;
            return true;
        } else {
            return false;
        }
    }
    
}
