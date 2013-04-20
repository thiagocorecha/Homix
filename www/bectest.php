<?php
 
//echo exec('whoami');
 
?>

<?php
$tty = '/dev/ttyACM0';
$pin = 'A0';
$eco = '"temperatura'.$pin.',AnalogRead,'.$pin.'"';
$temp = shell_exec('echo "'.$eco.'" > '.$tty.'');


// <= PHP 5
$file = file_get_contents('./temp.txt', true);

echo $file2;
$tmp = substr($file,-3);
$grade = (5*$tmp*100)/1024;
echo '<br>Temperatura: '. round($grade).'&deg;C';
?>

