<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-lg-12">
  <div class="card card-success card-outline">
    <div class="card-header">
      <h5 class="card-title m-0"><?= ucwords($operation).' '.ucwords($title) ?></h5>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Blog Category') ?>
            <?= form_input([
            'class' => "form-control",
            'readonly' => "readonly",
            'value' => $data['cat_id']
            ]) ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Blog Title') ?>
            <?= form_input([
            'class' => "form-control",
            'readonly' => "readonly",
            'value' => $data['title']
            ]) ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Blog Sub Title') ?>
            <?= form_input([
            'class' => "form-control",
            'readonly' => "readonly",
            'value' => $data['sub_title']
            ]) ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Blog Written by') ?>
            <?= form_input([
            'class' => "form-control",
            'readonly' => "readonly",
            'value' => $data['created_by']
            ]) ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Facebook Share URL') ?>
            <?= form_input([
            'class' => "form-control",
            'readonly' => "readonly",
            'value' => $data['facebook_url']
            ]) ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('What\'s App Share URL') ?>
            <?= form_input([
            'class' => "form-control",
            'readonly' => "readonly",
            'value' => $data['whatsapp_url']
            ]) ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Instagram Share URL') ?>
            <?= form_input([
            'class' => "form-control",
            'readonly' => "readonly",
            'value' => $data['insta_url']
            ]) ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Twitter Share URL') ?>
            <?= form_input([
            'class' => "form-control",
            'readonly' => "readonly",
            'value' => $data['tweeter_url']
            ]) ?>
          </div>
        </div>
        <?php if ($data['image'] != 'No Image'): ?>
        <div class="col-md-6">
          <div class="form-group">
            <?= img(['src' => 'assets/blog/'.$data['image'], 'alt' => '', 'height' => '100', 'width' => '150']) ?>
          </div>
        </div>
        <?php endif ?>
        <?php if ($data['audio'] != 'No Audio'): ?>
        <div class="col-md-6">
          <div class="form-group">
            <audio src="<?= assets('blog/'.$data['audio']) ?>" controls></audio>
          </div>
        </div>
        <?php endif ?>
        <?php if ($data['video'] != 'No Video'): ?>
        <div class="col-md-6">
          <div class="form-group">
            <video src="<?= assets('blog/'.$data['video']) ?>" controls height='150'></video>
          </div>
        </div>
        <?php endif ?>
        <div class="col-md-6">
          <div class="form-group">
            <?= img(['src' => 'assets/blog/'.$data['blogger_image'], 'alt' => '', 'height' => '100', 'width' => '150']) ?>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <?= form_label('Blog Detail') ?>
            <?= form_textarea([
            'class' => "form-control",
            'readonly' => "readonly",
            'value' => strip_tags($data['details'])
            ]) ?>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer">
      <div class="row">
        <div class="col-md-6">
          <?= anchor($url, 'Go Back', 'class="btn btn-outline-danger col-md-4"'); ?>
        </div>
      </div>
    </div>
  </div>
</div>