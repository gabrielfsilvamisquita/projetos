<?php

    date_default_timezone_set("America/Sao_Paulo");
    $conn = mysqli_connect("localhost", "root", "", "programa_comercio"); //conexao com banco de dados
    
    class Cliente{

        private $conn;

        function __construct($conn){ //metodo construtor
            $this->conn = $conn;
        }

        function Cadastrar($dados){

            $status = $this->conn->query("INSERT INTO clientes(nome, telefone, cpf, nascimento) VALUES('$dados[nome]', '$dados[telefone]', '$dados[cpf]', '$dados[nascimento]')"); //gravando no banco de dados e retornando se deu erro ou nao
        
            if($status) { //se nao deu erro
                return true; //retorna verdadeiro
            } 
            else { //se deu erro
                return false; //retorna falso
            }

        }
        function Retornar($id = "") {

            $complemento = "";

            if($id != "") {
                $complemento = "WHERE id='$id'";
            }

            $clientes = $this->conn->query("SELECT * FROM clientes $complemento"); //pega todas as informaçoes da tabela
            $retorno = array(); //array p retornar
            $i = 0;

            while($resul = mysqli_fetch_assoc($clientes)) { //estrutura de repetiçao
                
                //$data = new DateTime($resul['nascimento']);
                
                $retorno[$i] = $resul;
                //$retorno[$i]['nascimentoCliente'] = $data->format("d/m/Y");
                $i++;
            }

            return $retorno;
        }

        function Editar($dados){
            $editar = $this->conn->query("UPDATE clientes SET nome='$dados[nome]', telefone='$dados[telefone]', cpf='$dados[cpf]', nascimento='$dados[nascimento]' WHERE id='$dados[id]'");
            if($editar)
            {
                return true;
            }
            else{
                return false;
            }

        }
    }
    class Produto{
        private $conn;

        function __construct($conn){ //metodo construtor
            $this->conn = $conn;
        }

        function Cadastrar($dados){
            $status = $this->conn->query("INSERT INTO produtos(nome, unidade, precoCusto, precoVenda) VALUES('$dados[nome]', '$dados[unidade]','$dados[preçoCusto]','$dados[preçoVenda]')");

            if($status){
                return true;
            }
            else{
                return false;
            }
        }
        function Retornar($id = ""){
           
            $complemento = "";
            if($id != ""){
                $complemento = "WHERE id='$id'";
            }

            $produtos = $this->conn->query("SELECT * FROM produtos $complemento");

            $retorno = array();
            $i = 0;

            while($resul = mysqli_fetch_assoc($produtos)){
                $retorno[$i] = $resul;
                $i++;
            }

            return $retorno;
        }

        function Editar($dados){
            $editar = $this->conn->query("UPDATE produtos SET nome='$dados[nome]', unidade='$dados[unidade]', precoCusto='$dados[precoCusto]', precoVenda='$dados[precoVenda]' WHERE id='$dados[id]'");

            if($editar){
                return true;
            }
            else{
                return false;
            }
        }
    }
    class Venda{

        private $conn;

        function __construct($conn){ //metodo construtor
            $this->conn = $conn;
        }
        function Realizar($venda){

            $data = date("Y-m-d H:i:s");
            $status = $this->conn->query("INSERT INTO vendas(cliente, produto, desconto, data, quantidade) VALUES('$venda[idCliente]', '$venda[idProduto]', '$venda[desconto]', '$data', '$venda[quantidade]')");
        
            return $status;
        }
        function Retorno(){
            $var = $this->conn->query("SELECT c.nome, v.desconto, v.data, v.quantidade, p.nome AS nome_produto FROM vendas AS v INNER JOIN clientes AS c ON c.id = v.cliente INNER JOIN produtos AS p ON p.id = v.produto");
           
            $i = 0;
            $retorno = array();

            while($resul = mysqli_fetch_assoc($var)){
                $retorno[$i] = $resul;
                $i ++;
            }
            return $retorno;
        }
    }

    class Seguranca{

        private $conn;

        function __construct($conn){ //metodo construtor
            $this->conn = $conn;
        }

        function Limpar($campo){   
            return mysqli_real_escape_string($this->conn, $campo); //limpar campo
        }
    }
?>