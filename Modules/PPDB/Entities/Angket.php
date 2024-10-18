<?php

namespace Modules\PPDB\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Angket extends Model
{
    use HasFactory;
    
    protected $table = 'angkets';

    protected $fillable = [
        'pertanyaan',
    ];
}