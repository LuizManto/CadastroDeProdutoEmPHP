<?php

class Produto {
    private $codProd;
    private $nome;
    private $unid;
    private $saldoEstoque;

    public function __construct($codProd, $nome, $unid, $saldoEstoque) {
        $this->codProd = $codProd;
        $this->nome = $nome;
        $this->unid = $unid;
        $this->saldoEstoque = $saldoEstoque;
    }

    public function getCodProd() {
        return $this->codProd;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getUnid() {
        return $this->unid;
    }

    public function getSaldoEstoque() {
        return $this->saldoEstoque;
    }
}


?>