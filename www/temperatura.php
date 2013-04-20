<?php
 
//echo exec('whoami');
 
?>

<?php

$tty = '/dev/temperatura';
$pin = 'A0';
$eco = '"temperatura'.$pin.',AnalogRead,'.$pin.'"';
$temp = shell_exec('echo "'.$eco.'" > '.$tty.'');

    $pin2 = 'A1';
    $eco2 = '"inlu'.$pin2.',AnalogRead,'.$pin2.'"';
    $inl = shell_exec('echo "'.$eco2.'" > '.$tty.'');
    
    
    // <= PHP 5
    $file2 = file_get_contents('./temp.txt', true);
    
    //echo $file2;
    $inlu = substr($file2,-13);
    //echo $inlu;
    //file_put_contents("temp.txt", "");
// <= PHP 5
$file = file_get_contents('./temp.txt', true);

//echo $file2;
$tmp = substr($file,-3);
$grade = (5*$tmp*100)/1024;
echo '<br>Temperatura: '. round($grade).'&deg;C';
$filename = 'temp.txt';
	//echo '<br>'.$filename . ': ' . filesize($filename) . ' bytes';
if(filesize($filename) > 6000):
 file_put_contents("temp.txt", "");
endif;


?>


