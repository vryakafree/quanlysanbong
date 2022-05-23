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
            'title' => $model->field_name,
            'subtitle' => $model->cost,
            'description' => $model->type_id,
            'image' => asset('storage/field.png'),
        ];
    }

    public $maxCols = 3;
    public $withBackground = true;
}
