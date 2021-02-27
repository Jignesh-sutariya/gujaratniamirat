<?php defined('BASEPATH') OR exit('No direct script access allowed') ?>
<div class="card">
  <div class="card-body login-card-body">
    <p class="login-box-msg">Enter the otp we have mailed to your email.</p>
    <?= form_open(admin('checkOtp')) ?>
    <div class="form-group">
      <div class="input-group">
        <?= form_input([
        'name' => 'otp',
        'class' => 'form-control',
        'placeholder' => 'Enter OTP'
        ]) ?>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-envelope"></span>
          </div>
        </div>
      </div>
      <?= form_error('email') ?>
    </div>
    <div class="row">
      <div class="col-12">
        <?= form_button([ 'content' => 'Sign in',
        'type'    => 'submit',
        'class'   => 'btn btn-primary btn-block']) ?>
      </div>
    </div>
    <?= form_close() ?>
      <p class="mt-4">
        <?= anchor(admin('login'), 'Login Here') ?>
      </p>
  </div>
</div>