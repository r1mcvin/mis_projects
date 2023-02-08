<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technician extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'given_name', 
        'middle_name',
        'last_name',
        'technician_status_id',
        'location_id',
        'current_ticket'
    ];

    
    public function full_name()
    {
        return ucfirst($this->given_name).', '.($this->middle_name) ? ucfirst($this->middle_name) . ', ' : ''. ucfirst($this->last_name); 
    }
}
