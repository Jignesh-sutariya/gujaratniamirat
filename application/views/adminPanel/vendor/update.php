<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-lg-12">
  <div class="card card-success card-outline">
    <div class="card-header">
      <h5 class="card-title m-0"><?= ucwords($operation).' '.ucwords($title) ?></h5>
    </div>
    <?= form_open($url.'/update/'.$id) ?>
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Vendor Name', 'name') ?>
            <?= form_input([
            'name' => "name",
            'class' => "form-control",
            'id' => "name",
            'placeholder' => "Enter Vendor Name",
            'value' => (!empty(set_value('name'))) ? set_value('name') : $data['name']
            ]) ?>
            <?= form_error('name') ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Mobile', 'mobile') ?>
            <?= form_input([
            'name' => "mobile",
            'class' => "form-control",
            'id' => "mobile",
            'maxlength' => 10,
            'placeholder' => "Enter Mobile",
            'value' => (!empty(set_value('mobile'))) ? set_value('mobile') : $data['mobile']
            ]) ?>
            <?= form_error('mobile') ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Assign Books', 'books_assigned') ?>
            <?= form_input([
            'type' => "number",
            'min' => 0,
            'name' => "books_assigned",
            'class' => "form-control",
            'id' => "books_assigned",
            'placeholder' => "Enter Assign Books",
            'value' => (!empty(set_value('books_assigned'))) ? set_value('books_assigned') : $data['books_assigned']
            ]) ?>
            <?= form_error('books_assigned') ?>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <?= form_label('Address', 'address') ?>
            <?= form_textarea([
            'name' => "address",
            'class' => "form-control",
            'id' => "address",
            'rows' => 4,
            'placeholder' => "Enter Address",
            'value' => (!empty(set_value('address'))) ? set_value('address') : $data['address']
            ]) ?>
            <?= form_error('address') ?>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer">
      <div class="row">
        <div class="col-md-6">
          <?= form_button([ 'content' => 'Save',
          'type'  => 'submit',
          'class' => 'btn btn-outline-primary col-md-4']) ?>
        </div>
        <div class="col-md-6">
          <?= anchor($url, 'Cancel', 'class="btn btn-outline-danger col-md-4"'); ?>
        </div>
      </div>
    </div>
    <?= form_close() ?>
  </div>
</div>