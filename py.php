
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		function trial() {
			alert("hgfhgfjhf");
			var c = <?php echo python(); ?>
		}
	</script>
</head>
<body>
<button onclick="trial();">try</button>


<?php

function python() {
	$json = exec("python tweet_tracker.py");
	$arr = json_decode($json, TRUE);
	return $arr;
}

// if (isset($_POST['python'])){

// $json = exec("python tweet_tracker.py");
// $arr = json_decode($json, TRUE);
//print_r($arr);

// echo "place    lat      lon \r\n";
// foreach ($arr as $key => $value) {
// 	# code...
// 	echo $value[0] . ' ' . $value[1] . ' ' . $value[2] . '\r\n';
// }
//echo "<script>trial();</sript>";

// var_dump($json);
// var_dump(json_last_error());
// var_dump(json_last_error_msg());


?>
</body>
</html>

