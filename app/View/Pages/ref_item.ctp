<h3>Item List</h3>
<form class="bs-docs-example form-search" method='post'>
    <input type="text" placeholder="search items" name='data[search][name]'>
    <button type="submit" class="btn btn-primary"><i class="icon-search icon-white"></i> Search</button>
    <a class="btn btn-primary" href="<?= $baseUrl ?>/ref_item_detail/id:new"><i class="icon-white icon-plus"></i> Insert New Item</a>
</form>
<? echo $this->element('paging', array('model' => 'RefItem', 'modulus' => $this->params['paging']['RefItem']['limit'])) ?>
<table class="table table-striped table-bordered table-hover">
    <tr>
        <th><?php echo $this->Paginator->sort('RefItem.id', '#'); ?></th>
        <th><?php echo $this->Paginator->sort('RefItem.name', 'Item'); ?></th>
        <th>Action</th>
    </tr>
    <?php foreach ($data as $row): ?>
        <tr>
            <td><?php echo $row['RefItem']['id']; ?> </td>
            <td><?php echo $row['RefItem']['name']; ?> </td>
            <td>
                <a class="btn btn-primary btn-small" href="<?= $baseUrl ?>/ref_item_detail/id:<?= $row['RefItem']['id'] ?>"><i class="icon-pencil icon-white"></i> Edit</a>
                <a class="btn btn-danger btn-small" href="<?= $baseUrl ?>/ref_item_delete/id:<?= $row['RefItem']['id'] ?>"><i class="icon-trash icon-white"></i> Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?
echo $this->element('paging', array('model' => 'RefItem', 'modulus' => $this->params['paging']['RefItem']['limit']))?>