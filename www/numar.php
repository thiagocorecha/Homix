<?php
// Read 14 characters starting from the 21st character

$skl = file_get_contents('temp.txt');
$i = 0;
$nr = array();
foreach($skl as $vl):
	//echo $i.')'.$vl.'<br>';
	$nr[$i] = $i;
	$i++;
endforeach;
$ultima = explode('||',$skl[max($nr)-1]);
list($temp1, $temp2, $light) = $ultima;
echo str_replace('|','',$temp1).'<br>';
echo str_replace('|','',$temp2).'<br>';
echo str_replace('|','',$light).'<br>';
?>