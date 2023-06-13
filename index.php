<?php
require_once 'header.php';
?>
<baner>
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true"
         aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="../img/p06.jpg"class="d-block w-100" alt="..." height="900px">
        </div>
        <div class="carousel-item">
          <img src="../img/p07.jpg" class="d-block w-100" alt="..." height="900px">
        </div>
        <div class="carousel-item">
          <img src="../img/pp09.jpg" class="d-block w-100" alt="..." height="900px">
        </div>
        <div class="carousel-item">
          <img src="../img/p08.jpg" class="d-block w-100" alt="..." height="900px">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>  
</baner>
<style>
  body{
    background-image: url('../img/ảnh-nền-máy-tính-cực-ấn-tượng-1536x864.jpg');
    background-size: cover;
    background-position-y: 80px;
}
.card{
  background: rgba(0,0,0,0.8);
}   
h2{
  border-top: 1px solid #66FCF1;
}  
</style>
<body>
<div class="container">
  <br>
<h2 ><center>All product</center></h2>
<br>
        <div class="row" >

            <?php
             include_once 'connectproduct.php';
             $c=new connecttt();
             $dblink = $c->connectToMYSQL();
             $sql= "select * from `products`"; // where $_GET['id'];
             $re = $dblink->query($sql);
             $row1 = $re->fetch_row();
             //echo $row1[2];
             echo"<br>";
             $re->data_seek(0);
             if($re->num_rows>0):
                while($row=$re->fetch_assoc()):
            ?>       
            <div class="col-md-4 pb-3">
                    <div class="card">
                        <img
                        src="../img/<?=$row['pImage']?>"
                        class="card-img-top"
                        alt="Product1>" style="margin: auto; width: 300px; height: 250px;"
                        />
                        <div class="card-body">
                        <a href="detailproduct.php?pid=<?=$row['ID']?>" class="text-decoration-none">
                        <h5 class="card-title"><?=$row['Name_product']?></h5></a>
                        <h6 class="card-subtitle mb-2 text-muted"><span><i class="bi bi-currency-dollar"></i></span><?=$row['price']?> Thousand</h6>
                        <a href="detailproduct.php?pid=<?=$row['ID']?>" class="btn btn-primary">Show Detail</a>
                        </div>
                    </div>
                </div>
            <?php
            endwhile;
             else:
             echo "Not found";
             endif;
             ?>

        </div>
</div>
</body>
<?php
require_once 'footer.php';
?>