//Function that shows result after it inserted in search box
     $('#search').click(function(e) {
        e.preventDefault();
        var searchBox = document.getElementById("request-search");
        $.post('views/reciperequest/search-request.php',
            { searchReq : e.target.value },
            function(data) {
                searchBox.value = "";
                $('#request-result').html(data);
            }

        )
    });