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

    public function angketResponse()  
    {  
        return $this->belongsTo(AngketResponse::class);  
    }  

    public function angket()  
    {  
        return $this->belongsTo(Angket::class);  
    }

}