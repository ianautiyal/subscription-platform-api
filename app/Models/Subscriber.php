<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    protected $fillable = [
        'email'
    ];

    protected $hidden = [
        'pivot',
    ];

    public function subscriptions()
    {
        return $this->belongsToMany(Subscriber::class, 'subscriptions', 'website_id', 'subscriber_id');
    }
}
