<?php

namespace App\Admin\Controllers;

use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends AdminController
{
    /**
     * Title for current resource.getImageAttribute
     *
     * @var string
     */
    protected $title = 'User';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */

    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->column('id', __('Id'));
        $grid->column('username', __('Username'));
        $grid->column('name', __('Name'));
        $grid->column('email', __('Email'));
        $grid->column('phone', __('Phone'));
        $grid->column('avatar', __('Avatar'))->display(function ($image) {
            return Storage::disk('admin')->url($image);
        });
        $grid->column('email_verified_at', __('Email verified at'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        $grid->actions(function (Grid\Displayers\Actions $actions) {
            if ($actions->getKey() == 1) {
                $actions->disableDelete();
            }
        });

        $grid->tools(function (Grid\Tools $tools) {
            $tools->batch(function (Grid\Tools\BatchActions $actions) {
                $actions->disableDelete();
            });
        });

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
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('username', __('Username'));
        $show->field('password', __('Password'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        $show->field('phone', __('Phone'));
        $show->field('email_verified_at', __('Email verified at'));
        $show->field('avatar', __('Avatar'))->as(function ($image) {
            return $image;
        })->image();
        $show->field('remember_token', __('Remember token'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User());

        $userTable = config('admin.database.users_table');
        $connection = config('admin.database.connection');

        $form->display('id', 'ID');
        $form->text('name', __('Name'))->rules('required');
        $form->text('username', __('Username'))
            ->creationRules(['required', "unique"])
            ->updateRules(['required', "unique:{$connection}.{$userTable},username,{{id}}"]);
        $form->password('password', __('Password'))->rules('required')
            ->default(function ($form) {
                return $form->model()->password;
            });
        $form->email('email', __('Email'));
        $form->mobile('phone', __('Phone'))->options(['removeMaskOnSubmit' => 'true'])
            ->creationRules(['required', "unique"])
            ->updateRules(['required', "unique:{$connection}.{$userTable},phone,{{id}}"]);
        $form->datetime('email_verified_at', __('Email verified at'));
        $form->image('avatar', __('Avatar'))
            ->move('public/img/avatar');

        $form->saving(function (Form $form) {
            if ($form->password && $form->model()->password != $form->password) {
                $form->password = Hash::make($form->password);
            }
            $form->image('avatar')
                ->dir('img/avatar');

        });

        $form->footer(function ($footer) {

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
