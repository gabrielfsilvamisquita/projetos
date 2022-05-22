<?php
    header("Content-type: application/json"); //retornando em json
    include("classe.php"); //importando o arquivo

    $Cliente = new Cliente($conn); //classes
    $Seguranca = new Seguranca($conn);

    $id = $Seguranca->Limpar($_GET['id']);
    echo json_encode($Cliente->Retornar($id));
?>