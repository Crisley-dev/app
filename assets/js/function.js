jQuery(function(){
    var n = 0;


// Função confirmação de Inativar o COlaborador
$('.bt_delete').click(function (e) { 
    e.preventDefault();
    var cpf = jQuery(this).attr('id');
    var myUrl = 'colaborador/inative/'+cpf;
    jQuery.confirm({
        title: 'Inativar Colaborador',
        content: 'Deseja inativar o colaborador?',
        buttons: {
            confirmar: {
                text: 'Inativar',
                action: ()=>{
                    window.location.replace("http://localhost/app/"+myUrl);
                }
            },
            cancelar: {
                text: 'Cancelar'
            }
        }
    })
});



//Função de confirmação de inativar o produto
$('.bt_delete_produto').click(function (e) { 
    e.preventDefault();
    var cod = jQuery(this).attr('id');
    var myUrl = 'produto/inative/'+cod;
    jQuery.confirm({
        title: 'Inativar Produto',
        content: 'Deseja inativar o produto?',
        type: 'red',
        typeAnimated: true,
        buttons: {
            confirmar: {
                text: 'Inativar',
                btnClass: 'btn-red',
                action: ()=>{
                    window.location.replace("http://localhost/app/"+myUrl);
                }
            },
            cancelar: {
                text: 'Cancelar'
            }
        }
    })
});

$('.bt_delete_pedido').click(function (e) { 
    e.preventDefault();
    var cod = jQuery(this).attr('id');
    var myUrl = 'pedido/delete/'+cod;
    jQuery.confirm({
        title: 'Excluir Pedido',
        content: 'Deseja Excluir o pedido?',
        type: 'red',
        buttons: {
            confirmar: {
                text: 'Excluir',
                btnClass: 'btn-red',
                action: ()=>{
                    window.location.replace("http://localhost/app/"+myUrl);
                }
            },
            cancelar: {
                text: 'Cancelar'
            }
        }
    })
});


$('.bt_finalize_pedido').click(function (e) { 
    e.preventDefault();
    var cod = jQuery(this).attr('id');
    var myUrl = 'pedido/finalize/'+cod;
    jQuery.confirm({
        title: 'Finalizar Pedido',
        content: 'Deseja Finalizar o pedido? Não sera possivel alterar ou excluir o pedido apos finaliza-lo',
        type: 'red',
        buttons: {
            confirmar: {
                text: 'Finalizar',
                btnClass: 'btn-red',
                action: ()=>{
                    window.location.replace("http://localhost/app/"+myUrl);
                }
            },
            cancelar: {
                text: 'Cancelar'
            }
        }
    })
});

$('.bt_add_item').click(function (e) { 
    e.preventDefault();
    var cod = jQuery(this).attr('id');
    var myUrl = 'pedido/new/'+cod
    window.location.replace("http://localhost/app/"+myUrl);
});






$('.bt_add_pedido').click(function (e) { 
    e.preventDefault();
    if(n === 0)
    {
        console.log('entrou no if com o N em ' +n)
        n += 1
        let fornecedor = $('#fornecedor').val();
        let produto = $('#produto').val();
        let preco = jQuery('#preco').val();
        let quantidade = jQuery('#quantidade').val();
        let observacao = jQuery('#observacao').val();
        let abre = '[{';
        let numpedido = ''
        let pedido = '"item'+n+'" : ' +
        '{ "fornecedor":"'+fornecedor+'" , "produto":"'+produto+'" , "preco": "'+preco+'" , "quantidade": "'+quantidade+'", "observacao": "'+observacao+'" }';
        let fecha= '}';
        let final = abre + pedido
        //console.log(JSON.parse(final));
        localStorage.setItem("pedido", final)

       var pedidoFinal = JSON.parse(final +'}]')
       jQuery('#pedidoFinal').val(JSON.stringify(pedidoFinal));

       jQuery.ajax({
        type: "post",
        url: "attPedido",
        data: {"pedido": pedidoFinal},
        dataType: "html",
        success: function (response) {
            jQuery('.response').empty();
            jQuery('.response').append(response);
            jQuery('#produto option').eq(0).prop('selected', true);
            jQuery('#preco').val('');
            jQuery('#quantidade').val('1');
            jQuery('#observacao').val('');
        }
    });

    }

    else 
    {

        var stored = localStorage.getItem("pedido");
        n += 1
        let fornecedor = $('#fornecedor').val();
        let produto = $('#produto').val();
        let preco = jQuery('#preco').val();
        let quantidade = jQuery('#quantidade').val();
        let observacao = jQuery('#observacao').val();
        //let abre = '{';
        let pedido = '"item'+n+'" :' +
            '{ "fornecedor":"'+fornecedor+'" , "produto":"'+produto+'" , "preco": "'+preco+'" , "quantidade": "'+quantidade+'", "observacao": "'+observacao+'" }';
        
        stored += ','+pedido;
        localStorage.setItem("pedido", stored)
        var pedidoFinal = JSON.parse(stored +'}]')

        jQuery('#pedidoFinal').val(JSON.stringify(pedidoFinal));

        jQuery.ajax({
            type: "post",
            url: "attPedido",
            data: {"pedido": pedidoFinal},
            dataType: "html",
            success: function (response) {
                jQuery('.response').empty();
                jQuery('.response').append(response);
                jQuery('#produto option').eq(0).prop('selected', true);
                jQuery('#preco').val('');
                jQuery('#quantidade').val('1');
                jQuery('#observacao').val('');

            }
        });
     

    }
   
    
});

});