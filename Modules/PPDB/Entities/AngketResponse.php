<?php

namespace Modules\PPDB\Entities;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AngketResponse extends Model
{
    use HasFactory;
    
    protected $table = 'angket_responses';

    protected $fillable = [
        'user_id',
    ];

    public function user()  
    {  
        return $this->belongsTo(User::class);  
    }  

    public function answers()  
    {  
        return $this->hasMany(AngketAnswer::class);  
    }

}