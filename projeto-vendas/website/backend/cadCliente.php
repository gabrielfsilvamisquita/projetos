<?php

    header("Content-type: application/json"); //retornando em json
    include("classe.php"); //importando o arquivo

    $Cliente = new Cliente($conn); //importando classes
    $Seguranca = new Seguranca($conn);


    $dadosCliente = array( //recebendo os dados
        "nome"=>$Seguranca->Limpar($_POST["nome"]),
        "telefone"=>$Seguranca->Limpar($_POST["telefone"]),
        "cpf"=>$Seguranca->Limpar($_POST["cpf"]),
        "nascimento"=>$Seguranca->Limpar($_POST["nascimento"]),
    );
    if($dadosCliente["nome"] == "" OR $dadosCliente["telefone"] == "" OR $dadosCliente["cpf"] == "" OR $dadosCliente["nascimento"] == "") //se o campo estiver vazio
    {
        echo json_encode(array("status" => false, "msg" => "Preencha todos os campos")); //retorna erro
        exit; //mata o codigo
    }
    $status = $Cliente->Cadastrar($dadosCliente); //passando os dados

    echo json_encode(array("status" => $status)); //retorna se a funçao cadastrar funcionou ou nao
    

?>