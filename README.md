JsonLogic Blockly Editor
======

* Installation
````bash
php composer require larafusion/jsonlogic-blockly-editor
````

* Publish resurce
````bash
php artisan vendor:publish --tag=jsonlogic-blockly-editor
````

* Usage

  * Use in Model form
    ````php
    protected function form()
    {
        $form->jsonlogic('column_name', 'Label');
    }
    ````
