<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

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

    protected $dates = ['start_at', 'end_at'];

    protected function serializeDate(DateTimeInterface $date)
    {
        $weekday = date("l");
        $weekday = strtolower($weekday);
        switch($weekday) {
            case 'monday':
                $weekday = 'Thứ hai';
                break;
            case 'tuesday':
                $weekday = 'Thứ ba';
                break;
            case 'wednesday':
                $weekday = 'Thứ tư';
                break;
            case 'thursday':
                $weekday = 'Thứ năm';
                break;
            case 'friday':
                $weekday = 'Thứ sáu';
                break;
            case 'saturday':
                $weekday = 'Thứ bảy';
                break;
            default:
                $weekday = 'Chủ nhật';
                break;
        }

        return $weekday. ', ' .$date->format($this->dateFormat ?: ' d/m/Y H:i');
    }
}
