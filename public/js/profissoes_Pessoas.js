//Ajax Mostrar pessoas de profissões
$('#nome_profissoes').on('change', function(e){
    var profissao = e.target.value;
    $('#nome_pessoas').empty();
    $('#nome_pessoas').append('<option disabled selected>Selecione uma pessoa...</option>');
    $('select').formSelect();
    $.ajax({
      type: 'get',
      url: 'profissao_pessoas/'+profissao,
    }).done(function (data){
      $.each(data, function(index, pessoas){
        $('#nome_pessoas').append('<option value="'+ pessoas.id + '">'+ pessoas.nome +'</option>');
        $('select').formSelect();
      })
    }).fail(function (){
      M.toast({html: 'Falha. Comunique o administrador.'})
    })
    M.toast({html: 'Pessoas atualizadas.'})
});

//Ajax Mostrar profissão de pessoas
$('#pessoas_nome').on('change', function(e){
    var pessoa = e.target.value;
    $('#nome_pessoas').empty();
    $('#nome_pessoas').append('<option disabled selected>Selecione uma pessoa...</option>');
    $('select').formSelect();
    $.ajax({
      type: 'get',
      url: '/profissao_pessoas/profissaodapessoa/'+pessoa,
    }).done(function (data){
      if(data.length > 0){
        $('#profissoes_nome').append('<option value="'+ data.id +'" selected>'+ data.nome +'</option>');
        $('select').formSelect();
      }
      else{
        $('#profissoes_nome').append('<option value="" selected>A pessoa não possui profissão</option>');
        $('select').formSelect();
      }
    }).fail(function (){
      M.toast({html: 'Falha. Comunique o administrador.'})
    })
    M.toast({html: 'Pessoas atualizadas.'})
});