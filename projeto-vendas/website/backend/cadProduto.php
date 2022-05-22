<?php
     header("Content-type: application/json"); //retornando em json
     include("classe.php"); //importando o arquivo

     $Produto = new Produto($conn); //classes
     $Seguranca = new Seguranca($conn);

     $dadosProduto = array( //array
         "nome"=>$Seguranca->Limpar($_POST['nome']),
         "unidade"=>$Seguranca->Limpar($_POST['unidade']),
         "preçoCusto"=>$Seguranca->Limpar($_POST['preçoCusto']),
         "preçoVenda"=>$Seguranca->Limpar($_POST['preçoVenda'])
     );
     if($dadosProduto["nome"] == "" OR $dadosProduto["unidade"] =="" OR $dadosProduto["preçoCusto"] == "" OR $dadosProduto["preçoVenda"] == "")
     {
        echo json_encode(array("status" => false, "msg" => "Preencha todos os campos"));
        exit;
     }

     $status = $Produto->Cadastrar($dadosProduto);

     echo json_encode(array("status" => $status));
?>