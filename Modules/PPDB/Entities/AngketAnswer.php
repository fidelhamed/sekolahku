<?php

namespace Modules\PPDB\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AngketAnswer extends Model
{
    use HasFactory;
    
    protected $table = 'angket_answers';

    protected $fillable = [
        'angket_response_id',
        'angket_id',
        'jawaban',
    ];

}