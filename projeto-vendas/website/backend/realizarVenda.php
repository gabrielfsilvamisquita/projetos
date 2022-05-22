<?php
    header("Content-type: application/json");
    include("classe.php");

    $venda = new Venda($conn);

    $dados = array(
        "idCliente"=> $_POST["idCliente"],
        "idProduto"=> $_POST["idProduto"],
        "quantidade"=> $_POST["quantidade"],
        "desconto"=> $_POST["desconto"]
    );

    $venda->Realizar($dados);

    echo json_encode($venda->Retorno());

?>