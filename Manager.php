<?php
require_once 'header.php'
?>
    <h1>Product List</h1>
    <button style ="border-radius:10px;
    margin-bottom : 20px;
    background:rgb(0, 149,246,0.3);
    border:1px solid white;
    " ><a href ="./addpro.php">Add Product</a></button>
    <table class="table">
        <thead>
            <tr>
                <!-- <th>No.</th> -->
                <!-- <th>ID Product</th> -->
                <th>Name</th>
                <th>Price</th>
                <th>Staff</th>

                <th>Date</th>
                <!-- <th>Actions</th> -->
            </tr>
        </thead>
        <tbody>
        <?php
             include_once 'connectproduct.php';
             $c=new connecttt();
             if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    // print_r ($_SESSION);
             $dblink = $c->connectToMySQL();
            //  if (isset($_SESSION['UserName']))
                $uid = $_SESSION['staff_id'];
                $sup =  $_SESSION['Store_ID'] ;

            //  $dblink = $c->connectToPDO();
             $sql= "SELECT * FROM `storare` i inner join `staff` u on i.Staff_ID = u.ID inner join `store` s on s.ID = u.StoreID
              inner join `products` t on t.ID = i.product_ID where i.Store_ID = $sup";
             $re= $dblink->query($sql);
             if($re->num_rows>0):
                while($row=$re->fetch_assoc()):
                
            ?>
            <tr>
                <td><?= $row['Name_product']?></td>                       
                <td><?= $row['price']?> $</td>
                <td><?= $row['Namestaff']?> </td>
                <td><?= $row['Date_add']?> </td>           
                </td>
            </tr>
            <?php
             
            endwhile;
    
             else:
             echo "Not found";
             
             endif;
             ?> 
       
        </tbody>
    </table>

