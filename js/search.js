function pageInit() {
    const searchBar = document.getElementById("recipe-search");

    searchBar.addEventListener("keyup", function(e) {
        $.post('views/search-results.php',
            { searchTerm : e.target.value },
            function(data) {
                $('#recipe-suggestions').html(data);
                $(".search-results").click(function() {
                    $('#recipe-list').val($('#recipe-list').val() + 
                        '|' + $(this).attr('id'));
                    $('#selected-items').html($('#selected-items').html() + 
                        '<div>' + $(this).attr('recipe') + '</div>');
                    searchBar.value = "";
                    $('#recipe-suggestions').html('');
                });
            }
        )
    });
}

window.onload = pageInit;