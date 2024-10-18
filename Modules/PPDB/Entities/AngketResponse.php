<?php

namespace Modules\PPDB\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AngketResponse extends Model
{
    use HasFactory;
    
    protected $table = 'angket_responses';

    protected $fillable = [
        'user_id',
    ];

}