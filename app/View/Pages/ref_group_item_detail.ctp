<?php
$ref_item_id = !empty($model['RefGroup'])?$model['RefGroup']['item_id']:'';
?>
<form class="form-horizontal" method='post'>
    <fieldset>
        <legend>Group Item Detail - <?php echo $this->params['named']['id']=='new'?'Insert':'Update';?></legend>
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
            <label class="control-label" for="order">Order</label>
            <div class="controls">
                <input class="input-mini" type='text' name='data[order]' id='order' value='<?=empty($model['RefGroup']['order'])?'':$model['RefGroup']['order']?>'>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="name">Name</label>
            <div class="controls">
                <input class="input-medium" type='text' name='data[name]' id='name' value='<?=empty($model['RefGroup']['name'])?'':$model['RefGroup']['name']?>'>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="scenario">Scenario</label>
            <div class="controls">
                <textarea name='data[scenario]' id='scenario'><?=empty($model['RefGroup']['scenario'])?'':$model['RefGroup']['scenario']?></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="<?=$baseUrl?>/ref_group_item" class="btn btn-danger">Cancel</a>
    </fieldset>
</form>