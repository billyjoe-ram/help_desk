<?php

class ChamadoService {

    private $conexao;
    private $chamado;

    public function __construct(DbConn $conexao, Chamado $chamado) {
        $this->conexao = $conexao->conectar();
        $this->chamado = $chamado;
    }

    public function abrirChamado() {
        $query = "insert into tb_chamados(
            nm_titulo
            ds_categoria,
            ds_chamado,
            dt_chamado,
            cd_usuario
            ) values(
                :nm_titulo,
                :ds_categoria,
                :ds_chamado,
                :cd_usuario,
            )";
        // Statement
        $stmt = $this->conexao->prepare($query);        

        $stmt->bindValue(":nm_titulo", $this->chamado->__get("nm_titulo"));
        $stmt->bindValue(":ds_categoria", $this->chamado->__get("ds_categoria"));
        $stmt->bindValue(":ds_chamado", $this->chamado->__get("ds_chamado"));
        $stmt->bindValue(":dt_chamado", $this->chamado->__get("dt_chamado"));
        $stmt->bindValue(":cd_usuario", $this->chamado->__get("cd_usuario"));

        $stmt->execute();
    }

    public function recuperarChamados() {
        // *NÃO* use essa query, estou usando só para teste e porque o
        // *MEU* banco de dados, não contém muitos registros!!!
        session_start();

        $emailUsuario = $_SESSION['email'];        

        $cdUsuarioQuery = "select cd_usuario from tb_usuarios where ds_email = :ds_email";

        $stmtUsuario = $this->conexao->prepare($cdUsuarioQuery);

        $stmtUsuario->bindValue(":ds_email", $emailUsuario);

        $stmtUsuario->execute();

        $cdUsuario = $stmtUsuario->fetchAll(PDO::FETCH_ASSOC);

        // Estou em dúvida se devo destruir esse índice ou não
        // unset($_SESSION['email']);

        // Verifica se existe um cd pra esse usuário
        
        if (count($cdUsuario)) {
            $query = "select nm_titulo, ds_categoria, ds_chamado
                from tb_chamados where cd_usuario = :cd_usuario";
            // Preparando um statement com a query
            $stmtChamados = $this->conexao->prepare($query);

            // Pegando o usuário 
            $stmtChamados->bindValue(":cd_usuario", $cdUsuario[0]['cd_usuario']);

            // Executando PDOStatement
            $stmtChamados->execute();
            // Buscando todos como objeto
            return $stmtChamados->fetchAll(PDO::FETCH_ASSOC);
        }
        // Caso não tenha achado o usuário, retorna null (porque não tem nada)
        return null;
    }

    public function atualizarChamado() {
        // $query = 'update tb_chamados set chamado = :chamado where id = :id';

        // Não esqueça que é esse statemente do PDO que vai ajudar a prevenir SQL Injection
        // $stmt = $this->conexao->prepare($query);

        // $stmt->bindValue(":chamado", $this->chamado->__get("chamado"));
        // $stmt->bindValue(":id", $this->chamado->__get("id"));

        // return $stmt->execute();
    }

    public function removerChamado() {
        // $query = "delete from tb_chamados where id = :id";

        // $stmt = $this->conexao->prepare($query);

        // $stmt->bindValue(":id", $this->chamado->__get("id"));

        // return $stmt->execute();
    }
    
}