<?php
include_once 'header.php';
include_once 'connectproduct.php';
//if(isset($_SESSION['user'])){
// $user = $_SESSION['user'];

// if(isset($_COOKIE['cc_username'])){
//     $user = $_COOKIE['cc_username'];
$c = new connecttt();
$dblink = $c->connectToPDO();
if (isset($_SESSION['staff_name'])) {
    // $quantitychossse = $_POST['quantity'];
    $user_name = $_SESSION['staff_name'];
    $user_id = $_SESSION['staff_id'];   //$id = isset($_GET['id']) ? $_GET['id'] : '';
    if (isset($_GET['btnAdd'])) {
        $p_id = $_GET['pid'];
        $quantity = $_GET['quantity'];
        $Price = $_GET['Price'];
        $dblink=$c->connectToPDO();
        if ($quantity <= 0) {
            $quantity = 0;
            $quantity += 1;
        }
        $total = $Price * $quantity;
        $sqlSelect1 = "SELECT pid FROM cart WHERE staff_id =? AND pid=?";
        $re = $dblink->prepare($sqlSelect1);
        $re->execute(array("$user_id", "$p_id"));
        if ($re->rowCount() == 0) 
        {
            $query = "INSERT INTO cart(`staff_id`, `pid`,`Price`,`Quantity`, `Total`) VALUES (?,?,?,?,?)";
            $stmt = $dblink->prepare($query);
            $stmt->execute(array("$user_id", "$p_id", $Price, "$quantity", "$total"));
        } else {
            $query = "UPDATE cart SET Quantity = Quantity + ? where staff_id=? and pid=?";
            $stmt = $dblink->prepare($query);
            $stmt->execute(array("$quantity", "$user_id", "$p_id"));
            $query2 = "UPDATE cart SET Total = Total + ? where staff_id=? and pid=?";
            $stmt2 = $dblink->prepare($query2);
            $stmt2->execute(array("$total", "$user_id", "$p_id"));
        }
    } else if (isset($_GET['del_id'])) {
           $cart_del = $_GET['del_id'];
           $query = "DELETE FROM cart WHERE IDcart=?";
           $stmt = $dblink->prepare($query);
           $stmt->execute(array($cart_del));
    }
    $sqlSelect = "SELECT * FROM cart c, `products` t where c.pid = t.ID and staff_id =?";
    $stmt1 = $dblink->prepare($sqlSelect);
    $stmt1->execute(array($user_id));
    $rows = $stmt1->fetchAll(PDO::FETCH_BOTH);
    ("Location: index.php");
} else {
    header("Location: login.php");
}
?>
<div class="container">
    <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
    <h6 class="mb-0 text-muted"><?= $stmt1->rowCount() ?> item(s)</h6>
    <table class="table">
        <tr>
            <th>Productname</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
        <?php
        foreach ($rows as $row) {
        ?>
            <tr>
                <td><?= $row['Name_product'] ?></td>
                <td>
                    <h1 id="from1" name="quantity" style="width: 70px;" class="form-control form-control-sm"><?= $row['Quantity'] ?></h1>
                </td>
                <td>
                    <h6 class="mb-0"><?= $row['Quantity'] ?> * <i class="bi bi-currency-dollar"></i> <?= $row['Price'] ?>=<?= $row['Total'] ?></h6>
                </td>
                <td><a href="cart.php?del_id=<?= $row['IDcart'] ?>" class="text-muted text-decoration-non">x</a></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <hr class="pt-5">
    <h6 class="mb-0"><a href="index.php" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>back to shop</a></h6>
</div>
<form action="orderbill.php" method="POST">
    <input type="hidden" name="uid" value="<?= $user_id ?>">
    <input type="hidden" name="pid" value="<?= $row['pid'] ?>">
    <input type="hidden" name="price" value="<?= $row['Price'] ?>">
    <input type="hidden" name="total" value="<?= $row['total'] ?>">
    <center><input type="submit" value="Buy" name="btnBuy" class="btn btn-primary" style="width: 100px"></center>
</form>