<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable =['title','description','status','language','image','category_id','book_Content'];

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'author_book');
    }

     public function category()
    {
         return $this->belongsTo(Category::class);
    }

    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'reservation_id');
    }
}
