<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-lg-12">
  <div class="card card-success card-outline">
    <div class="card-header">
      <div class="row">
        <div class="col-sm-10">
          <h5 class="card-title m-0"><?= ucwords($title) ?> List</h5>
        </div>
        <div class="col-sm-2">
          <?= anchor($url.'/add', 'Add', 'class="btn btn-block btn-outline-success btn-sm"'); ?>
        </div>
      </div>
    </div>
    <div class="card-body table-responsive">
      <table class="table table-striped table-hover datatable">
        <thead>
          <tr>
            <th class="target">Sr. No.</th>
            <th>Description</th>
            <th class="target">Image</th>
            <th class="target">Action</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
</div>