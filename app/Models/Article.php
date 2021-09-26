<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'img', 'slug'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function state()
    {
        return $this->hasOne(State::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getBodyPreview()
    {
        return Str::limit($this->body);
    }

    public function createdAtForHumans()
    {
        return $this->created_at->diffForHumans();
    }

    public function scopeLastLimit($query, $numbers)
    {
        return $query
            ->with('tags', 'state')
            ->orderBy('created_at', 'desc')
            ->limit($numbers)
            ->get();
    }
}
