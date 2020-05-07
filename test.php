<?php 

$command = escapeshellcmd('tweet_tracker.py');
$output = shell_exec($command);
echo $output;

?>