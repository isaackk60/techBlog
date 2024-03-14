<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['title', 'subtitle', 'slug', 'description', 'image_path', 'user_id'];//'like','commits'

    public function user()
    {
        return $this->belongsTo(User::class);//user id related to user table
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function likes()
    {
        return $this->belongsToMany(User::class, 'post_user', 'post_id', 'user_id')->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class); // comment table must have a belongTo no need another database table
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'post_user', 'post_id', 'user_id');// with third pivot table have another belongsToMany
    }
    
    public function likedByUser($user)
    {
        return $this->users()->where('user_id', $user->id)->exists();
    }

}
