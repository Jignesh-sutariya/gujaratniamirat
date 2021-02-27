<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="invoice p-3 mb-3">
          <div class="row">
            <div class="col-12">
              <h4>
              <?= img(['src' => 'assets/images/favicon.png', 'height' => 60, 'width' => 100, ]) ?>
              <small class="float-right">Date: <?= date('d M Y', strtotime($data['created_at'])) ?></small>
              </h4>
            </div>
          </div>
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              From
              <address>
                <strong><?= APP_NAME ?></strong><br>
                Address line 1<br>
                Address line 2<br>
                Phone: (+91) <?= $this->session->mobile ?><br>
                Email: <?= $this->session->email ?>
              </address>
            </div>
            <div class="col-sm-4 invoice-col">
              To
              <address>
                <strong><?= ucwords($data['name']) ?></strong><br>
                <?= ucwords($data['society']) ?>,
                <?= ucwords($data['landmark']) ?><br>
                <?= ucwords($data['city']) ?> - <?= $data['pincode'] ?><br>
                Phone: (+91) <?= $data['mobile'] ?><br>
                Email: <?= $data['email'] ?>
              </address>
            </div>
            <div class="col-sm-4 invoice-col">
              <b>Seller:</b> <?= ($vendor = $this->main->check('vendor', ['id' => $data['vendor_id']], 'name')) ? ucwords($vendor) : APP_NAME ?><br>
              <b>Payment Type:</b> <?= $data['pay_mode'] ?><br>
              <b>ISBN:</b> 978-81-7997-757-6<br>
              <b>Copyright:</b>L-77291/2019
            </div>
          </div>
          <div class="row">
            <div class="col-12 table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Description</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Book Purchase</td>
                    <td><?= $data['quantity'] ?></td>
                    <td>₹ <?= $data['price'] ?></td>
                    <td>₹ <?= $data['price'] * $data['quantity'] ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
            </div>
            <div class="col-6">
              <p class="lead">Amount Paid</p>
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th>Total (Include GST):</th>
                    <td>₹ <?= $data['price'] * $data['quantity'] ?></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <div class="row no-print">
            <div class="col-12">
              <?= anchor($url, '<i class="fas fa-arrow-circle-left"></i> Go Back', 'class="btn btn-outline-danger col-sm-2 float-right" style="margin-right: 5px;"'); ?>
              <button type="button" onclick="window.print()" class="btn btn-default col-sm-2 float-right" style="margin-right: 5px;">
              <i class="fas fa-print"></i> Print
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>