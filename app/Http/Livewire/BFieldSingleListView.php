<?php

namespace App\Http\Livewire;

use App\Models\BookField;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use LaravelViews\Views\ListView;

class BFieldSingleListView extends ListView
{
    /**
     * Sets a model class to get the initial data
     */
    //protected $model = BookField::class;
    public function repository(): Builder
    {
        return BookField::where('user_id', Auth::user()->id);
    }

    /**
     * Sets the properties to every list item component
     *
     * @param $model2 Current model for each card
     */
    public function data($model2)
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
        return [
            'username' => $model2->user->name,
            'fieldname' => $model2->field->field_name,
            'startat' => $weekday. ', ' .$model2->start_at->format('d-m-Y H:i'),
            'endat' => $weekday. ', ' .$model2->end_at->format('d-m-Y H:i'),
            'paid' => $model2->paid,
            'bill' => $model2->bill_cost,
            'phone' => $model2->phone,
        ];
    }

    public $searchBy = ['user.name', 'user.phone', 'field.field_name'];
}
