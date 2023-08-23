<div class="{{$viewClass['form-group']}} {!! !$errors->has($errorKey) ? '' : 'has-error' !!}">

    <label for="{{$id}}" class="{{$viewClass['label']}} control-label">{{$label}}</label>

    <div class="{{$viewClass['field']}}">

        @include('admin::form.error')

        <div style="height: 500px">

            <div id="blocklyDiv"></div>

            <xml id="toolbox">
                <category name="Input" colour="210" >
                    <block type="var"></block>
                    <block type="dictionary"></block>
                    <block type="array"></block>
                    <block type="number"></block>
                    <block type="string"></block>
                    <block type= "true_false"></block>
                </category>

                <category name="Logic" colour="120">
                    <block type= "if_logic"></block>
                    <block type= "logical"></block>
                    <block type= "not"></block>
                </category>

                <category name="Boolean" colour="290">
                    <block type= "boolean"></block>
                </category>

                <category name="Numeric" colour="150">
                    <block type= "comparison"></block>
                    <block type= "minmax"></block>
                    <block type= "between"></block>
                    <block type= "arithmatic"></block>
                </category>

                <category name="Array" colour="330">
                    <block type= "map_filter"></block>
                    <block type= "merge"></block>
                    <block type= "InMiss"></block>
                </category>

                <category name="String" colour="20">
                    <block type="inString"></block>
                    <block type="catString"></block>
                    <block type="subStr"></block>
                    <block type="log"></block>
                </category>
            </xml>
        </div>

        <textarea @if($hide) style="display: none" @endif name="{{$name}}" class="form-control {{$class}}" rows="{{ $rows = 5 }}" placeholder="{{ $placeholder }}" {!! $attributes !!} >{{ old($column, $value) }}</textarea>

        {!! $append = null !!}

        @include('admin::form.help-block')

    </div>
</div>
