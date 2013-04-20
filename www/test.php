<?php exec("python ../py/bec.py", $output); ?>

<?php
$tty = '/dev/ttyACM0';
$eco = '1,AnalogWrite,3,100';
passthru('echo "'.$eco.'" > '.$tty.'');
//$output = shell_exec("sudo echo '1,AnalogWrite,3,100' > /dev/ttyACM0");
//echo "<pre>$output</pre>";
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>jQuery UI Slider - Snap to increments</title>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css" />
<script>
$(function() {
$( "#slider" ).slider({
value:100,
min: 0,
max: 500,
step: 50,
slide: function( event, ui ) {
$( "#amount" ).val( "$" + ui.value );
}
});
$( "#amount" ).val( "$" + $( "#slider" ).slider( "value" ) );
});
</script>
</head>
<body>
<p>
<label for="amount">Donation amount ($50 increments):</label>
<input type="text" id="amount" style="border: 0; color: #f6931f; font-weight: bold;" />
</p>
<div id="slider"></div>
</body>
</html>