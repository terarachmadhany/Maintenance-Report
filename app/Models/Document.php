<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'name', 'type', 'size', 'owner', 'modified', 'created', 'download_permissions', 'access', 'last_interaction', 'last_interactor'
    ];
}
