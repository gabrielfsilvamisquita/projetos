<?php
    header("Content-type: application/json"); //retornando em json
    include("classe.php");

    $Produto = new Produto($conn);
    $dadosProduto = array(
        "nome"=> $_POST['nome'],
        "unidade"=> $_POST['unidade'],
        "precoCusto"=> $_POST['precoCusto'],
        "precoVenda"=> $_POST['precoVenda'],
        "id"=> $_POST['id']
    );

    
    echo json_encode(array("status"=> $Produto->Editar($dadosProduto)));

?>