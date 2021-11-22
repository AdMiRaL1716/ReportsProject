$(document).on('click', '.open-modal', function() {
    var idItem, nameItem, form, close;
    idItem = $(this).attr('data-id');
    nameItem = $(this).attr('data-name');
    close = $('.modal_close');
    form = $('#action_form');
    form.attr('action', function (i, v) {
        return v + nameItem + idItem;
    });
    close.click( function(){
        location.reload();
    });
});
