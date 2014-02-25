<?php

/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

    /**
     * Controller name
     *
     * @var string
     */
    public $name = 'Pages';

    /**
     * This controller does not use a model
     *
     * @var array
     */
    public $uses = array(
        'RefSubItem',
        'RefItem',
        'RefGroup',
        'RefClient',
        'PowSow'
    );
    public $paginate = array(
        'limit' => 25,
    );
    var $baseUrl;
    public $helpers = array('PhpExcel'); 

    public function beforeFilter() {
        $this->baseUrl = Configure::read('baseUrl');
        parent::beforeFilter();
    }

    public function login() {
        $this->set('title', 'Login');
        if (!empty($this->request->data)) {
            if ($this->request->data['username'] == 'admin') {
                if ($this->request->data['password'] == 'masuk123') {
                    $this->Session->write('isUser', true);
                    $returnPath = $this->Session->read('returnPath');
                    $this->redirect($this->baseUrl . '/' . $returnPath);
                } else {
                    $this->Session->setFlash('Wrong password');
                }
            } else {
                $this->Session->setFlash('Invalid username');
            }
        }
    }

    public function index() {
        $this->set('title', 'PO List');
        $this->paginate['PowSow']['joins'] =
                array(
                    array(
                        'table' => 'ref_client',
                        'alias' => 'RefClient',
                        'type' => 'inner',
                        'conditions' =>
                        array(
                            'PowSow.client_id=RefClient.id'
                        )
                    ),
        );
        $scope = array();
        $filters = array();
        if (!empty($this->request->data['search'])) {
            
            if ($this->request->data['search']['client_id'] != 0) {
                $filters['RefClient.id'] = $this->request->data['search']['client_id'];
            }
            if (!empty($this->request->data['search']['keyword'])) {
                $filters['OR']['PowSow.project_code LIKE'] = '%' . $this->request->data['search']['keyword'] . '%';
                $filters['OR']['PowSow.sow LIKE'] = '%' . $this->request->data['search']['keyword'] . '%';
                $filters['OR']['PowSow.po_detail_sow LIKE'] = '%' . $this->request->data['search']['keyword'] . '%';
            }
            $this->Session->write('filters', $filters);
        }
        $scope = $filters;
        $scope['PowSow.deleted'] = 1;
        $this->paginate['PowSow']['fields'] = array(
            'PowSow.*',
            'RefClient.name',
        );
        $po_details = array(
            array(
                'group' => 'MOS',
                'attr' => array('status', 'date', 'team'),
                'fields' => array('mos_status', 'mos_date', 'mos_team')
            ),
            array(
                'group' => 'Install',
                'attr' => array('status', 'date', 'team'),
                'fields' => array('install_status', 'install_date', 'install_team')
            ),
            array(
                'group' => 'OA RFS',
                'attr' => array('status', 'date', 'team'),
                'fields' => array('oa_rfs_status', 'oa_rfs_date', 'oa_rfs_team')
            ),
            array(
                'group' => 'Cross Connect',
                'attr' => array('status', 'engineer'),
                'fields' => array('crossconnect_status', 'cross_connect_enginerr')
            ),
            array(
                'group' => 'Survey',
                'attr' => array('status', 'date', 'team'),
                'fields' => array('survey_status', 'survey_date', 'survey_team')
            ),
            array(
                'group' => 'ESAR 1',
                'attr' => array('status', 'date', 'sent'),
                'fields' => array('esar_1_submit_date', 'esar_1_status', 'esar_1_sent_to_hq')
            ),
            array(
                'group' => 'ESAR 2',
                'attr' => array('status', 'date', 'sent'),
                'fields' => array('esar_2_submit_date', 'esar_2_status', 'esar_2_sent_to_hq')
            ),
        );
        
        $clients = $this->RefClient->find('all', array('conditions' => array('deleted' => 1)));
        $this->paginate['PowSow']['limit'] = 15;
        $data = $this->paginate('PowSow', $scope);
        $this->set(compact('data', 'clients', 'po_details'));
    }

    public function project_detail() {
        $this->set('title', 'PO Detail');
        $model = $this->PowSow->find('first', array('conditions' => array('id' => $this->params['named']['id'])));
        $clients = $this->RefClient->find('all', array('conditions' => array('deleted' => 1)));
        $po_details = array(
            array(
                'group' => 'MOS',
                'attr' => array('status', 'date', 'team'),
                'type' => array('status', 'date', 'text'),
                'fields' => array('mos_status', 'mos_date', 'mos_team')
            ),
            array(
                'group' => 'Install',
                'attr' => array('status', 'date', 'team'),
                'type' => array('status', 'date', 'text'),
                'fields' => array('install_status', 'install_date', 'install_team')
            ),
            array(
                'group' => 'OA RFS',
                'attr' => array('status', 'date', 'team'),
                'type' => array('status', 'date', 'text'),
                'fields' => array('oa_rfs_status', 'oa_rfs_date', 'oa_rfs_team')
            ),
            array(
                'group' => 'Cross Connect',
                'attr' => array('status', 'engineer'),
                'type' => array('status', 'text'),
                'fields' => array('crossconnect_status', 'cross_connect_enginerr')
            ),
            array(
                'group' => 'Swap',
                'attr' => array('status', 'date', 'team'),
                'type' => array('status', 'date', 'text'),
                'fields' => array('swap_status', 'swap_date', 'swap_team')
            ),
            array(
                'group' => 'Other',
                'attr' => array('BBU Quantity', 'Antenna Hybrid Installation'),
                'type' => array('text', 'text'),
                'fields' => array('bbu_quantity', 'antenna_hybrid_installation')
            ),
            array(
                'group' => 'Dismantle',
                'attr' => array('status', 'date', 'team'),
                'type' => array('status', 'date', 'text'),
                'fields' => array('dismantle_status', 'dismantle_date', 'dismantle_team')
            ),
            array(
                'group' => 'Return Back',
                'attr' => array('status', 'date', 'team'),
                'type' => array('status', 'date', 'text'),
                'fields' => array('return_back_status', 'return_back_date', 'return_back_team')
            ),
            array(
                'group' => 'Survey',
                'attr' => array('status', 'date', 'team'),
                'type' => array('status', 'date', 'text'),
                'fields' => array('survey_status', 'survey_date', 'survey_team')
            ),
            array(
                'group' => 'LMD',
                'attr' => array('status', 'date', 'team'),
                'type' => array('status', 'date', 'text'),
                'fields' => array('lmd_status', 'lmd_date', 'lmd_team')
            ),
            array(
                'group' => 'ESAR 1',
                'attr' => array('date', 'status', 'sent'),
                'type' => array('date', 'status', 'date'),
                'fields' => array('esar_1_submit_date', 'esar_1_status', 'esar_1_sent_to_hq')
            ),
            array(
                'group' => 'ESAR 2',
                'attr' => array('date', 'status', 'sent'),
                'type' => array('date', 'status', 'date'),
                'fields' => array('esar_2_submit_date', 'esar_2_status', 'esar_2_sent_to_hq')
            ),
            array(
                'group' => 'Data',
                'attr' => array('status', 'date', 'team'),
                'type' => array('status', 'date', 'text'),
                'fields' => array('data_completeness', 'data_received_date', 'data_submitted_team')
            ),
            array(
                'group' => 'SIR',
                'attr' => array('status', 'date', 'team'),
                'type' => array('status', 'date', 'text'),
                'fields' => array('sir_submit_status', 'sir_submit_date', 'sir_submit_team')
            ),
            array(
                'group' => 'TSSR',
                'attr' => array('status', 'date', 'team'),
                'type' => array('status', 'date', 'text'),
                'fields' => array('tssr_submit_status', 'tssr_submit_date', 'tssr_submit_team')
            ),
            array(
                'group' => 'ATP Doc',
                'attr' => array('status', 'team'),
                'type' => array('status', 'text'),
                'fields' => array('atp_doc_submit_status', 'atp_doc_submit_team')
            ),
            array(
                'group' => 'BAST',
                'attr' => array('status', 'date'),
                'type' => array('status', 'date'),
                'fields' => array('bast_status', 'bast_date')
            ),
        );

        $sow_data = $this->RefItem->find('all', array(
            'conditions' => array(
                'RefItem.deleted' => 1
            ),
            'fields' => array('RefItem.*'),
            'order' => array('RefItem.id')
                )
        );
        $sow = array();
        for ($i = 0; $i < count($sow_data); $i++) {
            $sow[] = array(
                'id' => $sow_data[$i]['RefItem']['id'] . ' ' . $sow_data[$i]['RefItem']['name'],
                'value' => $sow_data[$i]['RefItem']['id'] . ' ' . $sow_data[$i]['RefItem']['name']
            );
        }

        
        $selected['sow'] = !empty($model['PowSow']['sow']) ? $model['PowSow']['sow'] : $sow[0]['id'];
        $selected['sow_group'] = !empty($model['PowSow']['sow'])?$model['PowSow']['sow']:1;
        $selected['sow_detail'] = !empty($model['PowSow']['po_detail_sow']) ? $model['PowSow']['po_detail_sow'] : '';
        $selected['client'] = !empty($model['PowSow']['client_id']) ? $model['PowSow']['client_id'] : '';
        $sow_group = $this->get_group_data($selected['sow']);
        $sow_detail = $this->get_detail_sow_data($selected['sow'], $selected['sow_group']);
        if ($this->request->data) {
            $data = array(
                'id' => empty($this->params['named']['id']) || $this->params['named']['id'] == 'new' ? NULL : $this->params['named']['id'],
                'client_id' => $this->request->data['client_id'],
                'project_code' => $this->request->data['project_code'],
                'site_id_ne' => $this->request->data['site_id_ne'],
                'site_name_ne' => $this->request->data['site_name_ne'],
                'site_id_fe' => $this->request->data['site_id_fe'],
                'site_name_fe' => $this->request->data['site_name_fe'],
                'sow' => $this->request->data['sow'],
                'po_detail_sow' => $this->request->data['po_detail_sow'],
                'po_number_released' => $this->request->data['po_number_released'],
                'po_received_date' => date('Y-m-d', strtotime($this->request->data['po_received_date'])),
                'po_description' => $this->request->data['po_description'],
            );
            foreach ($po_details as $attr) {
                for ($i = 0; $i < count($attr['fields']); $i++) {
                    $colName = $attr['fields'][$i];
                    if (!empty($this->request->data[$colName])) {
                        if ($attr['type'][$i] == 'date') {
                            $data[$colName] = date('Y-m-d', strtotime($this->request->data[$colName]));
                        } else {
                            $data[$colName] = $this->request->data[$colName];
                        }
                    }
                }
            }
            $this->PowSow->set($data);
            
            if ($this->PowSow->save()) {
                $selectedgroup = empty($this->params['named']['group'])?'MOS':$this->params['named']['group'];
                $this->redirect($this->baseUrl . '/project_detail/id:' . $this->PowSow->id . '/group:' . $selectedgroup);
            } else {
                $this->Session->setFlash('Error occured');
            }
        }
        
        $this->set(compact('model', 'clients', 'po_details', 'sow', 'sow_group', 'selected', 'sow_detail'));
    }

    public function ref_item() {
        $this->set('title', 'Item List');
        $scope = array();
        if (!empty($this->request->data['search'])) {
            $filters = array();
            if (!empty($this->request->data['search']['name'])) {
                $filters['RefItem.name like '] = "%" . $this->request->data['search']['name'] . "%";
            }
        }
        $filters['RefItem.deleted'] = 1;
        //$this->Session->write('filters', $filters);
        $scope = $filters;
        $this->paginate['RefItem']['fields'] = array(
            'RefItem.id',
            'RefItem.name',
        );
        $this->paginate['RefItem']['limit'] = 15;
        $data = $this->paginate('RefItem', $scope);
        $this->set(compact('data'));
    }

    public function ref_item_detail() {
        $this->set('title', 'Item Detail');
        $model = $this->RefItem->find('first', array('conditions' => array('id' => $this->params['named']['id'], 'deleted' => 1)));
        
        if ($this->request->data) {
            if(empty($this->request->data['id'])){
                $this->Session->setFlash('Item code cannot be empty');
            }else if(empty($this->request->data['name'])){
                $this->Session->setFlash('Item name cannot be empty');
            }else{
                $data = array(
                    'id' => $this->request->data['id'],
                    'name' => $this->request->data['name'],
                    'deleted' => 1,
                );
                $this->RefItem->set($data);
                if ($this->RefItem->save()) {
                    $this->redirect($this->baseUrl . '/ref_item_detail/id:' . $this->RefItem->id);
                } else {
                    $this->Session->setFlash('Error occured while saving data');
                }
            }
        }
        $this->set(compact('model'));
    }
    
    public function ref_item_delete(){
        if(!empty($this->params['named']['id'])){
            $data = array(
                'id' => $this->params['named']['id'],
                'deleted' => 0,
            );
            $this->RefItem->set($data);
            $this->RefItem->save();
        }
        $this->redirect($this->baseUrl . '/ref_item');
    }
    
    public function ref_group_item() {
        $this->set('title', 'Daftar Group Item Referensi');
        $this->paginate['RefGroup']['joins'] =
                array(
                    array(
                        'table' => 'ref_item',
                        'alias' => 'RefItem',
                        'type' => 'inner',
                        'conditions' =>
                        array(
                            'RefGroup.item_id=RefItem.id',
                            'RefItem.deleted=1'
                        )
                    ),
        );
        $scope = array();
        $filters = array();
        if (!empty($this->request->data['search'])) {
            if (!empty($this->request->data['search']['ref_item'])) {
                $filters['RefGroup.item_id'] = $this->request->data['search']['ref_item'];
            }
            if (!empty($this->request->data['search']['name'])) {
                $filters['RefGroup.name like '] = "%" . $this->request->data['search']['name'] . "%";
            }
        }
        $filters['RefGroup.deleted'] = 1;
        $scope = $filters;
        $this->paginate['RefGroup']['fields'] = array(
            'RefGroup.id',
            'RefItem.name',
            'RefGroup.order',
            'RefGroup.name',
            'RefGroup.scenario',
        );
        $items = $this->RefItem->find('all', array('conditions' => array('deleted' => 1)));
        $this->paginate['RefGroup']['limit'] = 15;
        $data = $this->paginate('RefGroup', $scope);
        $this->set(compact('data', 'items'));
    }

    public function ref_group_item_detail() {
        $this->set('title', 'Detail Group Item');
        $model = $this->RefGroup->find('first', array('conditions' => array('id' => $this->params['named']['id'], 'deleted' => 1)));
        $items = $this->RefItem->find('all', array('conditions' => array('deleted' => 1)));
        if ($this->request->data) {
            $data = array(
                'id' => empty($this->params['named']['id']) || $this->params['named']['id'] == 'new' ? NULL : $this->params['named']['id'],
                'item_id' => $this->request->data['ref_item_id'],
                'order' => $this->request->data['order'],
                'name' => $this->request->data['name'],
                'deleted' => 1,
                'scenario' => $this->request->data['scenario']
            );
            $this->RefGroup->set($data);
            if ($this->RefGroup->save()) {
                $this->redirect($this->baseUrl . '/ref_group_item_detail/id:' . $this->RefGroup->id);
            } else {
                $this->Session->setFlash('Error occured while saving data');
            }
        }
        $this->set(compact('model', 'items'));
    }
    
    public function ref_group_item_delete(){
        if(!empty($this->params['named']['id'])){
            $data = array(
                'id' => $this->params['named']['id'],
                'deleted' => 0,
            );
            $this->RefGroup->set($data);
            $this->RefGroup->save();
        }
        $this->redirect($this->baseUrl . '/ref_group_item');
    }

    public function ref_sub_item() {
        $this->set('title', 'Sub Item Ref. List');
        $this->paginate['RefSubItem']['joins'] =
                array(
                    array(
                        'table' => 'ref_item',
                        'alias' => 'RefItem',
                        'type' => 'inner',
                        'conditions' =>
                        array(
                            'RefSubItem.ref_item_id=RefItem.id'
                        )
                    ),
                    array(
                        'table' => 'ref_group',
                        'alias' => 'RefGroup',
                        'type' => 'inner',
                        'conditions' =>
                        array(
                            'RefSubItem.group=RefGroup.id'
                        )
                    )
        );
        $scope = array();
        $filters = array();
        if (!empty($this->request->data['search'])) {
            $filters = array();
            if ($this->request->data['search']['ref_item'] != 0) {
                $filters['RefSubItem.ref_item_id'] = $this->request->data['search']['ref_item'];
            }
            if ($this->request->data['search']['ref_group'] != 0) {
                $filters['RefSubItem.group'] = $this->request->data['search']['ref_group'];
            }
            if (!empty($this->request->data['search']['name'])) {
                $filters['RefSubItem.name like '] = "%" . $this->request->data['search']['name'] . "%";
            }
            $this->Session->write('filters', $filters);
        }
        $scope = $filters;
        $this->paginate['RefSubItem']['fields'] = array(
            'RefSubItem.id',
            'RefItem.name',
            'RefGroup.order',
            'RefGroup.name',
            'RefSubItem.name',
            'RefSubItem.unit',
            'RefSubItem.scenario',
        );
        $items = $this->RefItem->find('all', array('conditions' => array('deleted' => 1)));
        $groups = $this->RefGroup->find('all', array('conditions' => array('deleted' => 1)));
        $this->paginate['RefSubItem']['limit'] = 15;
        $data = $this->paginate('RefSubItem', $scope);
        $this->set(compact('data', 'items', 'groups'));
    }

    public function ref_sub_item_detail() {
        $this->set('title', 'Sub Item Ref. Detail');
        $model = $this->RefSubItem->find('first', array('conditions' => array('id' => $this->params['named']['id'])));
        $items = $this->RefItem->find('all', array('conditions' => array('deleted' => 1)));
        //die(pr($items));
        $ref_scope = array();
        if (!empty($model['RefSubItem']['ref_item_id'])) {
            $ref_scope = array('conditions' => array('deleted' => 1, 'item_id' => $model['RefSubItem']['ref_item_id']));
        }
        $groups = $this->RefGroup->find('all', $ref_scope);
        if ($this->request->data) {
            $data = array(
                'id' => empty($this->params['named']['id']) || $this->params['named']['id'] == 'new' ? NULL : $this->params['named']['id'],
                'ref_item_id' => $this->request->data['ref_item_id'],
                'group' => $this->request->data['group'],
                'name' => $this->request->data['name'],
                'unit' => $this->request->data['unit'],
                'scenario' => $this->request->data['scenario']
            );
            $this->RefSubItem->set($data);
            if ($this->RefSubItem->save()) {
                $this->redirect($this->baseUrl . '/ref_sub_item_detail/id:' . $this->RefSubItem->id);
            } else {
                $this->Session->setFlash('Error occured while saving data');
            }
        }
        $this->set(compact('model', 'items', 'groups'));
    }

    public function ref_sub_item_delete() {
        if (!empty($this->params['named']['id'])) {
            $data = array(
                'id' => $this->params['named']['id'],
                'deleted' => 0
            );
            $this->RefSubItem->set($data);
            $this->RefSubItem->save();
        }
        $this->redirect($this->baseUrl . '/ref_sub_item');
    }

    public function ref_client() {
        $this->set('title', 'Clients');
        $scope = array();
        $filters = array();
        if (!empty($this->request->data['search'])) {
            if (!empty($this->request->data['search']['name'])) {
                $filters['RefClient.name like '] = "%" . $this->request->data['search']['name'] . "%";
            }
        }
        $filters['RefClient.deleted'] = 1;
        $scope = $filters;
        $this->paginate['RefClient']['fields'] = array(
            'RefClient.id',
            'RefClient.name',
        );
        $this->paginate['RefClient']['limit'] = 15;
        $data = $this->paginate('RefClient', $scope);
        $this->set(compact('data'));
    }

    public function ref_client_detail() {
        $this->set('title', 'Client Detail');
        $model = $this->RefClient->find('first', array('conditions' => array('id' => $this->params['named']['id'], 'deleted' => 1)));
        
        if ($this->request->data) {
            if(empty($this->request->data['name'])){
                $this->Session->setFlash('Item name cannot be empty');
            }else{
                $data = array(
                    'id' => empty($this->params['named']['id']) || $this->params['named']['id'] == 'new' ? NULL : $this->params['named']['id'],
                    'name' => $this->request->data['name'],
                    'deleted' => 1,
                );
                $this->RefClient->set($data);
                if ($this->RefClient->save()) {
                    $this->redirect($this->baseUrl . '/ref_client_detail/id:' . $this->RefClient->id);
                } else {
                    $this->Session->setFlash('Error occured while saving data');
                }
            }
        }
        $this->set(compact('model'));
    }
    
    public function ref_client_delete(){
        if(!empty($this->params['named']['id'])){
            $data = array(
                'id' => $this->params['named']['id'],
                'deleted' => 0,
            );
            $this->RefClient->set($data);
            $this->RefClient->save();
        }
        $this->redirect($this->baseUrl . '/ref_client');
    }

    public function logout() {
        $this->Session->destroy();
        $this->redirect($this->baseUrl . '/login');
    }
    
    public function report(){
        $this->set('title', 'Project Report');
        $clients = $this->RefClient->find('all', array('conditions' => array('deleted' => 1)));
        $projects = $this->PowSow->find('all', array('group'=>'years', 'fields'=>array('years')));
        $this->set(compact('clients', 'projects'));
    }
    
    public function generate_report(){
        $scope = array();
        $scope['joins'] =
                array(
                    array(
                        'table' => 'ref_client',
                        'alias' => 'RefClient',
                        'type' => 'inner',
                        'conditions' =>
                        array(
                            'PowSow.client_id=RefClient.id'
                        )
                    ),
        );
        $scope['conditions'] = array(
            'PowSow.client_id'=>$this->request->data['search']['client_id'],
            'year(PowSow.po_received_date)'=>$this->request->data['search']['year'],
        );
        $data = $this->PowSow->find('all', $scope);
        
        $this->set(compact('data'));
    }

    public function sow_changed() {
        $this->layout = 'ajax';
        if (empty($this->params['named']['sow'])) {
            return false;
        }
        $sow_group = $this->get_group_data($this->params['named']['sow']);
        $group = !empty($sow_group[0])?$sow_group[0]['id']:0;
        $sow_detail = $this->get_detail_sow_data($this->params['named']['sow'], $group);
        $data = array(
            'group'=>$sow_group,
            'detail'=>$sow_detail
        );
        die(json_encode($data));
    }
    
    public function group_changed(){
        $this->layout = 'ajax';
        if (empty($this->params['named']['sow'])) {
            return false;
        }
        if (empty($this->params['named']['group'])) {
            return false;
        }
        $sow_detail = $this->get_detail_sow_data($this->params['named']['sow'], $this->params['named']['group']);
        die(json_encode($sow_detail));
    }

    public function changed_item() {
        $this->layout = 'ajax';
        if (empty($this->params['named']['item_id'])) {
            return false;
        }
        $groups = $this->RefGroup->find('all', array('conditions' => array('deleted' => 1, 'item_id' => $this->params['named']['item_id'])));
        if (empty($groups)) {
            return false;
        }
        $options = '<option value="0">Select Group</option>';
        foreach ($groups as $v) {
            $options.='<option value="' . $v['RefGroup']['id'] . '">' . str_pad($v['RefGroup']['order'], 2, "0", STR_PAD_LEFT) . ' ' . $v['RefGroup']['name'] . '</option>';
        }
        $this->set('options', $options);
    }

    public function get_sow() {
        $data = $this->RefGroup->find('all', array(
            'joins' => array(
                array(
                    'table' => 'ref_item',
                    'alias' => 'RefItem',
                    'type' => 'INNER',
                    'conditions' => array(
                        'RefGroup.item_id = RefItem.id'
                    )
                )
            ),
            'conditions' => array(
                'OR' => array(
                    'RefItem.name LIKE' => "%" . $this->params['named']['query'] . "%",
                    'RefGroup.name LIKE' => "%" . $this->params['named']['query'] . "%",
                ),
                'RefItem.deleted' => 1,
                'RefGroup.deleted' => 1,
            ),
            'fields' => array('RefItem.name', 'RefGroup.*'),
            'order' => 'RefItem.name, RefGroup.name'
                )
        );
        $return = array();
        for ($i = 0; $i < count($data); $i++) {
            $return[] = array(
                'id' => $data[$i]['RefGroup']['item_id'] . '|' . $data[$i]['RefGroup']['id'],
                'value' => $data[$i]['RefItem']['name'] . ' ' . $data[$i]['RefGroup']['name']
            );
        }
        die(json_encode($return));
    }

    public function get_detail_sow() {
        $return = array();
        if (!empty($this->params['named']['parent'])) {
            list($item, $group) = explode('|', $this->params['named']['parent']);
        }
        $conditions = array(
            'RefSubItem.deleted' => 1,
            'RefSubItem.name LIKE' => "%" . $this->params['named']['query'] . "%",
        );
        if (!empty($item)) {
            $conditions['RefSubItem.ref_item_id'] = $item;
        }
        if (!empty($group)) {
            $conditions['RefSubItem.group'] = $group;
        }
        $data = $this->RefSubItem->find('all', array(
            'conditions' => $conditions
                )
        );
        for ($i = 0; $i < count($data); $i++) {
            $return[] = $data[$i]['RefSubItem']['name'];
        }
        die(json_encode($return));
    }

    public function get_po_info() {
        $this->layout = 'ajax';
        $model = $this->PowSow->find('first', array('conditions' => array('id' => $this->params['named']['id'])));
        $this->set(compact('model'));
    }

    protected function get_group_data($sow = "") {
        $sow_group_data = $this->RefGroup->find('all', array(
                'conditions' => array(
                    'RefGroup.deleted' => 1,
                    'CONCAT(RefItem.id," ", RefItem.name)' => $sow
                ),
                'joins' => array(
                    array(
                        'table' => 'ref_item',
                        'alias' => 'RefItem',
                        'type' => 'INNER',
                        'conditions' => array(
                            'RefGroup.item_id = RefItem.id'
                        )
                    )
                ),
                'fields' => array('RefGroup.name', 'RefGroup.id'),
                'order' => array('RefGroup.order')
            )
        );
        $sow_group = array();
        for ($i = 0; $i < count($sow_group_data); $i++) {
            $sow_group[] = array(
                'id' => $sow_group_data[$i]['RefGroup']['id'],
                'value' => $sow_group_data[$i]['RefGroup']['name']
            );
        }
        return !empty($sow_group)?$sow_group:'';
    }
    
    protected function get_detail_sow_data($sow = "", $group = 0){
        $conditions = array(
            'RefSubItem.deleted' => 1,
            'CONCAT(RefItem.id," ", RefItem.name)' => $sow
        );
        if(!empty($group) && $group>0){
            $conditions['RefSubItem.group'] = $group;
        }
        $sow_detail_data = $this->RefSubItem->find('all',
                    array(
                        'conditions' => $conditions,
                        'joins' => array(
                            array(
                                'table' => 'ref_item',
                                'alias' => 'RefItem',
                                'type' => 'INNER',
                                'conditions' => array(
                                    'RefSubItem.ref_item_id = RefItem.id'
                                )
                            )
                        ),
                        'fields' => array('RefSubItem.name', 'RefSubItem.id'),
                        'order' => array('RefSubItem.name')
                    )
                );
        $sow_detail = array();
        for ($i = 0; $i < count($sow_detail_data); $i++) {
            $sow_detail[] = array(
                'id' => $sow_detail_data[$i]['RefSubItem']['name'],
                'value' => $sow_detail_data[$i]['RefSubItem']['name']
            );
        }
        return !empty($sow_detail)?$sow_detail:'';
    }

}
