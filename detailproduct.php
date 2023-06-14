<?php
require_once 'header.php';
?>
<style>
  .col-sm-6 {
    margin: auto;
    padding: auto;
    color: black;

  }

  article {
    Height: 1090px;
    Background: #213E4A;
    Padding: 80px;
    Margin: 0 0 50px;
  }
</style>
<article>
  <div class="row pb-3">
    <?php
    include_once 'connectproduct.php';
    $c = new connecttt();
    $dblink = $c->connectToMySQL();

    $pid = $_GET['pid'] ?? ``;
    $sql = "select * from `Products` WHERE ID ='$pid'";
    $re = $dblink->query($sql);
    $row = $re->fetch_assoc();
    // if ($re->num_rows>0) :
    //     while ($row = $re->fetch_row()) :
    ?>
    <img src="./images/<?= $row['pImage'] ?>" class="col-sm-6 col-form-label" width="50px" height="750px">
    <div class="col-sm-6">

      <h2 style="font-family: 'Catamaran', sans-serif;  line-height: 1.6;color:#8EC45B;
                  text-decoration: none; font-size: 50px;"><?= $row['Name_product'] ?></h2>
      <hr>
      <p style="font-family: 'Lucida Bright';color:#7CB3E9"><?= $row['PDes'] ?></p>
      <p style="color:#ffffff">The remaining amount: <?= $row['pQuantity'] ?></p>
      <p style="font-family: 'Copperplate';color:lightgreen; font-size: 25px;"><span><i class="bi bi-currency-dollar"></i></span><?= $row['price'] ?> Thousand</p>
      <div class="quantity" style="padding-bottom:10px">
      </div>
      <br>
      <form action="cart.php" medthod="GET" id="addcart">
        <p style="font-size:20px;color:#8EC45B" >Quantity</p>
        <input type="number" placeholder="1,2,3..." value="<?= $row['Quantity'] ?>" min="1" max="<?= $row['pQuantity'] ?>" style="border-radius:20px" 
        name="quantity"/>
        <input type="hidden" name="pid" value="<?= $pid ?>">
        <input type="hidden" name="Price" value="<?= $row['price'] ?>">
        <input type="submit" class="btn btn-primary shop-button" name="btnAdd" value="Add to cart" />
      </form>
    </div>
  </div>
  <hr>
</article>
<?php
require_once 'footer.php';
?>