<?php

    class Chamado {
        private $ds_titulo;
        private $ds_categoria;
        private $ds_chamado;
        private $dt_chamado;
        
        public function __get($atributo) {
            return $this->$atributo;
        }

        public function __set($atributo, $valor) {
            $this->$atributo = $valor;
        }
    }
