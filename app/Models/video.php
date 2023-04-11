<?php

namespace App\Models;

//use Conner\Likeable\Likeable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class video extends Model
{
    use HasFactory;

//    use Likeable;

    protected $fillable = [
        'title',
        'description',
        'poster',
        'video_path',
        'view_count',
        'is_published',
        'author_id',
        'likes',
    ];

    public function author()
    {
        return $this->hasOne(User::class, 'id', 'author_id')->first();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'video_id', 'id')->get();
    }

    public function getImageUrlAttribute()
    {
        return url(Storage::url($this->poster));
    }

    public function getVideoUrlAttribute()
    {
        return url(Storage::url($this->video_path));
    }
}
