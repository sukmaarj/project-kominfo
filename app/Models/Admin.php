<?php

namespace App\models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    //memiliki relasi dengan post.php
    //(satu category memiliki banyak post)
    public function posts() {
        return $this->hasMany(Post::class);
    }
} 