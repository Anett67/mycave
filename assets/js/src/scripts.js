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

    $('.cancel').click(function(e){
        e.preventDefault();
        $('#choose_bottle').slideUp('slow');
    });

    $('.popup').on('click', function(e){
        e.stopPropagation();
        $(this).children('.popuptext').fadeIn('fast');
    });

    $('body').on('click', function(event) {
        $('.popuptext').fadeOut('fast');
    });

    $('.far').on('click', function(e){
        e.stopPropagation();
        $(this).parents('.popuptext').hide();
    });

    $('.delete_link').on('click',function(e){
        if(!confirm("Are you sure you want to delete this item?")){
            e.preventDefault();
        }
    });

    $('.hide_response').click(function(){
        $('#response').hide();
    }); 

    //------------------AJAX POUR TRIER LES PRODUITS--------------------

    function pageLoad(response){
        $('.bottles').html(response);
        $('.product_container').css('margin', '20px');
        $('.popup').on('click', function(e){
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
            if(!confirm("Are you sure you want to delete this item?")){
                e.preventDefault();
            }
        });
    };
    
    $('#search').on('input', function(){

        var recherche = $(this).val();

        if(recherche.length >= 3){

            $.post(
                '../request/ajax_search.php',
                {
                    recherche: recherche
                },
                function(response){
                    pageLoad(response);
                    $('.pagination').hide();
                }
            )
        }else{

            $.post(
                '../request/products_read.php',
                {},
                function(response){
                    pageLoad(response);
                    $('.pagination').show();
                }
            )
        }
    });
    
    $('#year_select').on('change', function(event){

        var year = $('#year_select').val();

        if(year != 0){
            $.post(
                '../request/select_post.php',
                {
                    year: year,
                },
                function(response){
                    pageLoad(response);
                    $('.pagination').hide();
                }
            )
        }else{

           $.post(
                '../request/products_read.php',
                {},
                function(response){
                    pageLoad(response);
                    $('.pagination').show();
                }
            )
        }
    });

    // ------------------------------SCROLLTOP------------------------------------

    var btn = $('.scrolltop');

    $(window).scroll(function(){
        var windowHeight = $(window).height();
        var scrollTop = $(this).scrollTop();
          if(scrollTop > 500){
            btn.fadeIn(500);
          }else{
            btn.fadeOut(500);
          }
    })

    btn.click(function(){
      $('html, body').animate({scrollTop: 0}, 'slow');

    })




});