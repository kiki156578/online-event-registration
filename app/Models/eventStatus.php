<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\events;

class eventStatus extends Model

{

    use HasFactory;

        protected $fillable=['eventId','uid'];



            public function events(){

                    return $this->belongsTo(events::class);

                        }

                        }
