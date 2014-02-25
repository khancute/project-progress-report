<?php
$selectedTab = !empty($this->params['named']['group'])?$this->params['named']['group']:'MOS';
?>
<ul class="nav nav-tabs">
    <? foreach ($po_details as $k => $v): ?>
        <li class="<?= $selectedTab == $v['group'] ? 'active' : '' ?>">
            <a href="<?= $baseUrl ?>/project_detail/id:<?= $this->params['named']['id'] ?>/group:<?= $v['group'] ?>"><?= $v['group'] ?></a>
        </li>
    <? endforeach; ?>
</ul>
<? foreach ($po_details as $k => $v): ?>
    <div style="<?= $selectedTab == $v['group'] ? '' : 'display:none' ?>">
        <? for ($i = 0; $i < count($v['attr']); $i++): ?>
            <? if ($v['type'][$i] == 'text'): ?>
                <label for="<?= $v['fields'][$i] ?>" style="float:left; width: 75px;"><?= $v['attr'][$i] ?></label>
                <input id="<?= $v['fields'][$i] ?>" 
                       name="data[<?= $v['fields'][$i] ?>]" 
                       placeholder="<?= $v['attr'][$i] ?>" 
                       value="<?= !empty($model['PowSow'][$v['fields'][$i]]) ? $model['PowSow'][$v['fields'][$i]] : '' ?>"
                       class="input-small" type="text" style="float:left; width: 200px;">
                <?php elseif($v['type'][$i] == 'status'):?>
                    <?php
                        $status = !empty($model['PowSow'][$v['fields'][$i]])?$model['PowSow'][$v['fields'][$i]]:'';
                    ?>
                    <label for="<?= $v['fields'][$i] ?>" style="float:left; width: 75px;"><?= $v['attr'][$i] ?></label>
                    <select id="<?= $v['fields'][$i] ?>" name="data[<?= $v['fields'][$i] ?>]" style="float:left; width: 200px;">
                        <option value="">Select status</option>
                        <option value="Not Yet" <?php $status=='Not Yet'?'selected="selected"':'';?> >Not Yet</option>
                        <option value="Done" <?php $status=='Done'?'selected="selected"':'';?> >Done</option>
                        <option value="Cancel" <?php $status=='Cancel'?'selected="selected"':'';?> >Cancel</option>
                    </select>
                <? else: ?>
                <label for="<?= $v['fields'][$i] ?>" style="float:left; width: 75px;"><?= $v['attr'][$i] ?></label>
                    <input id="<?= $v['fields'][$i] ?>" 
                           name="data[<?= $v['fields'][$i] ?>]" 
                           placeholder="dd-mm-yyyy" 
                           value="<?= !empty($model['PowSow'][$v['fields'][$i]]) ? date('d-m-Y', strtotime($model['PowSow'][$v['fields'][$i]])) : '' ?>"
                           class="input-small" type="text" type="text" style="float:left; width: 100px;">
                <? endif; ?>
            <? endfor; ?>
        </div>
    <? endforeach; ?>
