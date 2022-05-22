$(function(){
    $("#Add").click(function(){

        let tarefa = $("#inputTarefa").val();

        $("#tarefas").append(
           "<div class='tarefa' idTarefa='0'>"
           +"<span>"+escape(tarefa)+"</span>"
           +"<button class='editar'> <span class='fa fa-pencil'></span> </button>"
           +"<button class='apagar'> <span class='fa fa-trash'></span> </button>"
           +"</div>"
        );
        $("#inputTarefa").val("");
    });
});