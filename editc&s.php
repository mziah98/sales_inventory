<?php

    // Insert the content of connection.php file
    include('connection.php');

    // Update data into the database
    if(ISSET($_POST['updateData']))
    {   
        $id = $_POST['updateId'];
           //$cat = $_POST['updateCatNo'];
         // $n= $_POST['updateNo'];
        $name = $_POST['updateStockName'];
       
      
         $date = $_POST['updateDate'];
        $price = $_POST['updateStockPrice'];
         $sell = $_POST['updateSellingPrice'];
          $par = $_POST['updateParticular'];
        $quantity = $_POST['updateStockQuantity'];
           $rem = $_POST['updateRemarks'];
      

        $sql = "UPDATE stock SET StockName='$name',
                                      Particular='$par',
                                     Remarks='$rem',
                                        Date='$date',
                                        StockPrice='$price',
                                         SellingPrice=' $sell',
                                     
                                      StockQuantity = '$quantity'
                                    

                                        WHERE StockNo='$id'";

        $result = mysqli_query($conn, $sql)or die (mysqli_error($conn));

        if($result)
        {
            echo "<script> alert('Data Updated Successfully.'); </script>";
             echo "<meta http-equiv='refresh' content='0; url= c&s.php'/>";
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
             echo "<meta http-equiv='refresh' content='0; url= c&s.php'/>";
        }
    }
?>