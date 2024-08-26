<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Author extends Model
{
    use HasFactory,HasApiTokens;

    protected $fillable = [
        'name',
        'description',
        'nationality',
        'birthdate',
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class, 'author_book');
    }
}
