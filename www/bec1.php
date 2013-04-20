<?php passthru('cat > /dev/ttyACM0'); ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0">
<title>HOMIX</title>
<link rel="stylesheet" href="css/black-tie/jquery-ui-1.10.2.custom.css" />
<link rel="stylesheet" href="css/themes/black-tie/jquery-ui.css" />
	<script src="js/jquery-1.9.1.js"></script>
	<script src="js/ui/jquery.ui.core.js"></script>
	<script src="js/ui/jquery.ui.widget.js"></script>
	<script src="js/ui/jquery.ui.mouse.js"></script>
	<script src="js/ui/jquery.ui.slider.js"></script>
    <script src="js/ui/jquery.ui.button.js"></script>
    <script src="js/jquery.ui.touch-punch.min.js"></script>
	<link rel="stylesheet" href="css/main.css">
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
$( "#check" ).button();
$( "#format" ).buttonset();
});
function schimbabec(pin,valoare) {
	$.ajax({ url: "dimm.php?pin="+pin+"&intensitate="+valoare });
	alert("Pin:"+pin+" - Valoare:"+valoare+"");
	var div = document.getElementById('bec'+pin+'');
		div.style.left = valoare;
		document.body.appendChild(div);
}
function schimbabec2(pin) {
	var bec = document.getElementById('schimbabec'+pin+'');
	    div = document.getElementById('bec'+pin+'').getElementsByClassName("ui-state-default")[0];
	if (bec.checked == 1){
         	$.ajax({ url: "dimm.php?pin="+pin+"&intensitate=0" });
			  div.style.left = '0%';
	}else{
			$.ajax({ url: "dimm.php?pin="+pin+"&intensitate=255" });
			  div.style.left = '100%';
	}

}
function statusbec(pin) {
	var bec = document.getElementById('schimbabec'+pin+'');
	    div = document.getElementById('bec'+pin+'').getElementsByClassName("ui-state-default")[0];
		current = div.style.left;
	if (bec.checked == 1 && div.style.left != '100%'){
			  div.style.left = '0%';
	}else if (bec.checked == 1 && div.style.left != '0%'){
			  div.style.left = '100%';
	}else{
			  div.style.left = current;
	}

}
</script>

</head>
<body onLoad="statusbec(3);statusbec(5);statusbec(6);">
<div id="content">
<div id="format">
<input type="checkbox" id="schimbabec3" onClick="schimbabec2(3)" /><label for="schimbabec3">Bec3</label>
<input type="checkbox" id="schimbabec5" onClick="schimbabec2(5)" /><label for="schimbabec5">Bec5</label>
<input type="checkbox" id="schimbabec6" onClick="schimbabec2(6)" /><label for="schimbabec6">Bec6</label>

</div>
<p>
<input type="text" id="valbec3" style="width:300px;border: 0; color: #f6931f; font-weight: bold; cursor:pointer; background:#fff !important;" disabled="disabled" />
</p>
<div id="bec3"></div>
<br clear="all">
<p>
<input type="text" id="valbec5" style="width:300px;border: 0; color: #f6931f; font-weight: bold; cursor:pointer; background:#fff !important;" disabled="disabled" />
</p>
<div id="bec5"></div>
<br clear="all">
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
</div>
</body>
</html>