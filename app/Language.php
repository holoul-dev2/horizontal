<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Language extends Model
{
    protected $table = 'languages';
    protected $fillable = [
        'name',
        'code',
        'direction',
        'active'
    ];
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
