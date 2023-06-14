<?php
require_once 'header.php';
?>
<style>
  body {
    background-image: url('../img/ảnh-nền-máy-tính-cực-ấn-tượng-1536x864.jpg');
    background-size: cover;
    background-position-y: -100px;
  }

  .card {
    background: rgba(0, 0, 0, 0.8);
  }
</style>
<div class="row">
  <h2>
    <center>Result for "<?= $_GET['search'] ?></center>
  </h2>
  <?php
  include_once 'connectproduct.php';
  $c = new connecttt();
  $dblink = $c->connectToPDO();
  $nameP = $_GET['search'];
  $sql = "SELECT * FROM `products` where Name_product LIKE ?";
  $re = $dblink->prepare($sql);
  $re->execute(array("%$nameP%"));
  $rows = $re->fetchAll(PDO::FETCH_BOTH);
  foreach ($rows as $r) :
  ?>
    <body>
      <div class="col-md-4 pb-3">
        <div class="card">
          <img src="./images/<?= $r['pImage'] ?>" class="card-img-top" alt="Product1>" style="margin: auto; width: 300px; height: 250px;" />
          <div class="card-body">
            <a href="detailproduct.php?pid=<?= $r['ID'] ?>" class="text-decoration-none">
              <h5 class="card-title"><?= $r['Name_product'] ?></h5>
            </a>
            <h6 class="card-subtitle mb-2 text-muted"><span><i class="bi bi-currency-dollar"></i></span><?= $r['price'] ?> Thousand</h6>
            <a href="#" class="btn btn-primary">Add to Cart</a>
          </div>
        </div>
      </div>
    </body>
  <?php
  endforeach;
  ?>
</div>
<?php
require_once 'footer.php';
?>