$(function(){
    $("#clean").click(function(){
        $("#code").val("");
        $("#website").html("");
    }); //limpar codigo

    $("#code").keyup(function(){
        let code = $(this).val();
        $("#website").html("");
        $("#website").append(code);
    });
    
    $("#font").change(function(){
    
        switch($(this).val()){
            case 'sans-serif':
                AlterarFonte("Arial, sans-serif");
                break;
            case 'serif':
                AlterarFonte("Libre Baskerville, serif");
                break; 
            case 'hand-writing':
                AlterarFonte("Courgette, cursive");
                break;   
        default:
        break;
        }
    });
       
    function AlterarFonte(font){
        $("#code").css(
            "font-family", font
        );
    }
});



