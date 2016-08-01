<?php

namespace App\Components\Trello\Events;

use App\Components\DashboardEvent;

class TrelloContentFetched extends DashboardEvent
{
    /** @var array */
    public $trelloContent;

    public function __construct(array $trelloContent)
    {
        $this->trelloContent = $trelloContent;
    }
}
