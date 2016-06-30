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
      /*  $fileNames = explode(',', env('GITHUB_FILES'));

        $fileContent = collect($fileNames)
            ->combine($fileNames)
            ->map(function ($fileName) {
                return GitHub::repo()->contents()->show('spatie', 'tasks', "{$fileName}.md", 'master');
            })
            ->map(function ($fileInfo) {
                return file_get_contents($fileInfo['download_url']);
            })
            ->map(function ($markdownContent) {
                return markdownToHtml($markdownContent);
            })
            ->toArray();
*/
            $storeContent = ["Brookside" => "testing<p>testing3", "Redbank" => "testing 2"] ;
        event(new StoreContentFetched($storeContent));
    }
}
