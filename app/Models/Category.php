<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'thumbnail',
        'name',
        'slug',
        'is_published'
    ];

    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function posts(){
        return $this->belongsToMany(Post::class,'categories');
    }
    
}
