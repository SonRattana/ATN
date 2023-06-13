<?php
session_start();
ob_start();
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATN Gundam</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
    integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
    integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css"
     integrity="sha512-giQeaPns4lQTBMRpOOHsYnGw1tGVzbAIHUyHRgn7+6FmiEgGGjaG0T2LZJmAPMzRCl+Cug0ItQ2xDZpTmEc+CQ==" crossorigin="anonymous" 
     referrerpolicy="no-referrer" /> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">

     <link rel="icon" href="../img/logoicon.jpg">
     
</head>
<style>
    .dropdown:hover .dropdown-menu {
        display: block;
    }
  .nav-link{
    font-size: 20px;
    width: auto;
    color: white;
  }
  .card-title{
    color: #49C5B6;
    /* position: relative; */
  }
  .navbar-brand{
    font-family:Brush Script MT;
    font-size: 40px;
    color: aqua;
  }
  .btn-primary{
    color: #212529;
    background-color: #7cc;
    border-color: #5bc2c2
  }
  .search {
        display: flex;
        align-items: right;
        justify-content: right;
    }

    .searchbox {
        width: 400px;
        height: 35px;
        display: flex;
        align-items: right;
    }

    .searchbox button {
        width: 50px;
        height: 35px;
        background-color: #1d1a1a;
        color: aqua;
        border:none;
        outline:none;
        font-weight: bold;
        border-radius: 3px;
        transition:0.4s;
    }

    .searchbox button:hover{
      background: rgba(0,0,0,0.8);
    }
    a:hover{
        background-color: #5bc2c2;
    }
</style>
<body>
<nav class="navbar navbar-expand-md" style="background: #434242;border-bottom: solid 1px black;">
    <div class="container-fluid">
        <a href="index.php" class="navbar-brand"><h1><img src="../img/gundamlogo.png"  alt="..." width="150px"></h1></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarMain">    
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMain">
            <div class="navbar-nav">
                <a href="index.php" class="nav-link"> Home</a> 
                <a href="#contact" class="nav-link">Contact</a>
                <a href="Manager.php" class="nav-link">Manager</a>
                <a href="cart.php" class="nav-link"> Cart</a> 
                <div class="dropdown">
                    <a href="products.php" class="nav-link">
                    Products
                </a>
                </div>
            </div>
            <div class="search">
                <form class="searchbox" action="Search.php">     
                    <input type="text" class="form-control" placeholder="Search..." name="search">
                    <button class="search_button" name="btnSearch"><i class="bi bi-search"></i></button>
                </form>
            </div>   
            <div class="navbar-nav ms-auto">
                    <?php
                    if (isset($_SESSION['staff_name'])):
                    ?>
                        <p href="#" class="nav-item nav-link">Wellcome,<?=$_SESSION['staff_name']?></p>
                        <a href="logout.php" class="nav-item nav-link">Logout</a>
                    <?php
                    else :
                    ?>
                        <a href="login.php" class="nav-item nav-link" ><i class="bi bi-door-open"></i>Login</a>
                        <a href="register.php" class="nav-item nav-link" >Register</a>
                    <?php
                    endif;
                    ?>
                </div>
          </div> 
      </div>  
</nav>
</body>