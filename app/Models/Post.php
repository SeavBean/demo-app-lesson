<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Post extends Model
{
    use HasFactory;
    public function category(){
        return $this->belongsTo(Category::class, 'categories_id');
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    public function user(){
        return $this->belongsTo(User::class, 'users_id');
    }
    

    

    // protected function thumbnail(): Attribute {
    //     return Attribute::make(
    //         get: fn($value) => asset($value),
    //     );
    // } problem not see image
    
}