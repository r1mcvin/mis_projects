<?php

namespace App\Services;

use Carbon\Carbon;

class TicketingServices
{
    public function create_ticket_num()
    {
        $prefix = 'TN'-Carbon::now()->format('Ymd');
    }
}
