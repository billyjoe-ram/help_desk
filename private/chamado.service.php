<?php

class ChamadoService {

    private $conexao;
    private $chamado;

    public function __construct(DbConn $conexao, Chamado $chamado) {
        $this->conexao = $conexao->conectar();
        $this->chamado = $chamado;
    }

    public function abrirChamado() {
        session_start();

        // Caso esteja autenticado, abre, se não volta pra logar
        if ($_SESSION['autenticado']) {
            $queryCdUsuario = "select cd_usuario from tb_usuarios where ds_email = :ds_email";

            $stmtUsuario = $this->conexao->prepare($queryCdUsuario);

            $stmtUsuario->bindValue((":ds_email"), $_SESSION['email']);

            $stmtUsuario->execute();
            
            // Trazendo o código de usuário se estiver autenticado segundo o e-mail do usuário autenticado
            $cdUsuarioRetorno = $stmtUsuario->fetchAll(PDO::FETCH_ASSOC);

            $queryChamado = "insert into tb_chamados(
                nm_titulo,
                ds_categoria,
                ds_chamado,
                dt_chamado,
                cd_usuario
                ) values(
                    :nm_titulo,
                    :ds_categoria,
                    :ds_chamado,
                    :dt_chamado,
                    :cd_usuario
                )";
            // Statement
            $stmtChamado = $this->conexao->prepare($queryChamado);
    
            $stmtChamado->bindValue(":nm_titulo", $this->chamado->__get("nm_titulo"));
            $stmtChamado->bindValue(":ds_categoria", $this->chamado->__get("ds_categoria"));
            $stmtChamado->bindValue(":ds_chamado", $this->chamado->__get("ds_chamado"));
            $stmtChamado->bindValue(":dt_chamado", $this->chamado->__get("dt_chamado"));
            // Atribuindo à consulta de query o código de usuário
            $stmtChamado->bindValue(":cd_usuario", $cdUsuarioRetorno[0]['cd_usuario']);
    
            $stmtChamado->execute();
        } else {
            header('Location: ../index.php?status=AUTH');
        }        
    }

    public function recuperarChamados() {
        // *NÃO* use essa query, estou usando só para teste e porque o
        // *MEU* banco de dados, não contém muitos registros!!!
        session_start();

        $emailUsuario = $_SESSION['email'];
        // Instanciando antes para reaproveitar escopo global
        $stmtChamados = new PDOStatement();

        if (!$_SESSION['admin']) {
            $cdUsuarioQuery = "select cd_usuario from tb_usuarios where ds_email = :ds_email";

            $stmtUsuario = $this->conexao->prepare($cdUsuarioQuery);

            $stmtUsuario->bindValue(":ds_email", $emailUsuario);

            $stmtUsuario->execute();

            $cdUsuario = $stmtUsuario->fetchAll(PDO::FETCH_ASSOC);

            $arrTodosChamados = [];

            // Estou em dúvida se devo destruir esse índice ou não
            // unset($_SESSION['email']);

            // Verifica se existe um cd pra esse usuário
            
            if (count($cdUsuario)) {
                $queryChamados = "select nm_titulo, ds_categoria, ds_chamado
                    from tb_chamados where cd_usuario = :cd_usuario";
                // Preparando um statement com a query
                $stmtChamados = $this->conexao->prepare($queryChamados);

                // Pegando o usuário 
                $stmtChamados->bindValue(":cd_usuario", $cdUsuario[0]['cd_usuario']);
            }
        } else {
            // Seleciona TUDO caso seja admin
            $queryChamados = "select nm_titulo, ds_categoria, ds_chamado from tb_chamados";
            // Preparando um statement com a query
            $stmtChamados = $this->conexao->prepare($queryChamados);
        }
        
        // Executando PDOStatement
        $stmtChamados->execute();
        
        // Buscando todos como objeto
        $arrTodosChamados = $stmtChamados->fetchAll(PDO::FETCH_ASSOC);
        
        return $arrTodosChamados;
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