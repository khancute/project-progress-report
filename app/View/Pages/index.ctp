<h3>Project List</h3>
<form class="bs-docs-example form-search" method='post'>
    <select name="data[search][client_id]" class="input-medium">
        <option value="0">search client</option>
        <? foreach ($clients as $r): ?>
            <option value="<?= $r['RefClient']['id'] ?>"><?= $r['RefClient']['name'] ?></option>
        <? endforeach; ?>
    </select>
    <input type="text" placeholder="Search project code, SOW, detail SOW" name='data[search][keyword]' class="input-xlarge">
    <button type="submit" class="btn btn-primary"><i class="icon-search icon-white"></i> Search</button>
    <a class="btn btn-primary" href="<?= $baseUrl ?>/project_detail/id:new"><i class="icon-white icon-plus"></i> Insert PO</a>
</form>
<? echo $this->element('paging', array('model' => 'PowSow', 'modulus' => $this->params['paging']['PowSow']['limit'])) ?>
<table class="table table-bordered table-hover" style="font-size:80%; width: auto; max-width: 150%;">
    <tr>
        <th nowrap="nowrap"><?php echo $this->Paginator->sort('PowSow.id', '#'); ?></th>
        <th nowrap="nowrap"><?php echo $this->Paginator->sort('RefClient.name', 'Client'); ?></th>
        <th nowrap="nowrap">Project</th>
        <th nowrap="nowrap"><?php echo $this->Paginator->sort('PowSow.site_id_ne', 'Site ID NE'); ?></th>
        <th><?php echo $this->Paginator->sort('PowSow.site_name_ne', 'Site NE'); ?></th>
        <th nowrap="nowrap"><?php echo $this->Paginator->sort('PowSow.site_id_fe', 'Site ID FE'); ?></th>
        <th><?php echo $this->Paginator->sort('PowSow.site_name_fe', 'Site FE'); ?></th>
        <th><?php echo $this->Paginator->sort('PowSow.sow', 'SOW'); ?></th>
        <th><?php echo $this->Paginator->sort('PowSow.po_detail_sow', 'Detil SOW'); ?></th>
        <th>&nbsp;</th>
    </tr>
    <?php foreach ($data as $row): ?>
        <tr>
            <td><?php echo $row['PowSow']['id']; ?> </td>
            <td nowrap="nowrap"><?php echo $row['RefClient']['name']; ?> </td>
            <td nowrap="nowrap">
                <?php echo $row['PowSow']['project_code']; ?><br>
                <?php echo $row['PowSow']['po_number_released']; ?><br>
                <?php echo date('d/m/Y', strtotime($row['PowSow']['po_received_date'])); ?>
            </td>
            <td nowrap="nowrap"><?php echo $row['PowSow']['site_id_ne']; ?> </td>
            <td width="120px"><?php echo $row['PowSow']['site_name_ne']; ?> </td>
            <td nowrap="nowrap"><?php echo $row['PowSow']['site_id_fe']; ?> </td>
            <td width="120px"><?php echo $row['PowSow']['site_name_fe']; ?> </td>
            <td width="115px"><?php echo $row['PowSow']['sow']; ?> </td>
            <td width="315px"><?php echo $row['PowSow']['po_detail_sow']; ?> </td>
            <td nowrap="nowrap">
                <a class="btn btn-small btn-primary" href="<?= $baseUrl ?>/project_detail/id:<?= $row['PowSow']['id'] ?>/group:MOS"><i class="icon-pencil icon-white"></i> Edit</a>
                <a class="btn btn-small btn-danger" href="<?= $baseUrl ?>/project_delete/id:<?= $row['PowSow']['id'] ?>"><i class="icon-trash icon-white"></i> Delete</a>
            </td>
        </tr>
        <tr>
            <td colspan="12">
                <table style="font-size: 70%;" class="table table-bordered">
                    <thead>
                        <tr align="center">
                            <? foreach ($po_details as $k => $v): ?>
                                <th colspan="<?= count($v['attr']) ?>"><?= $v['group'] ?></th>
                            <? endforeach; ?>
                        </tr>
                        <tr align="center">
                            <? foreach ($po_details as $k => $v): ?>
                                <? foreach ($v['attr'] as $attr): ?>
                                    <th><?= $attr ?></th>
                                <? endforeach; ?>
                            <? endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <? foreach ($po_details as $k => $v): ?>
                                <? foreach ($v['fields'] as $field): ?>
                                    <? if (!empty($row['PowSow'][$field])): ?>
                                        <td><?= $row['PowSow'][$field] ?></td>
                                    <? else: ?>
                                        <td>&nbsp;</td>
                                    <? endif; ?>
                                <? endforeach; ?>
                            <? endforeach; ?>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?
echo $this->element('paging', array('model' => 'PowSow', 'modulus' => $this->params['paging']['PowSow']['limit']))?>