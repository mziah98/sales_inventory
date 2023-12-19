<?php

    // Insert the content of connection.php file
    include('connection.php');

    // Update data into the database
    if(ISSET($_POST['updateData']))
    {   
        $id = $_POST['updateId'];
      
        $group = $_POST['updateStockGroup'];
       // $cat = $_POST['updateCatNo'];

        // $ct = $_POST['updateCatName'];
          // $in = $_POST['updateInNo'];
        $weight = $_POST['updateStockWeight'];
     
        $sell = $_POST['updateSellingPrice'];
       
        $image = $_POST['updateImage'];



//         $sell2 = isset($_POST['InNo']) ? $_POST['InNo'] : '';

       
//         $quantity = isset($_POST['InPrice']) ? $_POST['InPrice'] : '';


// $sql3 = "SELECT * FROM invoice where InNo = '$sell2' ";
//  $query3 = mysqli_query($conn,$sql3);
// // $result3=mysqli_fetch_array($query3,MYSQLI_ASSOC);
// $data = mysqli_fetch_assoc($query3);
// $quantity2=$data['SellingPrice'];
// // $qt3 = $result3['status'];
// $total=$quantity2-$quantity;

        $sql = "UPDATE stock SET 
                                       StockGroup='$group',
                                     
                                      
                                       StockWeight='$weight',
                                        
                                      SellingPrice = '$sell',

                                     Image = '$image'

                                        WHERE StockNo='$id'";



        $result = mysqli_query($conn, $sql);

        if($result)
        {
            echo "<script> alert('Data Updated Successfully.'); </script>";
             echo "<meta http-equiv='refresh' content='0; url= listofstock.php'/>";
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>