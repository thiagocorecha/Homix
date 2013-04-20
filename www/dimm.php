<?php
$tty = '/dev/ttyACM0';
$val = $_GET['intensitate'];
$pin = $_GET['pin'];
$eco = 'bec'.$pin.',AnalogWrite,'.$pin.','.$val.'';
shell_exec('echo "'.$eco.'" > '.$tty.'');
//$output = shell_exec("sudo echo '1,AnalogWrite,3,100' > /dev/ttyACM0");
//echo "<pre>$output</pre>";
//echo fread(fopen("/dev/ttyACM0", "w+"),20);
//header('Location: bec.php?intensitate='.$val.'&mesaj=Ati schimbat intesitatea la '.$val.'%');
?>