<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\PublishNotifiableTrait;
use Illuminate\Notifications\Notifiable;

class Subscription extends Model
{
    use HasFactory, PublishNotifiableTrait, Notifiable;

    protected $fillable = [
        'topic',
        'url',
    ];

    protected $hidden = [
        "id", 
        "created_at",
        "updated_at"
    ];

}
