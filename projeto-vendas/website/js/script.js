$(function(){
//CLIENTES
    //functions
    function CarregarCliente(){ //mostrar os clientes em tabela
        $.get("backend/retornarCliente.php", function(retorno){
            $("#listaCliente").html("");
            for(let i = 0; i < retorno.length; i++){
                $("#listaCliente").append(
                   "<tr class='cli' idCli = '"+retorno[i].id +"'>"+
                   "<td>"+retorno[i].id+"</td>"+
                   "<td>"+retorno[i].nome+"</td>"+
                   "<td>"+retorno[i].telefone+"</td>"+
                   "<td>"+retorno[i].cpf+"</td>"+
                   "<td>"+retorno[i].nascimento+"</td>"
                );
            }
        });
    }
    function VerificarCliente(dados){
        if(dados.nome == "" || dados.telefone == "" || dados.cpf== "" || dados.nascimento == "") //se o campo estiver vazio
        {
            alert("Preencha todos os campos");
            return false;
        }
        return true;
    }

    $(document).on("click", ".cli", function() {
        
        let id = $(this).attr("idCli");
        $.get("backend/carregarCliente.php", {id}, function(retorno){
            $("#nomeClienteED").val(retorno[0].nome);
            $("#telefoneED").val(retorno[0].telefone);
            $("#cpfED").val(retorno[0].cpf);
            $("#nascimentoED").val(retorno[0].nascimento);
            $("#idClienteED").val(id);
        });

        $(".tela").hide(200); //mostrar tela
        $("#clientesED").show(); //esconder tela

    });

    $("#BTclientes").click(function(){
        let dadosCliente = { //array
            "nome": $("#nomeCliente").val(),
            "telefone":$("#telefone").val(),
            "cpf":$("#cpf").val(),
            "nascimento":$("#nascimento").val()
        };
        let status = VerificarCliente(dadosCliente);
        if(status){
            $(".campo").val(""); //limpar campo

            $.post("backend/cadCliente.php", dadosCliente, function(retorno){ //enviando os dados para o backend
                if(retorno.status){
                    alert("Cliente cadastrado com sucesso!");
                    CarregarCliente();
                    $(".tela").hide();
                    $("#clientes").fadeIn();
                }
            });
        }
    });

    $("#BTclientesED").click(function(){
        let dadosCliente = { //array
            "nome": $("#nomeClienteED").val(),
            "telefone":$("#telefoneED").val(),
            "cpf":$("#cpfED").val(),
            "nascimento":$("#nascimentoED").val(),
            "id": $("#idClienteED").val()

        };
        let status = VerificarCliente(dadosCliente);
        if(status){
            $.post("backend/editarCliente.php", dadosCliente, function(retorno){ //enviando os dados para o backend
                if(retorno.status){
                    alert("Cliente editado com sucesso!");
                    CarregarCliente();
                    $(".tela").hide(); //esconder tela
                    $("#clientes").fadeIn(); //mostrar tela
                }
            });
          
        }
        $(".campo").val(""); //limpar campo
    });
//PRODUTOS
    //functions
    function CarregarProduto(){
        $.get("backend/retornarProduto.php", function(retorno){
            $("#listaProduto").html("");
            for(let i = 0; i < retorno.length; i++){
                $("#listaProduto").append(
                    "<tr class='pro' idPro='"+retorno[i].id+"'>"+
                    "<td>"+retorno[i].id+"</td>"+
                    "<td>"+retorno[i].nome+"</td>"+
                    "<td>"+retorno[i].unidade+"</td>"+
                    "<td>"+Number(retorno[i].precoCusto).toLocaleString("pt-br", {style: 'currency', currency:"BRL"})+"</td>"+
                    "<td>"+Number(retorno[i].precoVenda).toLocaleString("pt-br", {style: 'currency', currency:"BRL"})+"</td>"
                );
            }
        });
    }
    function VerificarProduto(dados){
    if(dados.nome == "" || dados.unidade == null || dados.preçoCusto == "" || dados.preçoVenda == ""){
            alert("Preencha todos os campos");
            return false;
       }      
        return true;
    }
    $(document).on("click", ".pro", function(){
        let id = $(this).attr("idPro");
        $.get("backend/carregarProduto.php", {id}, function(retorno){
            $("#nomeProdutoED").val(retorno[0].nome),
            $("#unidadeED").val(retorno[0].unidade),
            $("#precoCustoED").val(retorno[0].precoCusto),
            $("#precoVendaED").val(retorno[0].precoVenda)
        });
        
        $("#idProdutoED").val(id);
        $(".tela").hide(200);
        $("#produtosED").show();
        
    });
    $("#BTprodutos").click(function(){
        let dadosProduto = {
            "nome" : $("#nomeProduto").val(),
            "unidade" : $("#unidade").val(),
            "preçoCusto" : $("#precoCusto").val(),
            "preçoVenda" : $("#precoVenda").val()
        };
      let status = VerificarProduto(dadosProduto);
      if(status){
        $(".campo").val("");
        $.post("backend/cadProduto.php", dadosProduto, function(retorno){
            if(retorno.status){
                alert("Produto Cadastrado com Sucesso!!");
                CarregarProduto();
                $(".tela").hide();
                $("#produtos").fadeIn();
            }
        });
      }
    });
    $("#BTprodutosED").click(function(){
        let dadosProduto = {
            "nome" : $("#nomeProdutoED").val(),
            "unidade" : $("#unidadeED").val(),
            "precoCusto" : $("#precoCustoED").val(),
            "precoVenda" : $("#precoVendaED").val(),
            "id": $("#idProdutoED").val()
        };
      let status = VerificarProduto(dadosProduto);
      if(status){
        $(".campo").val("");
        $.post("backend/editarProduto.php", dadosProduto, function(retorno){
            if(retorno.status){
                alert("Produto editado com Sucesso!!");
                CarregarProduto();
                $(".tela").hide();
                $("#produtos").fadeIn();
            }
        });
      }
    });

//VENDAS
    //funçoes
    function Carregar(id, dados){
        $("#"+id).html("");
        for(let i = 0; i < dados.length; i++){
            $("#"+id).append(
                "<option value='"+dados[i].id+"'>"+dados[i].nome+"</option>"
            );
        }
    }
    function CarregarVendas(){
        $.get("backend/retornarVenda.php", function(dados){
            $("#listaVendas").html("");
            for(let i = 0; i < dados.length; i++){
                $("listaVendas").append(
                    "<tr class='vend' idV="+dados[i].id+">"+
                    "<td>"+dados[i].data+"</td>"+
                    "<td>"+dados[i].nome+"</td>"+
                    "<td>"+dados[i].nome_produto+"</td>"+
                    "<td>"+dados[i].quantidade+"</td>"+
                    "<td>"+dados[i].data+"</td>"
                    );
            }
        });
    }
    $("#BTvenda").click(function(){
        $.get("backend/retornarCliente.php", function(dados){
            Carregar("clienteVenda", dados);
        });
        $.get("backend/retornarProduto.php", function(dados){
            Carregar("produtoVenda", dados);
        });
    });
    $("#Rvenda").click(function(){
        let dados = {
            "idCliente": $("#clienteVenda").val(),
            "idProduto": $("#produtoVenda").val(),
            "quantidade": $("#quantidade").val(),
            "desconto": $("#desconto").val()
        };
        $.post("backend/realizarVenda.php", dados, function(retorno){
            console.log(retorno);
        });
    });
//GERAL
    $(".botao").click(function(){ //quando qqr botao for pressionado
        let tela = $(this).attr("tela"); //pegar atributo tela       
        switch(tela){
            case 'clientes':
                CarregarCliente();
                break;
            case 'produtos':
                CarregarProduto();
                break;
            case 'vendas':
                CarregarVendas();
                break;
            default:
                console.log('tela não encontrada');
                break;
        }

        $(".tela").hide(180); //esconder tela
        $("#"+tela).show(); //mostrar tela
    });
    $("#menuBTmobile").change(function(){
        
    let tela = $(this).val();

       switch(tela){
            case 'clientes':
                CarregarCliente();
                break;
            case 'produtos':
                CarregarProduto();
                break;
            case 'vendas':
                CarregarVendas();
                break;
            default:
                console.log('tela não encontrada');
                break;     
       }

       $(".tela").hide(180); //esconder tela
       $("#"+tela).show(); //mostrar tela

    });
    $("#BTusuario").click(function(){
        let dados = {
            "nome": $("#nomeUsuario").val(),
            "senha": $("#senhaUsuario").val(),
            "confirmarSenha": $("#CsenhaUsuario").val()
        }
        if(dados.senha != dados.confirmarSenha){
            return false;
        }
        $.post("backend/cadUsuario.php", dados, function(retorno){
            console.log(retorno);
        });
    });
  
    
});