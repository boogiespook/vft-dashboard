<?php

function getAllAllocations() {
// Get the API client and construct the service object.
$client = getClient();
$service = new Google_Service_Sheets($client);

$spreadsheetId = '1UUmhWQVOjy3lpWlOgTBfdShnA1TgQWarQWOoYW1I0yk';
$range = 'Overview!A2:K';
$response = $service->spreadsheets_values->get($spreadsheetId, $range);
$values = $response->getValues();
print "<table border=0><tr><th>Customer</th><th>Details</th><th>Owner</th><th>Billable?</th><th>Type</th><th>Status</th></tr><tbody>";
if (count($values) == 0) {
  print "No data found.\n";
} else {
	## Look through each entry
  foreach ($values as $row) {
#  	if ($row[8] == 'Open Source Enablement') {
    printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", $row[0], $row[5], $row[6],$row[7],$row[9], $row[10] );
# }
  }
}
print "</tbody></table>";
}
?>