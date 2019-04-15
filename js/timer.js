
$(document).ready(function(){

	let startButton=document.getElementById("btnStart");
	let endButton=document.getElementById("btnStop");
	let time;
	let total = 0;

	//get the total time from prep time
	$('.timer-details').each(function(){
   total += parseInt($(this).text());
	});

	let totalTime = total * 60;

	function startTimer(duration, display) {
    let start = Date.now(),
        diff,
        minutes,
        seconds;
    function timer() {
      // get the number of seconds that have elapsed since
      // startTimer() was called
      diff = duration - (((Date.now() - start) / 1000) | 0);

      // does the same job as parseInt truncates the float
      minutes = (diff / 60) | 0;
      seconds = (diff % 60) | 0;

      minutes = minutes < 10 ? "0" + minutes : minutes;
      seconds = seconds < 10 ? "0" + seconds : seconds;

      display.textContent = minutes + ":" + seconds;

      if (diff <= 0) {
        // add one second so that the count down starts at the full duration
        // example 05:00 not 04:59
        start = Date.now() + 1000;
      }
    };
    // we don't want to wait a full second before the timer starts
    timer();
    time = setInterval(timer, 1000);
	}

  display = document.querySelector('#time');


  // Function that is triggered on startButton click
	function start() {
   	startTimer(totalTime, display);
  }

  // Function that is triggered on endButton click
  function stopTimer() {
		clearInterval(time);
	}
 // Event listeners
	startButton.onclick = start;
	endButton.onclick = stopTimer;

});






