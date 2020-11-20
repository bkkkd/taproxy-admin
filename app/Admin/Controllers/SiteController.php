<?php

namespace App\Admin\Controllers;

use App\Models\Sites;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SiteController extends AdminController {

    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Sites';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid() {
        $grid = new Grid(new Sites());

        $grid->column('id', __('Id'));
        $grid->column('main_host', __('Main host'));
        $grid->column('alias_host', __('Alias host'));
        $grid->column('ssl_id', __('Ssl id'));
        $grid->column('proxy_scheme', __('Proxy scheme'));
        $grid->column('proxy_host', __('Proxy host'));
        $grid->column('proxy_port', __('Proxy port'));
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
    protected function detail($id) {
        $show = new Show(Sites::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('main_host', __('Main host'));
        $show->field('alias_host', __('Alias host'));
        $show->field('ssl_id', __('Ssl id'));
        $show->field('proxy_scheme', __('Proxy scheme'));
        $show->field('proxy_host', __('Proxy host'));
        $show->field('proxy_port', __('Proxy port'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form() {
        $form = new Form(new Sites());

        $form->text('main_host', __('Main host'))->rules("required|unique:sites");
        $form->tags('alias_host', __('Alias host'));
        $form->select('ssl_id', __('Ssl'))
                ->options(function() {
                    return \App\Models\Ssl::all()->pluck('name','id');

                })->default(0);
        $form->radio('proxy_scheme', __('Proxy scheme'))
                ->options(['http' => 'http', 'https'=>'https'])->default('http');
        $form->ip('proxy_host', __('Proxy host'))->rules("required");
        $form->number('proxy_port', __('Proxy port'))->rules("required");

        return $form;
    }

}
