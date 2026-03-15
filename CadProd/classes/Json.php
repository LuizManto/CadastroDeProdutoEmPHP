<?php
class Json{

    private $conteudo;
    private $nomeArquivo;

    function __construct($conteudo,$nomeArq)
    {
        $this -> conteudo = $conteudo;
        $this->nomeArquivo = $nomeArq;
    }

    public function gravar()
    {
        file_put_contents($this->nomeArquivo, $this->conteudo);

    }

    public function ler($nomeArq)
    {
        $this-> nomeArquivo = $nomeArq;
        $this->conteudo = file_get_contents($nomeArq);
    }
    
    public function getConteudo() {
        return $this->conteudo;
    }
}
?>