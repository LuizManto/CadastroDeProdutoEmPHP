<?php

class Produto {
    private $id;
    private $nome;
    private $preco;
    private $quantidade;

    public function __construct($id, $nome, $preco, $quantidade) {
        $this->id = $id;
        $this->nome = $nome;
        $this->preco = $preco;
        $this->quantidade = $quantidade;
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }
}


?>