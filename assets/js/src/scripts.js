$(function(){

    // Cacher le formulaire pour ajouter une bouteille et afficher le au click

    $('#add_new').hide();
    $('#add_new_button').click(function(){
        $('#add_new').slideToggle();
    });

    $('#cancel').click(function(e){
        e.preventDefault();
        $('#add_new').slideUp('slow');
    })

});