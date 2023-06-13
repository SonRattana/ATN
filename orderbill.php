<?php
include_once("connectproduct.php");
//if(isset($_SESSION['user']) && isset($SESSION['user'])); 
if(isset($_POST['btnBuy'])){
  $c= new connecttt();
  $dblink=$c->connectToPDO();
$user_id=$_POST['uid'];
$total_price=$_POST['Total'];
$product_id=$_POST['pid'];

$dblink=$c->connectToPDO();
// $sqlDel = "DELETE FROM cart WHERE user_id =?";
// $result=$dblink->prepare($sqlDel);
// $result->execute(array($user_id));

$sql="INSERT INTO `order`(`uid`, `pid`, `Total`) VALUES (?,?,?) ";
$re=$dblink->prepare($sql);
$ac=$re->execute(array($user_id,$product_id,$total_price));

$sqlSelect1= "SELECT MAX(IDreceipt) as MAX from `receipt`";
$res= $dblink->prepare($sqlSelect1);
$res->execute(array());
$row = $res->fetch(PDO::FETCH_BOTH);


$bill_id = $row['0'];

$sqlSelect1= "SELECT * FROM cart WHERE uid =?"; 
$res= $dblink->prepare($sqlSelect1); 
$res->execute(array("$user_id")); 
$rows = $res->fetchAll(PDO::FETCH_BOTH);
$sqlDel = "DELETE FROM cart WHERE uid =?";
$result=$dblink->prepare($sqlDel);
$result->execute(array($user_id));
if ($res->rowCount()>0){  
    foreach($rows as $r){
        $product_id = $r['pid'];
        $query= "INSERT INTO detail(`IDreceipt`, `pid`, `uid`, `Quantity`) VALUES  (? , ?, ?, ?)";
        $res= $dblink->prepare($query);
        $res->execute(array("$bill_id","$product_id","$user_id",$r['Quantity']));
    }
header('location:index.php'); 
}
}

  
?>