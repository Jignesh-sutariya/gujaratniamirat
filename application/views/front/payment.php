<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid">
	<div class="nation-part-1 check-color" data-color="#caa295" style="background-color: #caa295">
		<div class="inside-vid text-center">
			<div class="col-md-12 col-sm-12">
				<div class="contact cntnh">
					<h3><strong><?= ucfirst($title) ?></strong></h3>
					<p> </p>
					<p>Transaction <?= ucfirst($payType) ?></p>
					<p>Transaction ID: <?= $this->input->get('payment-id') ?></p>
					<p><?= $message ?></p>
				</div>
			</div>
		</div>
	</div>
</div>