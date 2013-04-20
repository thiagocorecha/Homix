<?php
$actiune = $_GET["actiune"];
shell_exec('chmod 777 /dev/ttyACM0');

if($actiune == 'aprins'):
	$mesaj = 'Ai aprins becul';
	$command = "python py/aprinde.py 2>&1";
		$pid = popen( $command,"r");
		while( !feof( $pid ) )
		{
		 echo '<pre>'.fread($pid, 256).'</pre>';
		}
		pclose($pid);
elseif($actiune == 'inchis'):

	$mesaj = 'Ai stins becul';
	$command = "python py/stinge.py 2>&1";
		$pid = popen( $command,"r");
		while( !feof( $pid ) )
		{
		 echo '<pre>'.fread($pid, 256).'</pre>';
		}
		pclose($pid);
elseif($actiune == 'citeste'):

	
	$command = "python py/miniterm.py 2>&1";
	$mesaj = ''.$pid.'';
		$pid = popen( $command,"r");
		while( !feof( $pid ) )
		{
		 echo '<pre>'.fread($pid, 256).'</pre>';
		}
		pclose($pid);
endif;
 
header("Location: bec.php?mesaj=".$mesaj.""); 

?>