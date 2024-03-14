<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title', 'description', 'user_id', 'name', 'email'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
