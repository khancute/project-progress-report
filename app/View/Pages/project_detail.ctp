<form class="form-horizontal" method="post">
    <fieldset>
        <legend>PO Detail - <?php echo $this->params['named']['id']=='new'?'Insert':'Update';?></legend>
        <div style="float:left; width:35%; margin:0px 5px;">
            <div class="control-group">
                <label class="control-label" for="selectbasic">Client</label>
                <div class="controls">
                    <select id="client_id" name="data[client_id]" class="input-medium">
                        <? foreach ($clients as $r): ?>
                            <option 
                                value="<?= $r['RefClient']['id'] ?>"
                                <?= $selected['client'] == $r['RefClient']['id'] ? 'selected="selected"' : '' ?>
                                >
                                <?= $r['RefClient']['name'] ?></option>
                        <? endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="project_code">Project Code</label>
                <div class="controls">
                    <input id="project_code" 
                           name="data[project_code]" 
                           placeholder="kode proyek" 
                           class="input-medium" required="" type="text"
                           value="<?= !empty($model['PowSow']['project_code']) ? $model['PowSow']['project_code'] : '' ?>"
                           >
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="po_number_released">PO Number</label>
                <div class="controls">
                    <input id="po_number_released" 
                           name="data[po_number_released]" 
                           placeholder="PO number" 
                           value="<?= !empty($model['PowSow']['po_number_released']) ? $model['PowSow']['po_number_released'] : '' ?>"
                           class="input-medium" type="text">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="po_received_date">PO Date</label>
                <div class="controls">
                    <input id="po_received_date" 
                           name="data[po_received_date]" 
                           placeholder="dd-mm-yyyy" 
                           value="<?= !empty($model['PowSow']['po_received_date']) ? date('d-m-Y', strtotime($model['PowSow']['po_received_date'])) : '' ?>"
                           class="input-small" type="text">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="po_description">PO Description</label>
                <div class="controls">                     
                    <textarea id="po_description" name="data[po_description]"><?= !empty($model['PowSow']['po_description']) ? $model['PowSow']['po_description'] : '' ?>
                    </textarea>
                </div>
            </div>
        </div>
        <div style="float:left; width:55%; margin:0px 5px;">
            <div class="control-group">
                <label class="control-label" for="site_id_ne">Site ID NE</label>
                <div class="controls">
                    <input id="site_id_ne" 
                           name="data[site_id_ne]" 
                           placeholder="site ID NE" 
                           value="<?= !empty($model['PowSow']['site_id_ne']) ? $model['PowSow']['site_id_ne'] : '' ?>"
                           class="input-medium" type="text">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="site_name_ne">Site Name NE</label>
                <div class="controls">
                    <input id="site_name_ne" 
                           name="data[site_name_ne]" 
                           value="<?= !empty($model['PowSow']['site_name_ne']) ? $model['PowSow']['site_name_ne'] : '' ?>"
                           placeholder="site name NE" class="input-xlarge" type="text">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="site_id_fe">Site ID FE</label>
                <div class="controls">
                    <input id="site_id_fe" 
                           name="data[site_id_fe]" 
                           placeholder="site ID FE" 
                           value="<?= !empty($model['PowSow']['site_id_fe']) ? $model['PowSow']['site_id_fe'] : '' ?>"
                           class="input-medium" type="text">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="site_name_fe">Site Name FE</label>
                <div class="controls">
                    <input id="site_name_fe" 
                           name="data[site_name_fe]" 
                           placeholder="site name FE" 
                           value="<?= !empty($model['PowSow']['site_name_fe']) ? $model['PowSow']['site_name_fe'] : '' ?>"
                           class="input-medium" type="text">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="sow">SOW</label>
                <div class="controls">
                    <select id="sow" name="data[sow]">
                        <?php foreach($sow as $v):?>
                        <option value="<?php echo $v['id']?>" <?php echo $selected['sow']==$v['id']?'selected="selected"':'';?>><?php echo $v['id']?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="group">Group</label>
                <div class="controls">
                    <select id="group" name="data[group]" >
                        <?php foreach($sow_group as $v):?>
                        <option value="<?php echo $v['id']?>" <?php echo $selected['sow_group']==$v['id']?'selected="selected"':'';?>><?php echo $v['value']?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="po_detail_sow">Detail POW</label>
                <div class="controls">
                    <select id="po_detail_sow" name="data[po_detail_sow]" class="input-xxlarge">
                        <?php foreach($sow_detail as $v):?>
                        <option value="<?php echo $v['id']?>" <?php echo $selected['sow_detail']==$v['id']?'selected="selected"':'';?>><?php echo $v['id']?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
        </div>
        <div style="float:left; width:100%; text-align: center; margin-bottom: 15px;">
            <? echo $this->element('po_detail_form');?>
        </div>
        <div style="float:left; width:100%; text-align: center;">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="<?= $baseUrl ?>/" class="btn btn-danger">Cancel</a>
        </div>
    </fieldset>
</form>
