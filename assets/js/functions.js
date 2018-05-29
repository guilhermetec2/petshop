function openMenu() {
    var x = document.getElementById("menu");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}

//////////////////////////////////////////////////////////////////
var myIndex = 0;
// carousel() - chamar está função direto na view

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2500);    
}

//////////////////////////////////////////////////////////////////
function openAccord(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}
////////////////////////////////////////////////////////////////////
function atualizaTotal(lastindex)
{
    var totalVal = 0;
    var totalQtd = 0;
    var somaVal  = 0;

    for(var i = 0; i <= lastindex; i++){
        var preco = parseFloat($('#preco_' + i).val());
        var qtd   = parseInt($('#qtd_' + i).val());

        somaVal  = preco * qtd;
        totalVal = totalVal + somaVal;
        totalQtd = totalQtd + qtd;
    }

    $('#total').val(totalVal);
    $('#itens').val(totalQtd);

}



$(document).ready(function () {
    $("body").on('change','.produto',function () {

        var produtoId = $(this).val();
        var inputId = $(this).attr('name');
        var index = inputId.split('_');     

        $.ajax({
            method: "POST",
            dataType: "html",
            url: "ajax_get_preco",
            data: { idproduto: produtoId },
            success: function (result) {
                $("#preco_" + index[1]).val(result);
                $("#qtd_" + index[1]).val(1);

                var aux = $('.botao');
                var lastindex = parseInt(aux.eq(0).attr('data-index'));

                atualizaTotal(lastindex);
            }
        });

    });

    $("body").on('click','.btn-addproduto',function () {
        var lastindex = parseInt($(this).attr('data-index'));

        $.ajax({
            method: "POST",
            dataType: "html",
            url: "ajax_add_produto",
            data: { index: lastindex },
            success: function (result) {
                $("#lista-produtos").append(result);
                var botoes = $('.botao');
                var newindex = lastindex + 1;

                for(var i = 0; i < botoes.length; i++)
                {
                    botoes.eq(i).attr('data-index', newindex);
                }
            }
        });
    });

    $("body").on('click', '.btn-delproduto', function () {
        var index = $(this).attr('data-index');

        $("#item_"+index).remove();

        var botoes = $('.botao');
        var newindex = index - 1;

        for (var i = 0; i < botoes.length; i++) {
            botoes.eq(i).attr('data-index', newindex);
        }

        var aux = $('.botao');
        var lastindex = parseInt(aux.eq(0).attr('data-index'));

        atualizaTotal(lastindex);
        
    });

    $("body").on('change', '.qtd', function () {
        var aux = $('.botao');
        var lastindex = parseInt(aux.eq(0).attr('data-index'));

        atualizaTotal(lastindex);
    });

});