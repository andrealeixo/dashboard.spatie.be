<?php

namespace App\Components\ATG;

use App\Components\ATG\Events\StoreContentFetched;
use Illuminate\Console\Command;

class FetchStoreContent extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'dashboard:atg';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch ATG file content.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
date_default_timezone_set('Australia/Brisbane');
//carindale
echo "carindale";
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,"http://13.73.107.108:4030/mdService1Rest/DataSource/?query=Artlset.Q15100900&dfmt=xml&drowcat=1");
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_HEADER, true);
curl_setopt($ch,CURLOPT_CONNECTTIMEOUT, 240);
curl_setopt($ch,CURLOPT_TIMEOUT, 240);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization:SharperLight:UH=1CB3A37F9DCC2C6E8CFF1AFA6C3EF06D0857871FBAB2C721C995EFD377A300A5 '
        ));
    $response=curl_exec($ch);
$curl_errno = curl_errno($ch);

$header_size = curl_getinfo($ch,CURLINFO_HEADER_SIZE);
$body = substr( $response, $header_size );
    curl_close($ch);

if ($curl_errno > 0) {
	echo "timeout error";
	die();
}
$utf = preg_replace('/(<\?xml[^?]+?)utf-16/i', '$1utf-8', $body);
$xml=@simplexml_load_string($utf) or die("Error: Cannot create object");
$this->parseInputs($xml);
echo "brookside";
//brookside
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,"http://atgsys.cloudapp.net/BRKSRest/DataSource/?query=Q15105243&dfmt=xml&dtotals=0");
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_HEADER, true);
curl_setopt($ch,CURLOPT_CONNECTTIMEOUT, 240);
curl_setopt($ch,CURLOPT_TIMEOUT, 240);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization:SharperLight:UH=c0e555d4cab8878d57b9549dfb68b5e681a6ecb8afd9506ab91be32d7f2940e0'
        ));
    $response=curl_exec($ch);
$header_size = curl_getinfo($ch,CURLINFO_HEADER_SIZE);
$body = substr( $response, $header_size );


    curl_close($ch);
if ($curl_errno > 0) {
	echo "timeout error";
	die();
}
$utf = preg_replace('/(<\?xml[^?]+?)utf-16/i', '$1utf-8', $body);
$xml=@simplexml_load_string($utf) or die("Error: Cannot create object");
$this->parseInputs($xml);
echo "maryborough";
//maryborough group
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,"http://atgsys.cloudapp.net/MRBRRest/DataSource/?query=Q15104957&dfmt=xml&dtotals=0");
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_HEADER, true);
curl_setopt($ch,CURLOPT_CONNECTTIMEOUT, 240);
curl_setopt($ch,CURLOPT_TIMEOUT, 240);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization:SharperLight:UH=c0e555d4cab8878d57b9549dfb68b5e681a6ecb8afd9506ab91be32d7f2940e0'
        ));
    $response=curl_exec($ch);
$header_size = curl_getinfo($ch,CURLINFO_HEADER_SIZE);
$body = substr( $response, $header_size );


    curl_close($ch);
if ($curl_errno > 0) {
	echo "timeout error";
	die();
}
$utf = preg_replace('/(<\?xml[^?]+?)utf-16/i', '$1utf-8', $body);
$xml=@simplexml_load_string($utf) or die("Error: Cannot create object");
$this->parseInputs($xml);


$this->postInputs();






// Setup Inputs
  /*      $storeNames = ['Brookside', 'Carindale GF', 'Carindale L1', 'Redbank', 'Maryborough', 'Hervey Bay', 'Toombul'];

        $storeContent = collect($storeNames)
            ->combine($storeNames)
            ->map(function ($storeName) {
		return "1";
            })
            ->toArray(); */
    }

public function parseInputs($xml) {

date_default_timezone_set("Australia/Brisbane");

$datetime1 = time();
$datetime2 = strtotime("2016-08-27");
$datetime3 = strtotime("2016-07-30");
$datediff = $datetime2 - $datetime1;
$daysLeft = floor($datediff/(60*60*24));
$datediff = $datetime1 - $datetime3;
$daysTo = floor($datediff/(60*60*24));

foreach ($xml->Rows->Row as $item) {
        $name = (string)$item->Cell[0];



switch ($name) {
   case "TLS Ground Level":
        $name = "Carindale GF";
	$storeTarget = 104;
	$sprintTarget = 127;
        break;
    case "TLS Level 1":
        $name = "Carindale L1";
	$storeTarget = 58;
	$sprintTarget = 72;
        break;
    case "TLS Redbank":
        $name = "Redbank";
	$storeTarget = 45;
	$sprintTarget = 55;
        break;
    case "Brookside Telstra Store";
	$name = "Brookside";
	$storeTarget = 96;
	$sprintTarget = 118;
	break;
    case "Maryborough";
	$name = "Maryborough";
	$storeTarget = 1;
	$sprintTarget = 1;
	break;
    case "TLS Hervey Bay";
	$name = "Hervey Bay";
	$storeTarget = 129;
	$sprintTarget = 158;

	break;
    case "TLS Toombul";
	$name = "Toombul";
	$storeTarget = 118;
	$sprintTarget = 145;

	break;
}

        $ppn = (string)$item->Cell[1];
$_SESSION['storeContent'][$name] = "Store Target: " . $storeTarget . '<br/>'
. "Sprint Target: " . $sprintTarget . '<br/>'
 . "Sprint To Date: " . (string)$ppn . '<br/>'
. "Sprint Runrate: " . (string)round(($ppn/ $daysTo)* 28);



}

}


public function postInputs() {

event(new StoreContentFetched($_SESSION['storeContent']));


}



}
