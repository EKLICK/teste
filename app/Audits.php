<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audits extends Model
{
    protected $fillable = [
        'user_type', 'user_id', 'event', 'auditable_type', 'auditable_id', 'old_values',
        'new_values', 'url', 'ip_address','user_agent', 'tags',
    ];
}
