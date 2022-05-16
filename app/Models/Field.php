<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'field_name',
        'cost',
        'type_id'
    ];
}
