<?php

namespace App\Http\Livewire;

use App\Models\BookField;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Views\ListView;

class BFieldListView extends ListView
{
    /**
     * Sets a model class to get the initial data
     */
    //protected $model = BookField::class;
    public function repository(): Builder
    {
        return BookField::query();
    }

    /**
     * Sets the properties to every list item component
     *
     * @param $model Current model for each card
     */
    public function data($model)
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
            'username' => $model->user->name,
            'fieldname' => $model->field->field_name,
            'startat' => $weekday. ', ' .$model->start_at->format('d-m-Y H:i'),
            'endat' => $weekday. ', ' .$model->end_at->format('d-m-Y H:i'),
            'paid' => $model->paid,
            'bill' => $model->bill_cost,
            'phone' => $model->phone,
        ];
    }

    public $searchBy = ['user_id', 'user.name', 'user.phone'];
}
