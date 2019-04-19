"use strict";

let referenceMonths = [];
let monthNames = ["January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"];
let refDay;

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

function generateReferenceMonths() {
    let currentDate = new Date();
    let currentYear = currentDate.getFullYear();
    let currentMonth = currentDate.getMonth();
    let newDate;

    for (let i = 0; i < 3; i++) {
        if (currentMonth === 0) {
            currentMonth = 11;
            currentYear--;
        }
        else {
            currentMonth--;
        }

        currentDate = new Date(currentYear, currentMonth, 1);
        referenceMonths.unshift(currentDate);
    }

    currentDate = new Date();
    currentDate.setDate(1);
    currentYear = currentDate.getFullYear();
    currentMonth = currentDate.getMonth();
    referenceMonths.push(currentDate);
    refDay = Math.round(currentDate.getTime()/1000);

    for (let i = 0; i < 3; i++) {
        if (currentMonth === 11) {
            currentMonth = 0;
            currentYear++;
        }
        else {
            currentMonth++;
        }
        currentDate = new Date(currentYear, currentMonth, 1);
        referenceMonths.push(currentDate);
    }
}

function initCalendarListeners() {
    let planDays = document.getElementsByClassName("planDay");

    for(let i=0; i < planDays.length; i++) {
        planDays[i].addEventListener("click", function() {
            let unixTime = parseInt(refDay) + 86400 *
                (planDays[i].textContent - 1);
            $.post('views/meal-plan/viewmealplans.php',
                { date: unixTime },
                function(data) {
                    $('#plan-info').html(data);
                }
            )
        });
    }
}

function populateMonthDropDown(monthDropDown) {
    for (let i = 0; i < referenceMonths.length; i++) {
        let yearReference = referenceMonths[i].getFullYear();
        let monthReference = referenceMonths[i].getMonth();
        let monthSelectOption = document.createElement("option");

        monthSelectOption.value = Math.round(referenceMonths[i].getTime()/1000);
        monthSelectOption.innerHTML = monthNames[monthReference]
            + " " + yearReference;

        if(i === 3) {
            monthSelectOption.selected = "true";
        }
        monthDropDown.appendChild(monthSelectOption);
    }
}

function pageInit() {

    /* Code from main.js as we can only 1 listener to window.onload */
    var nav = document.getElementById("header");
    var main = document.getElementById("main");
    var height = nav.offsetTop;
    var mHeight = nav.clientHeight;

    window.onscroll = stickyMenuFunction;
    function stickyMenuFunction()
    {
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

    $("#uploadFile").change(function(){
    $('#image_preview').html("");
    var total_file=document.getElementById("uploadFile").files.length;
    for(var i=0;i<total_file;i++)
    {
      $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'>");
    }
    });



    //Function that shows menu on click "menu icon"
    $('#responsive-menu').click(function(e){
        $('#main-nav > ul').slideToggle();
        e.preventDefault();
    });

    var ms = $('#ms').magicSuggest({
        data: 'get_ingredients.php',
        valueField: 'id',
        displayField: 'name',
        mode: 'remote',
        renderer: function(data){
            return '<div>'+data.name+'</div>';
        },
        resultAsString: true,
        selectionRenderer: function(data){
            //alert(data.countryName);
            $("#ms").val("");
            $('input[name^=ingredient_text').last().val(data.name);
            return '<div class="name">' + data.name + '</div>';
        }
    });


    /* Actual Mealplan.js */

    initScrollingHeader();
    initCalendarListeners();

    const monthDropDown = document.getElementById("month-select");
    const addButton = document.getElementById("add-plan-button");
    const searchBar = document.getElementById("recipe-search");

    generateReferenceMonths();
    populateMonthDropDown(monthDropDown);

    monthDropDown.addEventListener("change", function(e) {
        refDay = e.target.value;
        $.post('views/meal-plan/getcalendar.php',
            { day: e.target.value },
            function(data) {
                $('#calendar-area').html(data);
                initCalendarListeners();
            }
        )
    });

    searchBar.addEventListener("keyup", function(e) {
        $.post('views/search-results.php',
            { searchTerm : e.target.value },
            function(data) {
                $('#recipe-suggestions').html(data);
                $(".search-results").click(function() {
                    $('#selected-recipe').val($(this).attr('id'));
                    $('#recipe-search').val($(this).attr('recipe'));
                    $('#recipe-suggestions').html('');
                });
            }
        )
    });
}

window.onload = pageInit;