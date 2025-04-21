<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Image;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    // Relación "UNO A MUCHOS INVERSA"
    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function category() {
        return $this->belongsTo(Category::class);
    }
    
    // Relación "MUCHOS A MUCHOS INVERSA"
    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    // Relación "UNO A UNO POLIMORFICA"
    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }
    
}
