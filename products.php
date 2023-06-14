<?php
require_once 'header.php';
?>
<style>
  body {
    background-image: url('../img/ảnh-nền-máy-tính-cực-ấn-tượng-1536x864.jpg');
    background-size: cover;
    background-position-y: -100px;
  }

  .head {
    font-size: 30px;
    max-width: fit-content;
    color: aquamarine;
    margin: auto;
  }

  .cate-list a {
    padding: 12px;
    font-size: 20px;
    color: aquamarine;
    text-decoration: none;

  }

  .cate-list a:hover {
    color: aqua;
  }

  .card {
    background: rgba(0, 0, 0, 0.8);
  }
</style>

<body>
  <div class="product-container">
    <nav class="cate">
      <div class="cate-list">
      <a href="?cat_id">All Product</a>
        <?php
        include_once 'connectproduct.php';
        $c = new connecttt();
        $dblink = $c->connectToMySQL();
        $sql = "SELECT *FROM category";
        $re = $dblink->query($sql);

        $re->data_seek(0);
        while ($row = $re->fetch_assoc()) {
          $href = "?pCatID=$row[IDCate]";
          echo "<a href='$href'>$row[Cat_name]</a>";
        }
        ?>
      </div>
    </nav>
    <br>
    <div class="row">

      <?php
      include_once 'connectproduct.php';
      $c = new connecttt();
      $dblink = $c->connectToMySQL();
      $idcat = $_GET['pCatID'] ?? '';
      $sql = "SELECT *FROM `products` WHERE pCatID ='$idcat'";
      $re = $dblink->query($sql);
      $row1 = $re->fetch_row();;
      $re->data_seek(0);
      if ($re->num_rows > 0) :
        while ($row = $re->fetch_assoc()) :
      ?>
          <div class="col-md-4 pb-3">
            <div class="card">
              <img src="./images/<?= $row['pImage'] ?>" class="card-img-top" alt="Product1>" style="margin: auto; width: 300px; height: 250px;" />
              <div class="card-body">
                <a href="detailproduct.php?pid=<?= $row['ID'] ?>" class="text-decoration-none">
                  <h5 class="card-title"><?= $row['Name_product'] ?></h5>
                </a>
                <h6 class="card-subtitle mb-2 text-muted"><span><i class="bi bi-currency-dollar"></i></span><?= $row['price'] ?> Thousand</h6>
                <a href="#" class="btn btn-primary">Show Detail</a>
              </div>
            </div>
          </div>
          <?php
        endwhile;
      else :
        include_once 'connectproduct.php';
        $c = new connecttt();
        $dblink = $c->connectToMySQL();
        $sql = "SELECT *FROM `products`";
        $re = $dblink->query($sql);
        $row1 = $re->fetch_row();;
        $re->data_seek(0);
        if ($re->num_rows > 0) :
          while ($row = $re->fetch_assoc()) :
          ?>
            <div class="col-md-4 pb-3">
              <div class="card">
                <img src="./images/<?= $row['pImage'] ?>" class="card-img-top" alt="Product1>" style="margin: auto; width: 300px; height: 250px;" />
                <div class="card-body">
                  <a href="detailproduct.php?pid=<?= $row['ID'] ?>" class="text-decoration-none">
                    <h5 class="card-title"><?= $row['Name_product'] ?></h5>
                  </a>
                  <h6 class="card-subtitle mb-2 text-muted"><span><i class="bi bi-currency-dollar"></i></span><?= $row['price'] ?> Thousand</h6>
                  <a href="detailproduct.php?pid=<?= $row['ID'] ?>" class="btn btn-primary">Show Detail</a>
                </div>
              </div>
            </div>
      <?php
          endwhile;
        endif;
      endif;
      ?>
    </div>


  </div>

</body>

</html>
<?php
require_once 'footer.php';
?>