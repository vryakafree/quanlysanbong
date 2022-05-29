<?php

namespace App\Http\Livewire;

use App\Models\Field;
use App\Models\Type;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Views\GridView;

class FieldsGridView extends GridView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = Field::class;

    /**
     * Sets the data to every card on the view
     *
     * @param $model Current model for each card
     */

    public function card($model)
    {
        return [
            'fieldname' => $model->field_name,
            'cost' => $model->cost,
            'type' => Type::find($model->type_id)->field_member,
            'image' => asset('storage/field.png'),
        ];
    }

    public $maxCols = 3;
    public $withBackground = true;
}
