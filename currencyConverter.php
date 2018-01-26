<?php
#$from_Currency = "GBP";
#$to_Currency = "EUR";
#$amount = "100";
#currencyConverter($from_Currency,$to_Currency,$amount);
function currencyConverter($from_Currency,$to_Currency,$amount) {
$from_Currency = urlencode($from_Currency);
$to_Currency = urlencode($to_Currency);
$get = file_get_contents("https://finance.google.com/finance/converter?a=$amount&from=$from_Currency&to=$to_Currency");
$get = explode("<span class=bld>",$get);
$get = explode("</span>",$get[1]);
$converted_currency = preg_replace("/[^0-9\.]/", null, $get[0]);
return number_format($converted_currency) . " $to_Currency";
#print $converted_currency;
}
?>