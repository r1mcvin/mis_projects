<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'request_user_id',
        'requestor_firstname',
        'requestor_middlename',
        'requestor_lastname',
        'description',
        'ticket_num',
        'request_category_id',
        'actions_taken',
        'recommendations',
        'status',
        'technician_id',
        'remarks',
        'repair_start_time',
        'repair_end_time',
        'created_at',
        'updated_at'
    ];
}
