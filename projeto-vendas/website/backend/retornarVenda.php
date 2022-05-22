<?php
  header("Content-type: application/json"); //retornando em json
  include("classe.php");

  $Venda = new Venda($conn);
  $retorno = $Venda->Retorno();
  echo json_encode($retorno);
?>