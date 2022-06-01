<?php

namespace App\Admin\Controllers;

use App\Models\Field;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class FieldController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Field';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Field());

        $grid->column('id', __('Id'));
        $grid->column('field_name', __('Field name'));
        $grid->column('cost', __('Cost'));
        $grid->column('type_id', __('Type id'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Field::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('field_name', __('Field name'));
        $show->field('cost', __('Cost'));
        $show->field('type_id', __('Type id'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Field());

        $form->text('field_name', __('Field name'));
        $form->number('cost', __('Cost'));
        $form->number('type_id', __('Type id'));

        return $form;
    }
}
