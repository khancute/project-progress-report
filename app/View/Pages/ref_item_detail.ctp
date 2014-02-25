<form class="form-horizontal" method='post'>
    <fieldset>
        <legend>Item Detail - <?php echo $this->params['named']['id']=='new'?'Insert':'Update';?></legend>
        <div class="control-group">
            <label class="control-label" for="id">Item Code</label>
            <div class="controls">
                <input class="input-small" type='text' name='data[id]' id='unit' placeholder='item code' value='<?=empty($model['RefItem']['id'])?'':$model['RefItem']['id']?>'>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="name">Name</label>
            <div class="controls">
                <input class="input-medium" type='text' name='data[name]' id='name' placeholder='item name' value='<?=empty($model['RefItem']['name'])?'':$model['RefItem']['name']?>'>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="<?=$baseUrl?>/ref_item" class="btn btn-danger">Cancel</a>
    </fieldset>
</form>