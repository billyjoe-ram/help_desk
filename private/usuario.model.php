<?php

    class Usuario {
        private $cd_usuario;
        private $ds_email;
        private $ds_senha;
        
        // Não sei se é recomendado usar métodos getters e setters pra usuário e senha
        // Se não for avisa numa issue que corrigo rapidão
        public function __get($atributo) {
            return $this->$atributo;
        }

        public function __set($atributo, $valor) {
            $this->$atributo = $valor;
        }
    }