<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="icon" href="../hihiweb/images/bmw-icon-png-24.jpg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" 
    integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk"
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" 
    integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
     crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
     integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" 
     crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="icon" href="./images/logoicon.jpg">
</head>
<style>
    body{
      background-image: url('./images/ảnh-nền-máy-tính-cực-ấn-tượng-1536x864.jpg');
      background-size: cover;
      background-position-y: -100px;
        color: aquamarine;
        Width: 1000px;
        margin: auto;
        padding: 100px;
    }

</style>
<body>
<?php
//include_once 'header.php';
include_once 'connectproduct.php';
if(isset($_POST['btnRegister'])){
$c=new connecttt();
$dblink = $c->connectToPDO();
$fullname = $_POST['txtFullname'];

$phone = $_POST['txtPhone'];
$email = $_POST['txtEmail'];

$sql= "INSERT INTO `staff`(`Name`,`phone`,`Email`) VALUES (?,?,?)";// co gai tien "select * from hihipro002 where pName like ? and Price > ?";
//"select * from hihipro002 where pName like CONCAT('%',:Namep,'%')";(**) // where $_GET['id']; 

$re = $dblink->prepare($sql);
//$re->bindParam(":Namep",$pName,
//PDO::PARAM_STR);
$stmt = $re->execute(array("$fullname","$phone","$email"));// $re->execute(array("%$pName", gia tien(?2))); // $re->execute();(**)
 if(isset($_POST['btnRegister'])){
  if (isset($_POST['txtPhone']) && strlen($_POST['txtPhone']) > 10 ) 
     {
         echo "Phone number must be less than 11 ";
         echo "<br>";
     }
  }
if($stmt){
      echo "Congrats";
}else{
      echo "Failed";
}
}
?>

<div class="container">
    <h2><Center>Member Registration</Center></h2>
    <br>
    <?php
       ?>
             <form id="form1" name="form1" method="post" action="" class="form-horizontal needs-validation" role="form">
                <div class="row pb-3">
                        
                        <label for="txtTen" class="col-sm-2 control-label">Username(*):  </label>
                        <div class="col-sm-10">
                              <input type="text" name="txtFullname" id="txtFullname" class="form-control" placeholder="Username" value="" required/>                
                        </div>
                  </div>                               
                   <div class="row pb-3">      
                        <label for="lblEmail" class="col-sm-2 control-label">Email(*):  </label>
                        <div class="col-sm-10">
                              <input type="text" name="txtEmail" id="txtEmail" value="" class="form-control" placeholder="Email" required/>
                        </div>
                   </div>
                   <div class="row pb-3">      
                        <label for="lblEmail" class="col-sm-2 control-label">Phone:  </label>
                        <div class="col-sm-10">
                              <input type="text" name="txtPhone" id="txtPhone" value="" class="form-control" placeholder="Phone" required/>
                        </div>
                   </div>  
                  <br>
                <div class="row pb-3">
                    <div class="d-grid col-2 mx-auto">
                          <input type="submit"  class="btn btn-primary" name="btnRegister" id="btnRegister" value="Register"/>
                              
                    </div>
                 </div>
                 <div class="form-Back" style="justify-content: space-between; display:flex" >
                      <a href="login.php" class="nav-link">Back to Login</a>
                 </div>
            </form>
</div>

</body>
<?php
//include_once 'footer.php';
?>