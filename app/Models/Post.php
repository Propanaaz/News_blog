<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ["title","image","slug","content","user_id","category_id","tags","tags2","tags3"];

    public function post(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function postcat(){
        return $this->belongsTo(Category::class,"category_id");
    }
}
