<?php

namespace App\Admin\Selectable;

use App\Models\Field;
use Encore\Admin\Grid\Filter;
use Encore\Admin\Grid\Selectable;

class Fields extends Selectable
{
    public $model = Field::class;

    public function make()
    {
        $this->column('id');
        $this->column('field_name');
        $this->column('cost');
        $this->column('type_id');

        $this->filter(function (Filter $filter) {
            $filter->like('field_name');
        });
    }
}
