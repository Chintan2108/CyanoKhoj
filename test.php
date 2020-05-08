<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$json = exec("python3 tweet_tracker.py", $output);
$arr = json_decode($json);
print_r($arr);
//foreach($arr as $key => $val) {
//    echo "KEY IS: $key<br/>";
//    foreach(((array)$arr)[$key] as $val2) {
//        echo "VALUE IS: $val2<br/>";
//    }
//}

//echo gettype($json);
//echo $json;
//echo $arr->loc;
//echo json_decode('{"a":1,"b":2}')

var_dump($json);
var_dump(json_last_error());
var_dump(json_last_error_msg());
//foreach($arr['lat'] as $item)
//{
//	echo "<li>$item</li>"
//}


//$output = exec("sudo python3 /var/www/html/CyanoKhoj/tweet_tracker.py"
?>
