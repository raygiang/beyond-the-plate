//Sticky header
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
}
window.onload = pageReady;

