<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;
    protected $table = 'maintenance';
    protected $primarykey = "id";
    protected $fillable = [
        'id',
        'project_name',
        'change_name',
        'ticket_number',
        'requested_by',
        'contact',
        'date',
        'reason',
        'priority',
        'technician',
        'estimated_start',
        'estimated_finish',
        'duration',
        'cost',
        'list_task',
        'date_needed',
        'approval_requester',
        'approval_manager',
        'approval_manager',
        'approval_date',
        'last_interactor',
        'change_request_id',
    ];
}
