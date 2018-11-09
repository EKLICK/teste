$(document).on('click', '.btn-deletados', function(){
    $('#id_deletados1').val($(this).data('id'));
    $('#name_deletados1').val($(this).data('name'));
    $('#id_deletados2').val($(this).data('id'));
    $('#name_deletados2').val($(this).data('name'));
});