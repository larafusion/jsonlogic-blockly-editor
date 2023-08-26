<?php

namespace LaraFusion\Editor\JsonLogicBlockly\Renderable;

use Illuminate\Contracts\Support\Renderable;
use App\Models\JsonLogic as Model;

class JsonLogic implements Renderable
{
    public function __construct(protected $model)
    {
        //
    }

    public function render($key = null)
    {
        $model = Model::find($key);

        $jsonLogic = json_encode(json_decode($model->json_logic, true));

        $elementId = md5('blocklyDiv_'.$model->id);

        return <<<EOT
<div style="height: 300px">
    <div id="$elementId" style="float: left; width: 100%; height: 100%"></div>
</div>

<script>
	Blockly.inject(document.getElementById('$elementId'), {
        toolbox: document.getElementById('toolbox'),
        img: '/vendor/larafusion/jsonlogic-blockly-editor/img/',    // to avoid reaching to the web for icons
		collapse: true,
		comments: true,
		scrollbars: true,
		readOnly: true,
		trashcan: false
	});

    // Load the JsonLogic from model attribute
    Blockly.JSON.toWorkspace('$jsonLogic', Blockly.getMainWorkspace());
</script>
EOT;
    }

}
