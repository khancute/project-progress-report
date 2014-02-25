<h3>Group Item List</h3>
<form class="bs-docs-example form-search" method='post'>
    <select name="data[search][ref_item]">
        <option value="">Search ref item</option>
        <? foreach ($items as $r): ?>
            <option value="<?= $r['RefItem']['id'] ?>"><?= $r['RefItem']['id'] ?> <?= $r['RefItem']['name'] ?></option>
        <? endforeach; ?>
    </select>
    <input type="text" placeholder="search group item" name='data[search][name]'>
    <button type="submit" class="btn btn-primary"><i class="icon-search icon-white"></i> Search</button>
    <a class="btn btn-primary" href="<?= $baseUrl ?>/ref_group_item_detail/id:new"><i class="icon-white icon-plus"></i> Insert New Group Item</a>
</form>
<? echo $this->element('paging', array('model' => 'RefGroup', 'modulus' => $this->params['paging']['RefGroup']['limit'])) ?>
<table class="table table-striped table-bordered table-hover">
    <tr>
        <th><?php echo $this->Paginator->sort('RefGroup.id', '#'); ?></th>
        <th><?php echo $this->Paginator->sort('RefItem.name', 'Item'); ?></th>
        <th><?php echo $this->Paginator->sort('RefGroup.order', 'Order'); ?></th>
        <th><?php echo $this->Paginator->sort('RefGroup.name', 'Name'); ?></th>
        <th><?php echo $this->Paginator->sort('RefGroup.scenario', 'Scenario'); ?></th>
        <th>Action</th>
    </tr>
    <?php foreach ($data as $row): ?>
        <tr>
            <td><?php echo $row['RefGroup']['id']; ?> </td>
            <td><?php echo $row['RefItem']['name']; ?> </td>
            <td><?php echo $row['RefGroup']['order'];?></td>
            <td><?php echo $row['RefGroup']['name']; ?> </td>
            <td><?php echo $row['RefGroup']['scenario']; ?> </td>
            <td>
                <a class="btn btn-primary btn-small" href="<?= $baseUrl ?>/ref_group_item_detail/id:<?= $row['RefGroup']['id'] ?>"><i class="icon-pencil icon-white"></i> Edit</a>
                <a class="btn btn-danger btn-small" href="<?= $baseUrl ?>/ref_group_item_delete/id:<?= $row['RefGroup']['id'] ?>"><i class="icon-trash icon-white"></i> Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?
echo $this->element('paging', array('model' => 'RefGroup', 'modulus' => $this->params['paging']['RefGroup']['limit']))?>