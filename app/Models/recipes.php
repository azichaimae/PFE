<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\likes;

class recipes extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'picture', 'description'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function likes()
{
    return $this->hasMany(likes::class);
}
public function likesCount()
{
    return $this->likes()->where('status', 1)->count();
}
public function comments()
{
    return $this->hasMany(Comment::class);
}
}
