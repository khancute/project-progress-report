<?php
App::uses('AppModel', 'Model');
class PowSow extends AppModel {
    var $name = 'PowSow';
    var $useTable = 'pow_sow';
    public $virtualFields = array(
        'years' => 'year(po_received_date)'
    );
}

?>
