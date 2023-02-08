<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechnicianStatus extends Model
{
    use HasFactory;

    public $table = 'technician_statuses';
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];
}
