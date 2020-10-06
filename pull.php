<?php
if ($_POST['payload']) {
	shell_exec('cd /var/www/html/CyanoKhoj/ && git reset -hard HEAD && git pull');
}
?>
