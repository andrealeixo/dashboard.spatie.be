<?php

namespace App\Components\ATG\Events;

use App\Components\DashboardEvent;

class StoreContentFetched extends DashboardEvent
{
    /** @var array */
    public $storeContent;

    public function __construct(array $storeContent)
    {
        $this->storeContent = $storeContent;
    }
}
