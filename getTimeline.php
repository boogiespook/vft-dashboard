<?php
function reformatDate($dd) {
$q = explode('/', $dd);
$mon = $q[1];
if (strlen($mon) == 1) {
   $mon = "0" . $q[1];
}

$day = $q[0];
if (strlen($day) == 1) {
   $day = "0" . $q[0];
}

return $q[2] . "-" . $mon . "-" . $day;
}

function getNavigate() {
include 'googleClient.php';
$i=1;
// Get the API client and construct the service object.
$client = getClient();
$service = new Google_Service_Sheets($client);

$spreadsheetId = '1UUmhWQVOjy3lpWlOgTBfdShnA1TgQWarQWOoYW1I0yk';
$range = 'Overview!A2:O';
$response = $service->spreadsheets_values->get($spreadsheetId, $range);
$values = $response->getValues();
if (count($values) == 0) {
  print "No data found.\n";
} else {
	## Look through each entry
  foreach ($values as $row) {
  	if ((isset($row[11])) && ($row[11] != '')) {
  		if ($row[6] != '') {
  			$dude = "<br>(" . $row[6] . ")";
  		} else {
			$dude = "";  		
  		}
    printf("{id: '%s', content: '%s %s', start: '%s'", $i, $row[0], $dude, reformatDate($row[11]));
    	if ((isset($row[12])) && ($row[12] != '')) {
 				printf(", end: '%s'},\n",reformatDate($row[12]));
 			} else {
 				printf("},\n");
 		}
 		$i++;
  }
}
}
}
?>