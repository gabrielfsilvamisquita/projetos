<?php
        header("Content-type: application/json"); //retornando em json
        include("classe.php"); //importando o arquivo

        $Usuario = new Usuario($conn);
        $Seguranca = new Seguranca($conn);

        $dados = array(
            "nome"=>$Seguranca->Limpar($_POST['nome']),
            "senha"=>$Seguranca->Limpar($_POST['senha']),
            "confirmarSenha"=>$Seguranca->Limpar($_POST['confirmarSenha'])
        );

        $quantUsuario = $Usuario->Verificar($dados['nome']);
        if($quantUsuario){
            echo json_encode(array("status"=> false, "msg"=>"Usuário já existente"));
            exit;
        }

        $Usuario->Cadastrar($dados);
?>