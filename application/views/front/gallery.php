<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid">
	<div class="open-gallery check-color" data-color="#6fab9e">
		<div class="container">
			<div class="gallery">
				<h3>Picture Gallery & Events</h3>
			</div>
			<div class="gallery-part text-center">
				<?php foreach ($gallery as $key => $val): ?>
				<div class="row">
					<?php $a = ['1', '2', '3']; foreach ($val as $k => $v): $rand = array_rand($a); ?>
					<div class="col-lg-4 col-md-6 col-sm-12 col-12">
						<div class="image-<?= $a[$rand] ?>">
							<img src="<?= $v['image'] ?>" alt="">
							<div class="img-desc-<?= $a[$rand] ?>" >
								<p><?= $v['details'] ?></p>
							</div>
						</div>
					</div>
					<?php unset($a[$rand]); endforeach ?>
				</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
</div>