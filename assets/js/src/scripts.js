$(function(){

    // Cacher le formulaire pour ajouter une bouteille et afficher le au click

    $('.add_new').hide();
    $('#add_new_button').click(function(){
        $('#choose_bottle').slideToggle();
    });

    $('.add_bottle').click(function(e){
        e.preventDefault();
        $('#new_bottle').slideToggle();
    });

    $('.cancel_button').click(function(e){
        e.preventDefault();
        $('#new_bottle').slideUp();
    });

    $('#cancel').click(function(e){
        e.preventDefault();
        $('#choose_bottle').slideUp('slow');
    });

    $('.popup').click(function(e){
        e.stopPropagation();
        $(this).children('.popuptext').fadeIn('fast');
    });

    $('body').click(function(event) {
        $('.popuptext').fadeOut('fast');
    });

    $('.far').click(function(e){
        e.stopPropagation();
        $(this).parents('.popuptext').hide();
    });

    $('.delete_link').click(function(e){
        if(!confirm("Are you sure wou want to delete this item?")){
            e.preventDefault();
        }
    });

    $('.hide_response').click(function(){
        $('#response').hide();
    });    

});