<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookField extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'field_id',
        'phone',
        'start_at',
        'end_at',
        'paid',
        'bill_cost'
    ];
    public $timestamps = false;
}
