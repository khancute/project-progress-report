<?php
$ref_item_id = !empty($model['RefSubItem'])?$model['RefSubItem']['ref_item_id']:'';
$group = !empty($model['RefSubItem'])?$model['RefSubItem']['group']:'';
?>
<form class="form-horizontal" method='post'>
    <fieldset>
        <legend>Sub Item Detail - <?php echo $this->params['named']['id']=='new'?'Insert':'Update';?></legend>
        <div class="control-group">
            <label class="control-label" for="ref_item">Item</label>
            <div class="controls">
                <select name="data[ref_item_id]" id="ref_item" onchange="changedItem(this.value, '#group')">
                    <option value="0">Select Ref item</option>
                    <? foreach($items as $r):?>
                    <option value="<?=$r['RefItem']['id']?>" <?=$r['RefItem']['id']==$ref_item_id?'selected="selected"':''?>><?=$r['RefItem']['id']?> <?=$r['RefItem']['name']?></option>
                    <? endforeach;?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="group">Group</label>
            <div class="controls">
                <select name="data[group]" id="group">
                    <option value="0">Select Group</option>
                    <? foreach($groups as $r):?>
                    <option value="<?=$r['RefGroup']['id']?>" <?=$r['RefGroup']['id']==$group?'selected="selected"':''?>><?=str_pad($r['RefGroup']['order'], 2, "0", STR_PAD_LEFT);?> <?=$r['RefGroup']['name']?></option>
                    <? endforeach;?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="name">Name</label>
            <div class="controls">
                <textarea name='data[name]' id='name' placeholder='sub item name'><?=empty($model['RefSubItem']['name'])?'':$model['RefSubItem']['name']?></textarea>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="unit">Unit</label>
            <div class="controls">
                <input class="input-small" type='text' name='data[unit]' id='unit' placeholder='sub item unit' value='<?=empty($model['RefSubItem']['unit'])?'':$model['RefSubItem']['unit']?>'>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="scenario">Scenario</label>
            <div class="controls">
                <textarea name='data[scenario]' id='scenario'><?=empty($model['RefSubItem']['scenario'])?'':$model['RefSubItem']['scenario']?></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="<?=$baseUrl?>/ref_sub_item" class="btn btn-danger">Cancel</a>
    </fieldset>
</form>