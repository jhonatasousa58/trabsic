$(function(){
    //CONTROLA O LOGIN
    $('form').submit(function(){
        var login = $(this).serialize();
        $.ajax({
            url: 'inc/login.php',
            data: login + '&acao=login',
            type: 'POST',
            beforeSend: function(){
            },
            success: function(resposta){
                if(resposta === '1'){
                    toasts();
                    window.setTimeout(function(){
                        $(location).attr('href','painel.php');
                    }, 1000);
                }else if(resposta === '2'){
                    toastf();
                }else if(resposta === '0'){
                    toastf();
                }else{
                    alert('bugou tudo');
                }
            },
            complete: function(){
            },
            error: function(){
                alert('Erro no sistema!');
            }
        })
        return false;

    });

    function toastf() {
        // Get the snackbar DIV
        var x = document.getElementById("snackbarf");

        // Add the "show" class to DIV
        x.className = "show";

        // After 3 seconds, remove the show class from DIV
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    }
    function toasts() {
        // Get the snackbar DIV
        var x = document.getElementById("snackbars");

        // Add the "show" class to DIV
        x.className = "show";

        // After 3 seconds, remove the show class from DIV
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    }
});