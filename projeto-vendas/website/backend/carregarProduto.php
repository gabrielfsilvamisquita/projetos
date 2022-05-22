<?php
     header("Content-type: application/json"); //retornando em json
     include("classe.php");

     
    $Produto = new Produto($conn); //classes
    $Seguranca = new Seguranca($conn);

    $id = $Seguranca->Limpar($_GET['id']);
    echo json_encode($Produto->Retornar($id));   
?>