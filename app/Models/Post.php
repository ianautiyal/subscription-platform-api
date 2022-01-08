<?php

namespace App\Models;

use App\Events\PostPublished;
use App\Support\Models\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'title',
        'description',
        'website_id',
    ];

    protected $hidden = [
        'website_id'
    ];

    protected $dispatchesEvents = [
        'created' => PostPublished::class,
    ];

    public function website()
    {
        return $this->belongsTo(Website::class);
    }
}
