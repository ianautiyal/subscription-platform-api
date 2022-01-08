<?php

namespace App\Models;

use App\Support\Models\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'domain',
    ];

    protected $hidden = [
        'pivot',
    ];

    public function getRouteKeyName()
    {
        return 'domain';
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function subscribers()
    {
        return $this->belongsToMany(Subscriber::class, 'subscriptions', 'website_id', 'subscriber_id');
    }
}
