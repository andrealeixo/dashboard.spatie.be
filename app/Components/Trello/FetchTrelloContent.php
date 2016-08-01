<?php

namespace App\Components\Trello;

use App\Components\Trello\Events\TrelloContentFetched;
use Illuminate\Console\Command;

class FetchTrelloContent extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'dashboard:trello';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch Trello content.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
//carindale
/*echo "carindale";
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,"http://atg.thetelstrastore.com.au:4030/mdService1Rest/DataSource/?query=Artlset.Q03142010&dfmt=xml&drowcat=1");
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
curl_setopt($ch,CURLOPT_URL,"http://atgsys.cloudapp.net/BRKSRest/DataSource/?query=Q30135937&dfmt=xml&dtotals=0");
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
curl_setopt($ch,CURLOPT_URL,"http://atgsys.cloudapp.net/MRBRRest/DataSource/?query=Q30144542&dfmt=xml&dtotals=0");
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

*/




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

foreach ($xml->Rows->Row as $item) {
        $name = (string)$item->Cell[0];



switch ($name) {
   case "TLS Ground Level":
        $name = "Carindale GF";
        break;
    case "TLS Level 1":
        $name = "Carindale L1";
        break;
    case "TLS Redbank":
        $name = "Redbank";
        break;
    case "Brookside Telstra Store";
	$name = "Brookside";
	break;
    case "Maryborough";
	$name = "Maryborough";
	break;
    case "TLS Hervey Bay";
	$name = "Hervey Bay";
	break;
    case "TLS Toombul";
	$name = "Toombul";
	break;
}

        $ppn = (string)$item->Cell[1];
        $busppn = (string)$item->Cell[2];
        $ppr = (string)$item->Cell[3];
        $prepaid = (string)$item->Cell[4];
        $wbb = (string)$item->Cell[5];
        $datashare = (string)$item->Cell[6];
        $bundles = (string)$item->Cell[7];
        $nbn = (string)$item->Cell[8];
        $foxtel = (string)$item->Cell[9];
        $tv = (string)$item->Cell[10];
        $siebelbus = (string)$item->Cell[11];
//postData($ppn, $busppn, $ppr, $prepaid, $wbb, $datashare, $bundles, $nbn, $foxtel, $tv, $name, $siebelbus);
$_SESSION['storeContent'][$name] = "PPN: " . (string)$ppn . '<br/>'
. "BusPPN: " . (string)$busppn . '<br/>'
. "SiebelBus: " . (string)$siebelbus . '<br/>'
. "PPR: " . (string)$ppr . '<br/>'
. "Prepaid: " . (string)$prepaid . '<br/>'
. "WBB: " . (string)$wbb . '<br/>'
. "Bundles: " . (string)$bundles . '<br/>'
. "NBN: " . (string)$nbn . '<br/>'
. "Foxtel: " . (string)$foxtel . '<br/>'
. "Telstra TV: " . (string)$tv;



}

}


public function postInputs() {
/*
event(new TrelloContentFetched($_SESSION['trelloContent']));
*/

}



}
