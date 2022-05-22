<?php
   include("classe.php");
   header("Content-type: application/json");

   $produto = new Produto($conn);

   $retorno = $produto->Retornar();

   echo json_encode($retorno);
?>