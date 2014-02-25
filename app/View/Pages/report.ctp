<h3>Project Report</h3>
<form class="bs-docs-example form-search" method='post' action="<?= $baseUrl ?>/generate_report">
    <select name="data[search][client_id]" class="input-medium">
        <? foreach ($clients as $r): ?>
            <option value="<?= $r['RefClient']['id'] ?>"><?= $r['RefClient']['name'] ?></option>
        <? endforeach; ?>
    </select>
    <select name="data[search][year]" class="input-medium">
        <? foreach ($projects as $r): ?>
            <option value="<?= $r['PowSow']['years'] ?>"><?= $r['PowSow']['years'] ?></option>
        <? endforeach; ?>
    </select>
    <button type="submit" class="btn btn-primary"><i class="icon-search icon-white"></i> Generate Report</button>
</form>