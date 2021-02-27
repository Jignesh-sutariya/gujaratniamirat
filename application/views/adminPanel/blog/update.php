<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-lg-12">
  <div class="card card-success card-outline">
    <div class="card-header">
      <h5 class="card-title m-0"><?= ucwords($operation).' '.ucwords($title) ?></h5>
    </div>
    <?= form_open_multipart($url.'/update/'.$id, '', ['image' => $data['image'], 'audio' => $data['audio'], 'video' => $data['video'], 'blogger_image' => $data['blogger_image']]) ?>
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <?php $cat = []; foreach ($cats as $v):
            $cat[$v['id']] = ucwords($v['cat_name']);
            endforeach ?>
            <?= form_label('Blog Category', 'cat_id', ['class'=>'control-label']) ?>
            <?= form_dropdown('cat_id', $cat, (!empty(set_value('cat_id'))) ? set_value('cat_id') : $data['cat_id'],
            ['id' => 'cat_id',
            'class' => 'form-control select2',
            ]) ?>
            <?= form_error('cat_id') ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Blog Title', 'title') ?>
            <?= form_input([
            'name' => "title",
            'class' => "form-control",
            'id' => "title",
            'placeholder' => "Enter Blog Title",
            'value' => (!empty(set_value('title'))) ? set_value('title') : $data['title']
            ]) ?>
            <?= form_error('title') ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Blog Sub Title', 'sub_title') ?>
            <?= form_input([
            'name' => "sub_title",
            'class' => "form-control",
            'id' => "sub_title",
            'placeholder' => "Enter Blog Sub Title",
            'value' => (!empty(set_value('sub_title'))) ? set_value('sub_title') : $data['sub_title']
            ]) ?>
            <?= form_error('sub_title') ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Blog Written by', 'created_by') ?>
            <?= form_input([
            'name' => "created_by",
            'class' => "form-control",
            'id' => "created_by",
            'placeholder' => "Enter Blog Written by",
            'value' => (!empty(set_value('created_by'))) ? set_value('created_by') : $data['created_by']
            ]) ?>
            <?= form_error('created_by') ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Facebook Share URL', 'facebook_url') ?>
            <?= form_input([
            'name' => "facebook_url",
            'class' => "form-control",
            'id' => "facebook_url",
            'placeholder' => "Enter Facebook Share URL",
            'value' => (!empty(set_value('facebook_url'))) ? set_value('facebook_url') : $data['facebook_url']
            ]) ?>
            <?= form_error('facebook_url') ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('What\'s App Share URL', 'whatsapp_url') ?>
            <?= form_input([
            'name' => "whatsapp_url",
            'class' => "form-control",
            'id' => "whatsapp_url",
            'placeholder' => "Enter What's App Share URL",
            'value' => (!empty(set_value('whatsapp_url'))) ? set_value('whatsapp_url') : $data['whatsapp_url']
            ]) ?>
            <?= form_error('whatsapp_url') ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Instagram Share URL', 'insta_url') ?>
            <?= form_input([
            'name' => "insta_url",
            'class' => "form-control",
            'id' => "insta_url",
            'placeholder' => "Enter Instagram Share URL",
            'value' => (!empty(set_value('insta_url'))) ? set_value('insta_url') : $data['insta_url']
            ]) ?>
            <?= form_error('insta_url') ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Twitter Share URL', 'tweeter_url') ?>
            <?= form_input([
            'name' => "tweeter_url",
            'class' => "form-control",
            'id' => "tweeter_url",
            'placeholder' => "Enter Twitter Share URL",
            'value' => (!empty(set_value('tweeter_url'))) ? set_value('tweeter_url') : $data['tweeter_url']
            ]) ?>
            <?= form_error('tweeter_url') ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Blog Image', 'image') ?>
            <div class="input-group">
              <div class="custom-file">
                <?= form_input([
                'type' => "file",
                'name' => "image",
                'class' => "custom-file-input",
                'id' => "image",
                'accept' => '.png,.jpeg,.jpg,'
                ]) ?>
                <?= form_label('Select blog image', 'image', ['class' => 'custom-file-label']) ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Blog Audio', "audio") ?>
            <div class="input-group">
              <div class="custom-file">
                <?= form_input([
                'type' => "file",
                'name' => "audio",
                'class' => "custom-file-input",
                'id' => "audio",
                'accept' => 'audio/*'
                ]) ?>
                <?= form_label('Select blog audio', 'audio', ['class' => 'custom-file-label']) ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Blog Video', "video") ?>
            <div class="input-group">
              <div class="custom-file">
                <?= form_input([
                'type' => "file",
                'name' => "video",
                'class' => "custom-file-input",
                'id' => "video",
                'accept' => 'video/*'
                ]) ?>
                <?= form_label('Select blog video', 'video', ['class' => 'custom-file-label']) ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Blogger Image', 'blogger_image') ?>
            <div class="input-group">
              <div class="custom-file">
                <?= form_input([
                'type' => "file",
                'name' => "blogger_image",
                'class' => "custom-file-input",
                'id' => "blogger_image",
                'accept' => '.png,.jpeg,.jpg,'
                ]) ?>
                <?= form_label('Select blogger image', 'blogger_image', ['class' => 'custom-file-label']) ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Blog URL', 'blog_slug') ?>
            <?= form_input([
            'name' => "blog_slug",
            'class' => "form-control",
            'id' => "blog_slug",
            'placeholder' => "Enter Blog URL",
            'value' => (!empty(set_value('blog_slug'))) ? set_value('blog_slug') : $data['blog_slug']
            ]) ?>
            <?= form_error('blog_slug') ?>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <?= form_label('Blog Detail', 'details') ?>
            <?= form_textarea([
            'name' => "details",
            'class' => "form-control ckeditor",
            'id' => "details",
            'placeholder' => "Enter Blog Detail",
            'value' => (!empty(set_value('details'))) ? set_value('details') : $data['details']
            ]) ?>
            <?= form_error('details') ?>
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