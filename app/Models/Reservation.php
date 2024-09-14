<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Reservation extends Model
{
    use HasFactory,HasApiTokens;


    protected $fillable = [
        'user_id',
        'reservation_start_date',
        'reservation_end_date',
        'status',
        'employee_id',
        'recipient_user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }

    public function recipient()
    {
        return $this->belongsTo(User::class, 'recipient_user_id');
    }

    public function books()
    {
        return $this->hasMany(Book::class, 'reservation_id');
    }
}
