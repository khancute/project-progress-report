<h3>Sub Item List</h3>
<form class="bs-docs-example form-search" method='post'>
    <select name="data[search][ref_item]">
        <option value="0">Search ref item</option>
        <? foreach ($items as $r): ?>
            <option value="<?= $r['RefItem']['id'] ?>"><?= $r['RefItem']['id'] ?> <?= $r['RefItem']['name'] ?></option>
        <? endforeach; ?>
    </select>
    <select name="data[search][ref_group]">
        <option value="0">Search group</option>
        <? foreach ($groups as $r): ?>
            <option value="<?= $r['RefGroup']['id'] ?>"><?= str_pad($r['RefGroup']['order'], 2, "0", STR_PAD_LEFT); ?> <?= $r['RefGroup']['name'] ?></option>
        <? endforeach; ?>
    </select>
    <input type="text" placeholder="search sub item" name='data[search][name]'>
    <button type="submit" class="btn btn-primary"><i class="icon-search icon-white"></i> Search</button>
    <a class="btn btn-primary" href="<?= $baseUrl ?>/ref_sub_item_detail/id:new"><i class="icon-white icon-plus"></i> Insert Sub Item</a>
</form>
<? echo $this->element('paging', array('model' => 'RefSubItem', 'modulus' => $this->params['paging']['RefSubItem']['limit'])) ?>
<table class="table table-striped table-bordered table-hover">
    <tr>
        <th><?php echo $this->Paginator->sort('RefSubItem.id', '#'); ?></th>
        <th><?php echo $this->Paginator->sort('RefItem.name', 'Item'); ?></th>
        <th><?php echo $this->Paginator->sort('RefGroup.order', 'Group'); ?></th>
        <th><?php echo $this->Paginator->sort('RefSubItem.name', 'Subitem'); ?></th>
        <th><?php echo $this->Paginator->sort('RefSubItem.unit', 'Unit'); ?></th>
        <th>Action</th>
    </tr>
    <?php foreach ($data as $row): ?>
        <tr>
            <td><?php echo $row['RefSubItem']['id']; ?> </td>
            <td><?php echo $row['RefItem']['name']; ?> </td>
            <td><?php echo $row['RefGroup']['order'] . '. ' . $row['RefGroup']['name']; ?> </td>
            <td><?php echo $row['RefSubItem']['name']; ?> </td>
            <td><?php echo $row['RefSubItem']['unit']; ?> </td>
            <td>
                <a class="btn btn-primary btn-small" href="<?= $baseUrl ?>/ref_sub_item_detail/id:<?= $row['RefSubItem']['id'] ?>"><i class="icon-pencil icon-white"></i> Edit</a>
                <a class="btn btn-danger btn-small" href="<?= $baseUrl ?>/ref_sub_item_delete/id:<?= $row['RefSubItem']['id'] ?>"><i class="icon-trash icon-white"></i> Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?
echo $this->element('paging', array('model' => 'RefSubItem', 'modulus' => $this->params['paging']['RefSubItem']['limit']))?>