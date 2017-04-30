<?php

namespace App\Components\Trello;

use App\Components\Trello\Events\TrelloContentFetched;
use Illuminate\Console\Command;
use Trello\Client;

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



$this->parseLists('Carindale GF');
$this->parseLists('Carindale L1');
$this->parseLists('Redbank');
$this->parseLists('Toombul');
$this->parseLists('Brookside');
$this->parseLists('Maryborough');
$this->parseLists('Hervey Bay');
$this->parseLists('Toowong');

$this->postInputs();

}



public function postInputs() {

event(new TrelloContentFetched($_SESSION['trelloContent']));


}


public function parseLists($name) {

$client = new Client();
$client->authenticate(getenv('TRELLO_KEY'),getenv('TRELLO_TOKEN'),Client::AUTH_URL_CLIENT_ID);


switch($name) {
	case "Carindale GF":
	$pending = $client->lists()->cards()->all('578c83347afbd14dfa179f14');
	$pending2 = $client->lists()->cards()->all('57ad39d1bf28a24173d710fc');
	$cancelled = $client->lists()->cards()->all('57ad3b4d41135618537ce0c2');
	$provisioning = $client->lists()->cards()->all('578c8342defae3b874abfc2e');
	$followup = $client->lists()->cards()->all('578c833f1d87a1370c92a502');
	$this->setResults('Carindale GF', count($pending), count($provisioning), count($followup), count($pending2), count($cancelled));	
	break;
	case "Carindale L1":
	$pending = $client->lists()->cards()->all('578c8316c1d52b93713e7c2c');
	$pending2 = $client->lists()->cards()->all('57ad3bdf51c7ad666a5d3b12');
	$cancelled = $client->lists()->cards()->all('57ad3be37c63e2f621895a98');
	$provisioning = $client->lists()->cards()->all('578c83209d93e42774ba17ce');
	$followup = $client->lists()->cards()->all('578c831e3b541f91b5bb8ec9');
	$this->setResults('Carindale L1', count($pending), count($provisioning), count($followup), count($pending2), count($cancelled));	
	break;
	case "Redbank":
	$pending = $client->lists()->cards()->all('578c82f6f6cb9df5ef9f6f16');
	$pending2 = $client->lists()->cards()->all('57ad3d89e8d6572d516fc311');
	$cancelled = $client->lists()->cards()->all('578c8309f40ab57b69b09d36');
	$provisioning = $client->lists()->cards()->all('578c8302ad489cec310d5ef9');
	$followup = $client->lists()->cards()->all('57a8161e62606b640a8adef4');
	$this->setResults('Redbank', count($pending), count($provisioning), count($followup), count($pending2), count($cancelled));	
	break;
	case "Brookside":
	$pending = $client->lists()->cards()->all('55c96384390e1b9426d40c52');
	$pending2 = $client->lists()->cards()->all('57ad3b386ea3ac470505fc2e');
	$cancelled = $client->lists()->cards()->all('57a29b21690b3f76034bbd97');
	$provisioning = $client->lists()->cards()->all('57a29b0bdd585779b8bab60c');
	$followup = $client->lists()->cards()->all('57a816940ec13eea66cb86b3');
	$this->setResults('Brookside', count($pending), count($provisioning), count($followup), count($pending2), count($cancelled));	
	break;
	case "Hervey Bay":
	$pending = $client->lists()->cards()->all('57a291652e3c4d4c69c772a8');
	$provisioning = $client->lists()->cards()->all('57a291652e3c4d4c69c772a9');
	$pending2 = $client->lists()->cards()->all('57ad39e1f833897d69411e67');
	$cancelled = $client->lists()->cards()->all('57ad3a7f0194367ad432ec5f');
	$followup = $client->lists()->cards()->all('57a816efe67486a513c65200');
	$this->setResults('Hervey Bay', count($pending), count($provisioning), count($followup), count($pending2), count($cancelled));	
	break;
	case "Toombul":
	$pending = $client->lists()->cards()->all('57a291dcc535e947bbd33e84');
	$provisioning = $client->lists()->cards()->all('57a291dcc535e947bbd33e85');
	$pending2 = $client->lists()->cards()->all('57ad3a01a95904b4375bf65b');
	$cancelled = $client->lists()->cards()->all('57ad3626656bca2a93900d09');
	$followup = $client->lists()->cards()->all('57a817d8eed86be10e9ae7b3');
	$this->setResults('Toombul', count($pending), count($provisioning), count($followup), count($pending2), count($cancelled));	
	break;
	case "Maryborough":
	$pending = $client->lists()->cards()->all('57a28e62317685efcbc079fe');
	$provisioning = $client->lists()->cards()->all('57a28e6863a634f3d008c815');
	$pending2 = $client->lists()->cards()->all('57ad3a46f48c2ae277a37e0d');
	$cancelled = $client->lists()->cards()->all('57ad491b1af8868e1d0381c4');
	$followup = $client->lists()->cards()->all('57a8183aa3dd1bd30d86b4e9');
	$this->setResults('Maryborough', count($pending), count($provisioning), count($followup), count($pending2), count($cancelled));	
	break;
	case "Toowong":
	$pending = $client->lists()->cards()->all('58aea7388ecbf74c9ef13751');
	$provisioning = $client->lists()->cards()->all('58aea7388ecbf74c9ef13752');
	$pending2 = $client->lists()->cards()->all('58aea7388ecbf74c9ef13753');
	$cancelled = $client->lists()->cards()->all('58aea7388ecbf74c9ef13757');
	$followup = $client->lists()->cards()->all('58aea7388ecbf74c9ef13755');
	$this->setResults('Toowong', count($pending), count($provisioning), count($followup), count($pending2), count($cancelled));	
	break;
}

}

public function setResults() {
	$args = func_get_args();
	$_SESSION['trelloContent'][$args[0]] = "Invoiced: " . $args[1] . '<br/>' .
	"Pending: " . $args[4] . '<br/>' .
	"Provisioning: " . $args[2] . '<br/>' . "Followup: " . $args[3] . '<br/>' .
	"Cancelled: " . $args[5];
	

}



}
