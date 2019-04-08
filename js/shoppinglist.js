"use strict";

function initScrollingHeader() {
    const nav = document.getElementById("header");
    const main = document.getElementById("main");
    let height = nav.offsetTop;
    let mHeight = nav.clientHeight;

    function stickyMenuFunction() {
        if (document.body.scrollTop > height || document.documentElement.scrollTop > height) {
            nav.classList.add("sticky");
            nav.classList.remove("flex-container");
            main.style.marginTop = mHeight+"px";
        }
        else {
            nav.classList.remove("sticky");
            main.style.marginTop = "0px";
        }
    }
    window.onscroll = stickyMenuFunction;
}

function pageInit() {
    initScrollingHeader();

    const searchBar = document.getElementById("recipe-search");
    const searchResults = document.getElementsByClassName("search-results");

    searchBar.addEventListener("keyup", function(e) {
        $.post('views/shoppinglist/search-results.php',
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