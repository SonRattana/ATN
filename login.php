<?php

include_once ('connectproduct.php')
?>


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
     <link rel="icon" href="../img/logoicon.jpg">
</head>
<style>
    body
    {
    background: url('../img/ảnh-nền-máy-tính-cực-ấn-tượng-1536x864.jpg');
    background-size: cover;
    background-position-y: -80px;
    }
    #wrapper
    {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        
        
    }
    #frmLogin
    {
        max-width: 500px; 
        background: rgba(0,0,0,0.8);
        flex-grow: 1;
        color: aqua;
        padding: auto;
        margin: auto;
        text-align: center;
        
    }

</style>
<body> 
<?php
 session_start();
 if (isset($_POST['btnLogin'])) {
     if ( isset($_POST['txtpass1']) && isset($_POST['txtFullname'])){
        $pwd = $_POST['txtpass1'];
         $usr = $_POST['txtFullname'];
         $c = new connecttt();
         $dblink = $c->connectToPDO();
         $sql = "select * from `staff` where Namestaff = ? and Password = ?";
         $stmt = $dblink->prepare($sql);
         $re = $stmt->execute(array("$usr","$pwd"));
         $numrow = $stmt->rowCount();
         $row = $stmt->fetch(PDO::FETCH_BOTH);
         if ($numrow == 1) {
             echo "Login successfully";
             $_SESSION['staff_name'] = $row['Namestaff'];
             $_SESSION['staff_id'] = $row['ID'];
             $_SESSION['Store_ID'] = $row['StoreID'];
             // setcookie("cc_username", $row['Nameurs'],time()+600);
             // setcookie("cc_id", $row['IDurs'],time()+600);
             header("Location: index.php");
         } else {
             echo "Something wrong with your info<br>";
         }
     } else {
         echo "Please enter your info";
     }
 }
 ?>
    <div id="wrapper">
    <div class="container">
        
<form id="frmLogin" name="frmRegister" action="login.php" method="POST" role="form" onsubmit="return formValid();">
<h2 class="form-heading"><center>Login</center></h2>
<div class="row pb-3">
         
         <label for="txtTen" class="col-sm-3 control-label">Username(*):  </label>
         <div class="col-sm-8">
               <input type="text" name="txtFullname" id="txtFullname" class="form-control" placeholder="Username" value="" required/>
  
         </div>
   </div>  
   <div class="row pb-4">
         <label class="col-sm-3 col-form-label" 
         for="password1">Password</label>
         <div class="col-sm-8">
             <input type="password" name="txtpass1"
              id="password1" class="form-control"placeholder="Password" required>
         </div>
     </div>
     <div class="row pb-3">
    <div class="d-grid col-2 mx-auto">
        <input type="submit"
        value="Login" 
        class="btn btn-primary"
        name="btnLogin"
        id="btnLogin"
        >
    </div> 
</div>
<div class="form-Back" style="justify-content: space-between; display:flex" >
<a href="index.php" class="nav-link" >Back to Home</a>
<a href="register.php" class="nav-link" >Create Account</a>
</div>
</form>
    </div>
</body>