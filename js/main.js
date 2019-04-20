
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
