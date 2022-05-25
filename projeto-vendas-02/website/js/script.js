$(function(){
    //Geral
    //Códigos de funcionamento geral: clientes, produtos e vendas
    
    $(".botao").click(function(){
        let tela = $(this).attr("tela");//pega o atributo tela

        $(".tela").hide();//esconder todas
        $("#"+tela).fadeIn();//mostrar a escolhida
    });
});