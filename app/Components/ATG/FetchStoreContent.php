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

/*	$storeNames = array('Brookside','Carindale GF', 'Carindale L1', 'Redbank', 'Maryborough', 'Hervey Bay', 'Toombul');

        $storeContent = collect($storeNames)
            ->combine($storeNames)
            ->map(function ($data) {
		return "1";
            })
            ->toArray();
*/
$storeContent = ['Brookside' => 'Testing', 'Redbank' => 'Testing2'];
        event(new StoreContentFetched($storeContent));
    }
}
