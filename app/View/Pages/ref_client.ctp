<h3>Clients</h3>
<form class="bs-docs-example form-search" method='post'>
    <input type="text" placeholder="search clients" name='data[search][name]'>
    <button type="submit" class="btn btn-primary"><i class="icon-search icon-white"></i> Search</button>
    <a class="btn btn-primary" href="<?= $baseUrl ?>/ref_client_detail/id:new"><i class="icon-white icon-plus"></i> Insert New Client</a>
</form>
<? echo $this->element('paging', array('model' => 'RefClient', 'modulus' => $this->params['paging']['RefClient']['limit'])) ?>
<table class="table table-striped table-bordered table-hover">
    <tr>
        <th><?php echo $this->Paginator->sort('RefClient.id', '#'); ?></th>
        <th><?php echo $this->Paginator->sort('RefClient.name', 'Name'); ?></th>
        <th>Action</th>
    </tr>
    <?php foreach ($data as $row): ?>
        <tr>
            <td><?php echo $row['RefClient']['id']; ?> </td>
            <td><?php echo $row['RefClient']['name']; ?> </td>
            <td>
                <a class="btn btn-primary btn-small" href="<?= $baseUrl ?>/ref_client_detail/id:<?= $row['RefClient']['id'] ?>"><i class="icon-pencil icon-white"></i> Edit</a>
                <a class="btn btn-danger btn-small" href="<?= $baseUrl ?>/ref_client_delete/id:<?= $row['RefClient']['id'] ?>"><i class="icon-trash icon-white"></i> Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?
echo $this->element('paging', array('model' => 'RefClient', 'modulus' => $this->params['paging']['RefClient']['limit']))?>