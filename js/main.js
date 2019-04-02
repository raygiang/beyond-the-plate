//Sticky header
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

function pageReady(){
	var nav = document.getElementById("header");
	var main = document.getElementById("main");
	var height = nav.offsetTop;
	var mHeight = nav.clientHeight;

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


    $("#uploadFile").change(function(){
        $('#image_preview').html("");
        var total_file=document.getElementById("uploadFile").files.length;
        for(var i=0;i<total_file;i++)
        {
          $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'>");
        }
    });


	var ms = $('#ms').magicSuggest({
        data: 'get_countries.php',
        valueField: 'idCountry',
        displayField: 'countryName',
        mode: 'remote',
        renderer: function(data){
            return '<div>'+data.countryName+'</div>';
        },
        resultAsString: true,
        selectionRenderer: function(data){
        	//alert(data.countryName);
        	$("#ms").val("");
            $('input[name^=ingredient_text').last().val(data.countryName);
            return '<div class="name">' + data.countryName + '</div>';
        }
    });

}
window.onload = pageReady;

