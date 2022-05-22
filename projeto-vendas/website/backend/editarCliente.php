<?php
    header("Content-type: application/json"); //retornando em json
    include("classe.php");

    $Cliente = new Cliente($conn);

    $dadosCliente = array(
        "nome"=> $_POST['nome'],
        "telefone"=> $_POST['telefone'],
        "cpf"=> $_POST['cpf'],
        "nascimento"=> $_POST['nascimento'],
        "id"=> $_POST['id']
    );
    if($dadosCliente["nome"] == "" OR $dadosCliente["telefone"] == "" OR $dadosCliente["cpf"] == "" OR $dadosCliente["nascimento"] == "") //se o campo estiver vazio
    {
        echo json_encode(array("status" => false, "msg" => "Preencha todos os campos")); //retorna erro
        exit; //mata o codigo
    }

    echo json_encode(array("status" => $Cliente->Editar($dadosCliente)));


?>