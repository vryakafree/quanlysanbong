<?php

namespace App\Admin\Controllers;

use App\Models\BookField;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Admin\Selectable\Users;
use App\Admin\Selectable\Fields;

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
        $grid->column('user.name', __('Tên người đặt'));
        $grid->column('field.field_name', __('Sân được đặt'));
        $grid->column('start_at', __('Bắt đầu'));
        $grid->column('end_at', __('Kết thúc'));
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
        $show->field('user.name', __('Name'));
        $show->field('field.field_name', __('Sân'));
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

        $form->belongsTo('user_id', Users::class,'Người dùng');
        $form->belongsTo('field_id',Fields::class, __('Sân'));
        $form->datetime('start_at', __('Bắt đầu'))->default(date('d-m-Y H:i:s'));
        $form->datetime('end_at', __('Kết thúc'))->default(date('d-m-Y H:i:s'));
        $form->switch('paid', __('Paid'));
        $form->number('bill_cost', __('Bill cost'));
        $form->mobile('phone', __('Phone'))->options(['removeMaskOnSubmit' => 'true']);

        $form->footer(function ($footer) {

            // disable reset btn
            $footer->disableReset();

            // disable `View` checkbox
            $footer->disableViewCheck();

            // disable `Continue editing` checkbox
            $footer->disableEditingCheck();

            // disable `Continue Creating` checkbox
            $footer->disableCreatingCheck();

        });
        return $form;
    }
}
