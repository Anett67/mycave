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

});