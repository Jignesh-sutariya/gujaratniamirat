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
            <?= form_label('Interview Title', 'title') ?>
            <?= form_input([
            'name' => "title",
            'class' => "form-control",
            'id' => "title",
            'placeholder' => "Enter Interview Title",
            'value' => (!empty(set_value('title'))) ? set_value('title') : $data['title']
            ]) ?>
            <?= form_error('title') ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('YouTube URL', 'youtube_url') ?>
            <?= form_input([
            'name' => "youtube_url",
            'class' => "form-control",
            'id' => "youtube_url",
            'placeholder' => "Enter YouTube URL",
            'value' => (!empty(set_value('youtube_url'))) ? set_value('youtube_url') : $data['youtube_url']
            ]) ?>
            <?= form_error('youtube_url') ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Interview URL', 'interview_slug') ?>
            <?= form_input([
            'name' => "interview_slug",
            'class' => "form-control",
            'id' => "interview_slug",
            'placeholder' => "Enter Interview URL",
            'value' => (!empty(set_value('interview_slug'))) ? set_value('interview_slug') : $data['interview_slug']
            ]) ?>
            <?= form_error('interview_slug') ?>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <?= form_label('Interview Detail', 'details') ?>
            <?= form_textarea([
            'name' => "details",
            'class' => "form-control ckeditor",
            'id' => "details",
            'placeholder' => "Enter Interview Detail",
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