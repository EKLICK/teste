//AJAX CREATE PESSOAS
$(document).on('click', "#btn-create", function(){
    $.ajax({
        type: 'get',
        url: '/pessoas/create',
    }).done(function (data){
        $('#estados-create').empty();
        $('#estados-create').append('<option value="" disabled selected>Escolha seu estado</option>');
        $.each(data[3], function(index, estados){
            $('#estados-create').append('<option value="'+estados.id+'" >'+estados.nome+'</option>');
            $('#estados-create').formSelect();
        })
        $('#cidades-create').empty();
        $('#cidades-create').append('<option value="" disabled selected>Escolha sua cidade</option>');
        $('#profissoes-create').empty();
        $('#profissoes-create').append('<option value="" disabled selected>Escolha sua profissão</option>');
        $.each(data[1], function(index, profissoes){
            $("#profissoes-create").append('<option value="'+profissoes.id+'" >'+ profissoes.nome+'</option>');
            $('select').formSelect();
        });
        $("#checkboxes").empty();
        M.updateTextFields();
        $.each(data[2], function(index, musicas){
            $("#checkboxes").append('<p><label><input value="'+musicas.id+'" type="checkbox" '+selectMusica(data, musicas)+'" name="musicas[]" /><span>'+musicas.nome+'</span></label></p>');
        });
    }).fail( function(){
        M.toast({html: 'Falha. Comunique o administrador.'})
    })
});

//AJAX EDIT PESSOAS
$(document).on('click', "#btn-edit", function(){
    var pessoa = $(this).data('id');
    $.ajax({
        type: 'get',
        url: '/pessoas/'+pessoa+'/edit',
    }).done(function (data){
        $('#id-edit').val(data[0].id);
        $('#nome-edit').val(data[0].nome);
        $('#cpf-edit').val(data[0].cpf);
        $('#estados-edit').empty();
        $('#estados-edit').append('<option value="" disabled selected>Escolha seu estado</option>');
        $.each(data[4], function(index, estados){
            $('#estados-edit').append('<option value="'+estados.id+'" '+ selectEstado(data, estados) +'>'+ estados.nome +'</option>');
            $('select').formSelect();
        }) 
        $('#cidades-edit').empty();
        $('#cidades-edit').append('<option value="" disabled selected>Escolha sua profissão</option>');
        $estadoId = encontraEstado(data);
        $.each(data[1], function(index, cidades){
            if($estadoId == cidades.estado_id){
                $('#cidades-edit').append('<option value="'+cidades.id+'" '+ selectCidades(data, cidades) +">"+ cidades.nome+'</option>');
                $('select').formSelect();
            }
        })
        $('#profissoes-edit').empty();
        $('#profissoes-edit').append('<option value="" disabled selected>Escolha sua cidade</option>');
        $.each(data[2], function(index, profissoes){
            $("#profissoes-edit").append('<option value="'+profissoes.id+'" '+ selectProfissoes(data, profissoes)+">"+ profissoes.nome+'</option>');
            $('select').formSelect();
        });
        $("#checkboxes").empty();
        M.updateTextFields();
        $.each(data[3], function(index, musicas){
            $("#checkboxes").append('<p><label><input value="'+musicas.id+'" type="checkbox" '+selectMusica(data, musicas)+'" name="musicas[]" /><span>'+musicas.nome+'</span></label></p>');
        });
    }).fail(function (){
        M.toast({html: 'Falha. Comunique o administrador.'})
    })
});

//AJAX CRIAR PESSOAS - MOSTRAR CIDADES
$("#estados-create").on('change', function(e){
    var estado = e.target.value;
    $('#cidades-create').empty();
    $.ajax({
        type: 'get',
        url: 'pessoas/estado/'+estado,
    }).done(function (data){
        $.each(data, function(index, cidades){
            $('#cidades-create').append('<option value="'+cidades.id +'">'+cidades.nome +'</option>');
        })
        $('select').formSelect();
    }).fail(function (){
        M.toast({html: 'Falha. Comunique o administrador.'})
    });
    M.toast({html: 'Cidades atualizadas.'})
});

//AJAX EDITAR PESSOAS - MOSTRAR CIDADES
$("#estados-edit").on('change', function(e){
    var estado = e.target.value;
    $('#cidades-edit').empty();
    $.ajax({
        type: 'get',
        url: 'pessoas/estado/'+estado,
    }).done(function (data){
        $.each(data, function(index, cidades){
            $('#cidades-edit').append('<option value="'+ cidades.id +'">'+ cidades.nome +'</option>');
        })
        $('select').formSelect();
    }).fail(function (){
        M.toast({html: 'Falha. Comunique o administrador.'})
    });
    M.toast({html: 'Cidades atualizadas.'})
});

function selectEstado (data, estados){
    var text ="";
    $.each(data[1], function(i, cidade){
        if(cidade.id == data[0].cidade_id){
            if(cidade.estado_id == estados.id){
                text = 'selected';
                return false;
            };
        }else{
            text = '';
        }
    });
    return text;
};

function encontraEstado(data){
    var text = "";
    $.each(data[1], function(i, cidades){
        if(cidades.id == data[0].cidade_id){
            $.each(data[4], function(i, estado){
                if(cidades.estado_id == estado.id){
                    text = estado.id;
                    return false;
                }
            });
        }
    });
    return text;
};

function selectCidades(data, cidades){
    var text = "";
    if(data[0].cidade_id == cidades.id){
        text = "selected";
    }
    return text;
}

function selectProfissoes(data, profissoes){
    var text = "";
    if(data[0].profissao_id == profissoes.id){
        text = "selected";
    }
    return text;
}

function selectMusica (data, musicas){
    var text = "";
    $.each(data[0].musica, function(i, musicasDaPessoa){
        if(musicasDaPessoa.id == musicas.id){
          text = 'checked="checked"';
          return false;
        }else{
          text = '';
        }
    });
    return text;
};

//DELETAR PESSOAS
$(document).on('click', '#btn-delete', function(){
    $('#id_delete').val($(this).data('id'));
    $('#name_delete').val($(this).data('name'));
});
