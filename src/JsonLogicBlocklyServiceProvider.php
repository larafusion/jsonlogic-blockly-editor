<?php

namespace LaraFusion\Editor\JsonLogicBlockly;

use Illuminate\Support\ServiceProvider;
use Encore\Admin\Admin;
use Encore\Admin\Form;
use LaraFusion\Editor\JsonLogicBlockly\Form\Field\JsonLogicEditor;

class JsonLogicBlocklyServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(JsonLogicBlockly $extension)
    {
        if (! JsonLogicBlockly::boot()) {
            return ;
        }

        if ($views = $extension->views()) {
            $this->loadViewsFrom($views, 'jsonlogic-blockly-editor');
        }

        Admin::booting(function () {
            Form::extend('jsonlogic', JsonLogicEditor::class);
        });

        if ($this->app->runningInConsole() && $assets = $extension->assets()) {
            $this->publishes(
                [$assets => public_path('vendor/larafusion/jsonlogic-blockly-editor')],
                'jsonlogic-blockly-editor'
            );
        }

    }
}
