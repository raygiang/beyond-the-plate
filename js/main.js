//Function that runs when the page loads
window.onload = pageReady;

function addMore(filename) {
  $("<DIV>").load('input_'+filename+'.php', function() {
    $("#"+filename).append($(this).html());
  });
}

function deleteRow() {
  $('DIV.col-auto').each(function(index, item){
    jQuery(':checkbox', this).each(function () {
      if ($(this).is(':checked')) {
        $(item).remove();
      }
    });
  });
}

function render(val)
{
    var n=1;
    for(i=1;i<=val;i++)
    {
            document.getElementById("star"+n).style.backgroundImage="url('images/greenstar.png')";
            n++;
    }
    for(i=1;i<=5-val;i++)
    {
            document.getElementById("star"+n).style.backgroundImage="url('images/greystar.png')";
            n++;
    }
}


//Function that keeps the header on the top

function pageReady()
{
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

    //Function that shows timer on click "Cooking Timer" button
    $('#timer-btn').click(function(e){
        $('#show').slideToggle();
        e.preventDefault(); //stops page from jumping to the top
    });

    //Function that shows menu on click "menu icon"
    $('#responsive-menu').click(function(e){
        $('#main-nav > ul').slideToggle();
        e.preventDefault();
    });

    $("#uploadFile").change(function(){
        $('#image_preview').html("");
        var total_file=document.getElementById("uploadFile").files.length;
        for(var i=0;i<total_file;i++)
        {
          $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'>");
        }
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
}