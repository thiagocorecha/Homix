<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" >
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<title>Homix</title>
	<link rel="stylesheet" href="<?= base_url()?>resurse/css/themes/base/jquery.ui.all.css">
	<script src="<?= base_url()?>resurse/js/jquery-1.9.1.js"></script>
	<script src="<?= base_url()?>resurse/js/ui/jquery.ui.core.js"></script>
	<script src="<?= base_url()?>resurse/js/ui/jquery.ui.widget.js"></script>
	<script src="<?= base_url()?>resurse/js/ui/jquery.ui.mouse.js"></script>
	<script src="<?= base_url()?>resurse/js/ui/jquery.ui.slider.js"></script>
    <script src="<?= base_url()?>resurse/js/ui/jquery.ui.button.js"></script>
    <script src="<?= base_url()?>resurse/js/ui/jquery.ui.touch-punch.min.js"></script>
    <script src="<?= base_url()?>resurse/js/jquery.colorbox.js"></script>
	<link rel="stylesheet" href="<?= base_url()?>resurse/css/main.css">
    <link rel="stylesheet" href="<?= base_url()?>resurse/css/colorbox.css">
	<script>
	$(document).ready(function(){
		<?php if($this->agent->is_mobile()): ?>
			$(".webcam").colorbox({iframe:true, innerWidth:320, innerHeight:180});
		<?php else: ?>
			$(".webcam").colorbox({iframe:true, innerWidth:620, innerHeight:520});
		<?php endif; ?>
			});
	
	$(function() {
		$( "#intensitatebec3" ).slider({
		value:0,
		min: 0,
		max: 255,
		step: 1,
		slide: function( event, ui ) {
				$( "#valintensitatebec3" ).val( "Ati modificat intensitatea la " + ui.value );
				$.ajax({
					url: "/homix/3/" + ui.value
				});
			}
	});
	$( "#intensitatebec5" ).slider({
		value:0,
		min: 0,
		max: 255,
		step: 1,
		slide: function( event, ui ) {
				$( "#valintensitatebec5" ).val( "Ati modificat intensitatea la " + ui.value );
				$.ajax({url: "/homix/5/" + ui.value});
				//alert("/homix/5/" + ui.value)
			}
	});

	$( "#intensitatebec6" ).slider({
		value:0,
		min: 0,
		max: 255,
		step: 1,
		slide: function( event, ui ) {
				$( "#valintensitatebec6" ).val( "Ati modificat intensitatea la " + ui.value );
				$.ajax({
					url: "/homix/6/" + ui.value
				});
			}
	});
		$( "#bec3" ).button();
		$( "#bec5" ).button();
		$( "#bec6" ).button();
	});
	function schimbabec(pin,valoare) {
	var status = $('#bec'+pin+':checked').val();
	//alert(status);
		if(status == 'on'){
			$.ajax({ url: "/homix/"+pin+"/255" });
		} else {
			$.ajax({ url: "/homix/"+pin+"/0" });
		}
	var div = document.getElementById('bec'+pin+'');
		div.style.left = valoare;
}
	</script>
</head>

<body>

<?php include $wdx ?>

</body>
</htm>
