<?php

/*
    session_start();

    if(!$_SESSION['login']) {

        header("Location: login.html");
        exit;

    }

  */  

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagens/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <title>FlySale - Gestor de vendas rápidas</title>
</head>
<body>
    <!--Menu com logo e botões para alternar entre as telas-->
    <header class="menu">
        <div class="logo">
            <img src="imagens/logo.png" alt="Logo do Site">
        </div>
        <nav class="menuBT">
            <button class="botao" tela="home">Home</button>
            <button class="botao" tela="clientes">Clientes</button>
            <button class="botao" tela="produtos">Produtos</button>
            <button class="botao" tela="vendas">Vendas</button>         
        </nav>
        <nav class="mobile">
            <select id="menuBTmobile">
                <option value="home">Home</option>
                <option value="clientes">Clientes</option>
                <option value="produtos">Produtos</option>
                <option value="vendas">Vendas</option>
            </select>
        </nav>
    </header>  
    <!--Conteúdo principal, com todas as telas-->
    <main>
        <!--Tela principal-->
        <div class="tela" id="home">
            <h1>Cadastrar</h1>
            <div class="organizar">
                <input id="nomeUsuario" placeholder="Nome..." class="inputField" type="text">
            </div>
            <div class="organizar">
                <input id="senhaUsuario" placeholder="Senha..." class="inputField" type="password">
            </div>
            <div class="organizar">
                <input id="CsenhaUsuario" placeholder="Confirmar senha..." class="inputField" type="password">
            </div>
            <div class="organizar">
                <button class="BTcadastro" id="BTusuario">Enviar</button>
            </div>
        </div>

        <!--Tela de clientes-->
         <div class="tela" id="clientes">
            <div class="cadastrar">
                <button class="botao" tela="clientesCD"><img src="imagens/add-user.png" alt="Ícone cadastrar usuário"></button>
            </div>
            <div class="alinhar">
                <h1>Clientes cadastrados</h1>
                <div class="lista">

                    <table>
                        <thead>
                            <th>Id</th>
                            <th>Cliente</th>
                            <th>Telefone</th>
                            <th>CPF</th>
                            <th>Data de Nascimento</th>
                        </thead>
                        <tbody id="listaCliente">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
         <!--Tela de cadastrar clientes-->
        <div class="tela" id="clientesCD">
            <div class="alinhar">
                <h1>Cadastrar cliente</h1>
                <div class="organizar">
                    <h2>Nome</h2>
                    <input class="inputField" class="campo" id="nomeCliente" type="text" placeholder="Nome...">
                </div>
                <div class="organizar">
                    <h2>Telefone</h2>
                    <input class="inputField" class="campo" id="telefone" type="number" placeholder="Telefone...">
                </div>
                <div class="organizar">
                    <h2>CPF</h2>
                    <input class="inputField" class="campo" id="cpf" type="text" placeholder="CPF...">
                </div>
                <div class="organizar">
                    <h2>Data de Nascimento</h2>
                    <input class="campo" id="nascimento" type="date">
                </div>
                <div class="organizar">
                    <button id="BTclientes" class="BTcadastro">Cadastrar</button>
                </div>
            </div>
        </div>

          <!--Tela de editar clientes-->
          <div class="tela" id="clientesED">
            <div class="alinhar">
                <h1>Editar cliente</h1>
                <div class="organizar">
                    <h2>Nome</h2>
                    <input class="inputField" class="campo" id="nomeClienteED" type="text" placeholder="Nome...">
                    <input type="hidden" id="idClienteED">
                </div>
                <div class="organizar">
                    <h2>Telefone</h2>
                    <input class="inputField" class="campo" id="telefoneED" type="number" placeholder="Telefone...">
                </div>
                <div class="organizar">
                    <h2>CPF</h2>
                    <input class="inputField" class="campo" id="cpfED" type="text" placeholder="CPF...">
                </div>
                <div class="organizar">
                    <h2>Data de Nascimento</h2>
                    <input class="campo" id="nascimentoED" type="date">
                </div>
                <div class="organizar">
                    <button id="BTclientesED" class="BTcadastro">Editar</button>
                </div>
            </div>
        </div>

        <!--Tela de produtos-->
        <div class="tela" id="produtos">
            <div class="cadastrar">
                <button class="botao" tela="produtosCD">
                    <img src="imagens/cosmeticos.png" alt="Ícone cadastrar Produtos">
                </button>
            </div>
            <div class="alinhar">
                <h1>Produtos cadastrados</h1>
                <div class="lista">
                    <table>
                        <thead>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Unidade</th> 
                            <th>Preço de Custo</th>
                            <th>Preço de Venda</th>
                        </thead>
                        <tbody id="listaProduto">
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      
     <!--Tela de cadastrar produtos-->
    <div class="tela" id="produtosCD">
        <div class="alinhar">
            <h1>Cadastrar produto</h1>
            <div class="organizar">
                <h2>Nome</h2>
                <input class="inputField" class="campo" id="nomeProduto" type="text" placeholder="Nome...">
            </div>
            <div class="organizar">
                <h2>Unidade</h2>
                <select class="campo" id="unidade">
                    <option value="Unidade">UN</option>
                    <option value="Quilograma">KG</option>
                    <option value="Litro">LT</option>
                    <option value="Metro Linear">MT</option>
                </select>
            </div>
            <div class="organizar">
                <h2>Preço de Custo</h2>
                <input class="inputField" class="campo" id="precoCusto" type="number" placeholder="Preço de custo...">
            </div>
            <div class="organizar">
                <h2>Preço de Venda</h2>
                <input class="inputField" class="campo" id="precoVenda" type="number" placeholder="Preço de venda...">
            </div>
            <div class="organizar">
                <button id="BTprodutos" class="BTcadastro">Cadastrar</button>
            </div>
    </div>
    </div>     
       <!--Tela de editar produtos-->
       <div class="tela" id="produtosED">
        <div class="alinhar">
            <h1>Editar produto</h1>
            <div class="organizar">
                <h2>Nome</h2>
                <input class="inputField" class="campo" id="nomeProdutoED" type="text" placeholder="Nome...">
            </div>
            <div class="organizar">
                <h2>Unidade</h2>
                <select class="campo" id="unidadeED">
                    <option value="Unidade">UN</option>
                    <option value="Quilograma">KG</option>
                    <option value="Litro">LT</option>
                    <option value="Metro Linear">MT</option>
                </select>
            </div>
            <div class="organizar">
                <h2>Preço de Custo</h2>
                <input class="inputField" class="campo" id="precoCustoED" type="number" placeholder="Preço de custo...">
            </div>
            <div class="organizar">
                <h2>Preço de Venda</h2>
                <input class="inputField" class="campo" id="precoVendaED" type="number" placeholder="Preço de venda...">
            </div>
            <input type="hidden" id="idProdutoED">
            <div class="organizar">
                <button id="BTprodutosED" class="BTcadastro">Editar</button>
            </div>
    </div>
    </div>     
    

        <!--Tela de vendas-->
        <div class="tela" id="vendas">
            <div class="cadastrar">
                <button class="botao" id="BTvenda" tela="vendasCD"><img src="imagens/saco.png" alt="Ícone cadastrar usuário"></button>
            </div>
            <div class="alinhar">
                <h1>Registro de Vendas</h1>
                <div class="lista">

                    <table>
                        <thead>
                            <th>Data</th>
                            <th>Cliente</th>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Valor Bruto</th>
                            <th>Desconto</th>
                            <th>Valor Final</th>
                        </thead>
                        <tbody id="listaVendas">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--Realizar Vendas-->
        <div class="tela" id="vendasCD">
            <div class="alinhar">
                <h1>Realizar Vendas</h1>
                <div class="organizar">
                    <h2>Cliente</h2>
                    <select id="clienteVenda"></select>
                </div>
                <div class="organizar">
                    <h2>Produto</h2>
                    <select id="produtoVenda">
                   
                    </select>
                </div>
                <div class="organizar">
                    <h2>Quantidade</h2>
                    <input id="quantidade" class="inputField" type="number">
                </div>
                <div class="organizar">
                    <h2>Desconto (R$)</h2>
                    <input id="desconto" class="inputField" type="number">
                </div>
                <div class="organizar">
                    <button id="Rvenda" class="BTcadastro">Realizar</button>
                </div>
        </div>
        </div>     

    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="js/script.js"></script>
</body>
</html>