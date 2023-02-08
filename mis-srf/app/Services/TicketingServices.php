<?php

namespace App\Services;

use App\Models\Ticket;
use App\Traits\SystemMessage;
use Carbon\Carbon;
use Exception;

class TicketingServices
{
    use SystemMessage;
    public function create_ticket_num()
    {
        $prefix = 'TN-'.Carbon::now()->format('ymd');

        $latest_ticket = Ticket::orderBy('created_at')->first();
        if (empty($latest_ticket))
        {
            $ticket_num = $prefix.'-'.'001';
        }
        else
        {
            list(,,$number) = explode('-', $latest_ticket);
            $ticket_num = $prefix.'-'.(intval($number)+1);
        }
        
        return $ticket_num;
    }

    public function create($data)
    {
        try
        {   
            $new_ticket_num = $this->create_ticket_num();
            Ticket::create([
                'user_id' => $data['user_id'],
                'requestor_firstname' => $data['requestor_firstname'],
                'requestor_middlename' => $data['requestor_middlename'],
                'requestor_lastname' => $data['requestor_lastname'],
                'description' => $data['description'],
                'ticket_num' => $new_ticket_num,
                'request_category_id' => $data['request_category_id'],
                'actions_taken' => $data['actions_taken'],
                'recommendations' => $data['recommendations'],
            ]);

            return ['success' => 'You ticket has been processed, please take note of this ticket number for monitoring', 'ticket_number' => $new_ticket_num];
        }
        catch (Exception $exception)
        {
            logger($exception);
            return response()->json($this->exception());
        }
    }
}
