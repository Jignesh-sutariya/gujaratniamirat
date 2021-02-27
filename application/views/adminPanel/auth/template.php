<?php defined('BASEPATH') OR exit('No direct script access allowed') ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= APP_NAME.' | '.ucwords($title) ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= link_tag('assets/images/favicon.png','icon','image/x-icon') ?>
    <!-- Font Awesome -->
    <?= link_tag('assets/plugins/fontawesome-free/css/all.min.css','stylesheet','text/css') ?>
    <?= link_tag('assets/plugins/fontawesome-free/css/all.min.css','stylesheet','text/css') ?>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <?= link_tag('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css','stylesheet','text/css') ?>
    <!-- Theme style -->
    <?= link_tag('assets/dist/css/adminlte.min.css','stylesheet','text/css') ?>
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <?= img(['src' => 'assets/images/logo.png', 'alt' => '', 'height' => 100, 'width' => 100]) ?>
      </div>
      <?php if ($this->session->success): ?>
      <div class="alert alert-success alert-messages">
        <?= $this->session->success ?>
      </div>
      <?php endif ?>
      <?php if ($this->session->error): ?>
      <div class="alert alert-danger alert-messages">
        <?= $this->session->error ?>
      </div>
      <?php endif ?>
      <?= $contents ?>
    </div>
    <script src="<?= assets('plugins/jquery/jquery.min.js') ?>"></script>
    <script src="<?= assets('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= assets('dist/js/adminlte.min.js') ?>"></script>
    <?php $this->load->view(admin('script')) ?>
  </body>
</html>