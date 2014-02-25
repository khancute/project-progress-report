<form class="form-horizontal" method='post'>
    <fieldset>
        <legend>Client Detail - <?php echo $this->params['named']['id']=='new'?'Insert':'Update';?></legend>
        <div class="control-group">
            <label class="control-label" for="name">Name</label>
            <div class="controls">
                <input class="input-medium" type='text' name='data[name]' id='name' placeholder='item name' value='<?=empty($model['RefClient']['name'])?'':$model['RefClient']['name']?>'>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="<?=$baseUrl?>/ref_client" class="btn btn-danger">Cancel</a>
    </fieldset>
</form>