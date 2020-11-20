<?php

namespace App\Admin\Controllers;

use App\Models\Ssl;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SslController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Ssl';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Ssl());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('key', __('Key'));
        $grid->column('pub', __('Pub'));
        $grid->column('clain', __('Clain'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Ssl::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('key', __('Key'));
        $show->field('pub', __('Pub'));
        $show->field('clain', __('Clain'));
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
        $form = new Form(new Ssl());

        $form->text('name', __('Name'))->required();
        $form->file('key', __('Key'))->hidePreview()->uniqueName()->required();
        $form->file('pub', __('Pub'))->hidePreview()->uniqueName()->required();
        $form->file('clain', __('Clain'))->hidePreview()->uniqueName();

        return $form;
    }
}
