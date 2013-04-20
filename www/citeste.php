<?php
ini_set('display_errors', 'On');
$fp =fopen("/dev/ttyACM0", "w+");
if( !$fp) {
        echo "Error";die();
}

for ($i = 1; $i <= 1000; $i++):
echo fread($fp,20).'<br>';

endfor;
fclose($fp);
?>