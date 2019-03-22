
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

//Recipe Request Modal
	var createModalBtn = document.getElementById('create-modal-btn');
	var createModal = document.getElementById('create-modal');
	var span = document.getElementsByClassName("close")[0];

	createModalBtn.onclick = function() {
	  createModal.style.display = "block";
	}
	span.onclick = function() {
	  createModal.style.display = "none";
	}
	window.onclick = function(event) {
	  if (event.target == createModal) {
	    createModal.style.display = "none";
	  }
	}

}
window.onload = pageReady;

