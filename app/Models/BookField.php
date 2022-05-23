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

    protected $rules = [
        'start_at' => 'date_format:Y-m-d H:i:s|required|unique:fields_table',
        'start_end' => 'date_format:Y-m-d H:i:s|required|unique:fields_table',
];
}
