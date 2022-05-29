<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookField extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'field_id',
        'phone',
        'start_at',
        'end_at',
        'paid',
        'bill_cost'
    ];

    public function user()
    {
        return $this->hasMany('User');
    }
}
