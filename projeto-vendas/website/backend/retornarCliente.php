<?php
    header("Content-type: application/json");
    include("classe.php");

    $clientes = new Cliente($conn);

    $retorno = $clientes->Retornar();

    echo json_encode($retorno);
?>