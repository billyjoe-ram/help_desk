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
            dt_chamado
            ) values(
                :nm_titulo,
                :ds_categoria,
                :ds_chamado,
                :dt_chamado
            )";
        // Statement
        $stmt = $this->conexao->prepare($query);        

        $stmt->bindValue(":nm_titulo", $this->chamado->__get("nm_titulo"));
        $stmt->bindValue(":ds_categoria", $this->chamado->__get("ds_categoria"));
        $stmt->bindValue(":ds_chamado", $this->chamado->__get("ds_chamado"));
        $stmt->bindValue(":dt_chamado", $this->chamado->__get("dt_chamado"));

        $stmt->execute();
    }

    public function recuperarChamados() {
        // *NÃO* use essa query, estou usando só para teste e porque o
        // *MEU* banco de dados, não contém muitos registros!!!
        $query = "select * from tb_chamados";
        // Preparando um statement com a query
        $stmt = $this->conexao->prepare($query);

        // Executando PDOStatement
        $stmt->execute();
        // Buscando todos como objeto
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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