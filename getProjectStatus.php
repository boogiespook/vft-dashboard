<?php

function getProjectStatus() {
// Get the API client and construct the service object.
$client = getClient();
$service = new Google_Service_Sheets($client);

$spreadsheetId = '1UUmhWQVOjy3lpWlOgTBfdShnA1TgQWarQWOoYW1I0yk';
$range = 'Overview!A2:K';
$response = $service->spreadsheets_values->get($spreadsheetId, $range);
$values = $response->getValues();
#print "<table border=0><tr><th>Customer</th><th>Billable?</th></tr><tbody>";
if (count($values) == 0) {
  print "No data found.\n";
} else {
	## Look through each entry
$status = array();
#$status = array('Pre-Sales','Closed Booked - Resource Req.','Assigned','In Progress','Completed');
#foreach ($status as $topic) {
#$status[$topic] = 0;
#}
  foreach ($values as $row) {
#  	if (($row[8] == 'Navigate' ) && ($row[9] != 'Completed')) {
#  	if ($row[8] == 'Navigate') {
#    printf("<tr><td>%s</td><td>%s</td></tr>", $row[0], $row[6]);
$rowStatus = $row[10];
$status[$rowStatus]++;
    }
  }
#var_dump($status);
foreach ($status as $topic => $value) {
print "$topic : $value <br>";
}
}

function getProjectStatusOverview() {
// Get the API client and construct the service object.
$client = getClient();
$service = new Google_Service_Sheets($client);

$spreadsheetId = '1UUmhWQVOjy3lpWlOgTBfdShnA1TgQWarQWOoYW1I0yk';
$range = 'Overview!A2:K';
$response = $service->spreadsheets_values->get($spreadsheetId, $range);
$values = $response->getValues();
#print "<table border=0><tr><th>Customer</th><th>Billable?</th></tr><tbody>";
if (count($values) == 0) {
  print "No data found.\n";
} else {
	## Look through each entry
$status = array();
#$status = array('Pre-Sales','Closed Booked - Resource Req.','Assigned','In Progress','Completed');
#foreach ($status as $topic) {
#$status[$topic] = 0;
#}
  foreach ($values as $row) {
$rowStatus = $row[10];
$status[$rowStatus]++;
    }
  }
$statusResults = "[";
#var_dump($status);
foreach ($status as $topic => $value) {
$statusResults .= "\n{ name: '$topic',\n y: $value },\n";
#print "$topic : $value <br>";
}
$statusResults .= "]";
print $statusResults;
}

function getTotalRevenue() {
include 'currencyConverter.php';
// Get the API client and construct the service object.
$client = getClient();
$service = new Google_Service_Sheets($client);

$spreadsheetId = '1UUmhWQVOjy3lpWlOgTBfdShnA1TgQWarQWOoYW1I0yk';
$range = 'Overview!A2:K';
$revenue = 0;
$response = $service->spreadsheets_values->get($spreadsheetId, $range);
$values = $response->getValues();
if (count($values) == 0) {
  print "No data found.\n";
} else {
	## Look through each entry
  foreach ($values as $row) {
  	$unformatted = str_replace(array('£',',','.00'),null,$row[8]);
if ($unformatted != "") {
	$revenue = $revenue + $unformatted;
}
#$revenue = $revenue + strtr($row[8],"£,","");
  }
}
$converted_currency=currencyConverter("GBP","EUR", $revenue);
print $converted_currency;
#print $revenue;
}

function getBillability() {
// Get the API client and construct the service object.
$client = getClient();
$service = new Google_Service_Sheets($client);

$spreadsheetId = '1UUmhWQVOjy3lpWlOgTBfdShnA1TgQWarQWOoYW1I0yk';
$range = 'Overview!A2:K';
$response = $service->spreadsheets_values->get($spreadsheetId, $range);
$values = $response->getValues();
print "<table border=0><tr><th>Customer</th><th>Billable?</th></tr><tbody>";
if (count($values) == 0) {
  print "No data found.\n";
} else {
	## Look through each entry
  foreach ($values as $row) {
  	if (($row[9] == 'Navigate' ) && ($row[10] != 'Completed')) {
#  	if ($row[8] == 'Navigate') {
    printf("<tr><td>%s</td><td>%s</td></tr>", $row[0], $row[7]);
 }
  }
}
print "</tbody></table>";
}
?>
