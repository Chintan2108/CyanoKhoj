<?php
if ($_POST['payload']) {
	echo "before";
	shell_exec('cd /var/www/html/CyanoKhoj/ && sudo git reset --hard HEAD && sudo git pull');
	echo "after auto-pull";
}
?>
auto-pull
