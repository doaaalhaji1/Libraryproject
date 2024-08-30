<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Book extends Model
{
    use HasFactory,HasApiTokens;

    protected $fillable =['title','description','status','language','image','book_content','reservation_id', 'status'];



    public function authors()
    {
        return $this->belongsToMany(Author::class, 'author_book');
    }

    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'reservation_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'book_category');
    }
}
