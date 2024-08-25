<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['reservation_start_date','reservation_end_date'];
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function employees()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }

    public function books()
    {
        return $this->hasMany(Book::class, 'reservation_id');
    }
}
