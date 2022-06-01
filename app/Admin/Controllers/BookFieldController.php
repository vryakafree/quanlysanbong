<?php

namespace App\Admin\Controllers;

use App\Models\BookField;
use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class BookFieldController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'BookField';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new BookField());
        $grid->column('id', __('Id'));
        $grid->column('user_id', __('User id'));
        $grid->column('field_id', __('Field id'));
        $grid->column('start_at', __('Start at'));
        $grid->column('end_at', __('End at'));
        $grid->column('paid', __('Paid'))->bool();
        $grid->column('bill_cost', __('Bill cost'));
        $grid->column('phone', __('Phone'));

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
        $show = new Show(BookField::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('field_id', __('Field id'));
        $show->field('start_at', __('Start at'));
        $show->field('end_at', __('End at'));
        $show->field('paid', __('Paid'));
        $show->field('bill_cost', __('Bill cost'));
        $show->field('phone', __('Phone'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new BookField());

        $form->number('user_id', __('User id'));
        $form->number('field_id', __('Field id'));
        $form->datetime('start_at', __('Start at'))->default(date('d-m-Y H:i:s'));
        $form->datetime('end_at', __('End at'))->default(date('d-m-Y H:i:s'));
        $form->switch('paid', __('Paid'));
        $form->number('bill_cost', __('Bill cost'));
        $form->mobile('phone', __('Phone'))->options(['removeMaskOnSubmit' => 'true']);

        return $form;
    }
}
