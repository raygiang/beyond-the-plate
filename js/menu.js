//Function that shows menu on click "menu icon"
        $('#responsive-menu').click(function(e){
            $('#main-nav > ul').slideToggle();
            e.preventDefault();
        });