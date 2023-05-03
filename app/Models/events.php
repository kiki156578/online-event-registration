<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\eventStatus;

class events extends Model
{
    use HasFactory;
    protected $fillable=['eventId','eventName','eventDate','eventTime','eventVenue','eventDescription','uid'];

    public function status(){
        return $this->hasMany(eventStatus::class,'eventId');
    }
    
}

