<?php
session_start();
	require_once('lib/controllers/timer-controller.php');
	?>


		<div>
			<?php printName($timer);?>
		</div>
		<div>
			<?php echo	printInstructions($timer);?>
		</div>
		<div id="time"></div>
		<!-- BUTTON SET -->
		<span>
			<input id="btnStart" type="button" value="START" class="btn btn-secondary"/>
		</span>
		<span>
			<input id="btnStop" type="button" value="STOP" class="btn btn-secondary"/>
		</span>
