<?php
include("classes/Produto.php");
include("classes/Json.php");

$arquivo = "prodsalvos.json";
$produtos = [];

if(file_exists($arquivo)){
    $json = new Json("", $arquivo);
    $json->ler($arquivo);
    $conteudo = $json->getConteudo();

    if($conteudo != ""){
        $produtos = json_decode($conteudo, true);
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $cod = $_POST["codProd"];
    $nome = $_POST["nome"];
    $unid = $_POST["unid"];
    $saldo = $_POST["saldoEstoque"];

    $produto = new Produto($cod,$nome,$unid,$saldo);

    $novoProduto = [
        "codProd" => $produto->getCodProd(),
        "nome" => $produto->getNome(),
        "unid" => $produto->getUnid(),
        "saldoEstoque" => $produto->getSaldoEstoque()
    ];

    $produtos[] = $novoProduto;

    $conteudoJson = json_encode($produtos, JSON_PRETTY_PRINT);

    $json = new Json($conteudoJson, $arquivo);
    $json->gravar();

}

if(isset($_GET["excluir"])){

    $codExcluir = $_GET["excluir"];

    foreach($produtos as $indice => $p){

        if($p["codProd"] == $codExcluir){

            unset($produtos[$indice]);

        }

    }

}

$conteudoJson = json_encode(array_values($produtos), JSON_PRETTY_PRINT);

$json = new Json($conteudoJson, $arquivo);
$json->gravar();

?>

<!DOCTYPE html>
<html>
<head>
<title>Cadastro de Produtos</title>
</head>

<body>

<h2>Cadastrar Produto</h2>

<form method="POST">

Código:<br>
<input type="text" name="codProd" required><br><br>

Nome:<br>
<input type="text" name="nome" required><br><br>

Unidade:<br>
<input type="text" name="unid" required><br><br>

Saldo em Estoque:<br>
<input type="number" name="saldoEstoque" required><br><br>

<button type="submit">Salvar</button>

</form>

<hr>

<h2>Produtos Cadastrados</h2>

<table border="1">

<tr>
<th>Código</th>
<th>Nome</th>
<th>Unidade</th>
<th>Estoque</th>
</tr>

<?php
foreach($produtos as $p){
    echo "<tr>";
    echo "<td>".$p["codProd"]."</td>";
    echo "<td>".$p["nome"]."</td>";
    echo "<td>".$p["unid"]."</td>";
    echo "<td>".$p["saldoEstoque"]."</td>";
    echo "<td><a href='?excluir=".$p["codProd"]."'>Excluir</a></td>";
    echo "</tr>";
}
?>

</table>

</body>
</html>
