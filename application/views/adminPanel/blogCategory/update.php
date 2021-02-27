<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-lg-12">
  <div class="card card-success card-outline">
    <div class="card-header">
      <h5 class="card-title m-0"><?= ucwords($operation).' '.ucwords($title) ?></h5>
    </div>
    <?= form_open_multipart($url.'/update/'.$id, '', ['cat_image' => $data['cat_image']]) ?>
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Category Name', 'cat_name') ?>
            <?= form_input([
            'name' => "cat_name",
            'class' => "form-control",
            'id' => "cat_name",
            'placeholder' => "Enter Category Name",
            'value' => (!empty(set_value('cat_name'))) ? set_value('cat_name') : $data['cat_name']
            ]) ?>
            <?= form_error('cat_name') ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Category URL', 'cat_slug') ?>
            <?= form_input([
            'name' => "cat_slug",
            'class' => "form-control",
            'id' => "cat_slug",
            'placeholder' => "Enter Category URL",
            'value' => (!empty(set_value('cat_slug'))) ? set_value('cat_slug') : $data['cat_slug']
            ]) ?>
            <?= form_error('cat_slug') ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Background', 'background') ?>
            <div class="input-group my-colorpicker2">
              <?= form_input([
              'name' => "background",
              'class' => "form-control",
              'id' => "background",
              'placeholder' => "Enter Background",
              'value' => (!empty(set_value('background'))) ? set_value('background') : $data['background']
              ]) ?>
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="fas fa-square" style="color: <?= $data['background'] ?>"></i>
                </span>
              </div>
            </div>
            <?= form_error('background') ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Category Color', 'cat_color') ?>
            <div class="input-group my-colorpicker2">
              <?= form_input([
              'name' => "cat_color",
              'class' => "form-control",
              'id' => "cat_color",
              'placeholder' => "Enter Category Color",
              'value' => (!empty(set_value('cat_color'))) ? set_value('cat_color') : $data['cat_color']
              ]) ?>
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="fas fa-square" style="color: <?= $data['cat_color'] ?>"></i>
                </span>
              </div>
            </div>
            <?= form_error('cat_color') ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Category Image') ?>
            <div class="input-group">
              <div class="custom-file">
                <?= form_input([
                'type' => "file",
                'name' => "cat_image",
                'class' => "custom-file-input",
                'id' => "cat_image",
                'accept' => '.png,.jpeg,.jpg,'
                ]) ?>
                <?= form_label('Select category image', 'cat_image', ['class' => 'custom-file-label']) ?>
              </div>
            </div>
            <?= $this->upload->display_errors('<strong class="text-danger" style="font-size: 0.8rem;">* ', '</strong>') ?>
          </div>
        </div>
        <div class="col-md-6">
          <?= img(['src' => 'assets/images/blog-category/'.$data['cat_image'], 'alt' => '', 'width' => '100', 'height'=> '100'], TRUE) ?>
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