<?php

namespace App\Http\Livewire;

use App\Models\BookField;
use App\Models\Field;
use App\Models\User;
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
        return [
            'username' => User::find($model->user_id)->name,
            'fieldname' => Field::find($model->field_id)->field_name,
            'startat' => $model->start_at->format('d-m-Y H:i'),
            'endat' => $model->end_at->format('d-m-Y H:i'),
            'paid' => $model->paid,
            'bill' => $model->bill_cost,
            'phone' => $model->phone,
        ];
    }
}
