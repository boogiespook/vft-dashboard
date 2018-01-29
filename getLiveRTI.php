<?php
function getLiveRTI($type) {
## Get all the info from the RTI website.
$url = 'http://www.ready-to-innovate.com/sqlToJson.php?key=OGM0NzMxZDk4ODAxMTUzNTJkOTliN';
#$url = 'http://localhost/vft/sqlToJson.php?key=OGM0NzMxZDk4ODAxMTUzNTJkOTliN';
#$json = file_get_contents('http://www.ready-to-innovate.com/sqlToJson.php?key=OGM0NzMxZDk4ODAxMTUzNTJkOTliN');
$json = file_get_contents($url);
$json = json_decode($json,true);

$countryArray[] = array();
$lobArray[] = array();

foreach ($json as $k => $v) {
#   echo $v['lob'] . "<br>";
   $countryArray[$v[$type]]++;
#   $lobArray[$v['lob']]++;
}


$countryResults = "[";
foreach ($countryArray as $topic => $value) {
	if ($topic != "") {
	$countryResults .= "\n{ name: '$topic',\n y: $value },\n";
}
}
$countryResults .= "]";
print $countryResults;
}

?>