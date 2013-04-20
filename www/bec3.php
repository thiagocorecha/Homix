<?php passthru('cat > /dev/ttyACM0'); ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>jQuery UI Slider - Snap to increments</title>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css" />
<?php
$val = ''.$_GET['intensitate'].'';
if($val == ''): $valoare = 0; else: $valoare = $val; endif; 
?>
<script>
function updateShouts(){
    // Assuming we have #shoutbox
    $('#temperatura').load('temperatura.php');
}
setInterval( "updateShouts()", 15000 );
$(function() {
	$( "#bec3" ).slider({
		value:<?= $valoare ?>,
		min: 0,
		max: 255,
		step: 1,
		slide: function( event, ui ) {
				$( "#valbec3" ).val( "Ati modificat intensitatea la " + ui.value );
				$.ajax({
					url: "dimm.php?pin=3&intensitate=" + ui.value
				});
			}
	});
	$( "#bec5" ).slider({
		value:<?= $valoare ?>,
		min: 0,
		max: 255,
		step: 1,
		slide: function( event, ui ) {
				$( "#valbec5" ).val( "Ati modificat intensitatea la " + ui.value );
				$.ajax({
					url: "dimm.php?pin=5&intensitate=" + ui.value
				});
			}
	});

	$( "#bec6" ).slider({
		value:<?= $valoare ?>,
		min: 0,
		max: 255,
		step: 1,
		slide: function( event, ui ) {
				$( "#valbec6" ).val( "Ati modificat intensitatea la " + ui.value );
				$.ajax({
					url: "dimm.php?pin=6&intensitate=" + ui.value
				});
			}
	});

$( "#valbec3" ).val( "");
$( "#valbec5" ).val( "");
$( "#valbec6" ).val( "");
});
function schimbabec(pin,valoare) {
	$.ajax({ url: "dimm.php?pin="+pin+"&intensitate="+valoare });
	var div = document.getElementById('bec'+pin+'');
		div.style.left = valoare;
		document.body.appendChild(div);
}
</script>

</head>
<body>

<p>
<a href="#" onclick="schimbabec(3,0)">Stinge becul 1</a> | <a href="#" onclick="schimbabec(3,255)">Aprinde becul 1</a>
<input type="text" id="valbec3" style="width:300px;border: 0; color: #f6931f; font-weight: bold; cursor:pointer; background:#fff !important;" disabled="disabled" />
</p>
<div id="bec3"></div>
<br clear="all">


<a href="#" onclick="schimbabec(5,0)">Stinge becul 2</a> | <a href="#" onclick="schimbabec(5,255)">Aprinde becul 2</a>
<p>
<input type="text" id="valbec5" style="width:300px;border: 0; color: #f6931f; font-weight: bold; cursor:pointer; background:#fff !important;" disabled="disabled" />
</p>
<div id="bec5"></div>
<br clear="all">


<a href="#" onclick="schimbabec(6,0)">Stinge becul 3</a> | <a href="#" onclick="schimbabec(6,255)">Aprinde becul 3</a>
<p>
<input type="text" id="valbec6" style="width:300px;border: 0; color: #f6931f; font-weight: bold; cursor:pointer; background:#fff !important;" disabled="disabled" />
</p>
<div id="bec6"></div>
<br clear="all">
    <div id="temperatura">
    <?php
    
    $tty = '/dev/temperatura';
    $pin = 'A0';
    $eco = '"temperatura'.$pin.',AnalogRead,'.$pin.'"';
    $temp = shell_exec('echo "'.$eco.'" > '.$tty.'');
    
    
    // <= PHP 5
    $file = file_get_contents('./temp.txt', true);
    
    //echo $file2;
    $tmp = substr($file,-3);
    $grade = (5*$tmp*100)/1024;
    echo '<br>Temperatura: '. round($grade).'&deg;C';
	$filename = 'temp.txt';
	echo '<br>'.$filename . ': ' . filesize($filename) . ' bytes';
    //file_put_contents("temp.txt", "");
    
    ?>
    </div>
    
</body>
</html>