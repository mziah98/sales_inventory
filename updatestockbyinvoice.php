<?php

    // Insert the content of connection.php file
    include('connection.php');

    // Update data into the database
    if(ISSET($_POST['updateData']))
    {   
        $id = $_POST['updateId'];
        $name = $_POST['updateStockName'];
        $sup = $_POST['updateSupName'];
       
        $price = $_POST['updateStockPrice']; $sell = $_POST['updateSellingPrice'];
        $quantity = $_POST['updateStockQuantity'];
      

        $sql = "UPDATE supplier_stock SET StockName='$name',
                                       SupName='$sup',
                                         
                                        StockPrice=' $price',
                                     
                                      StockQuantity = '$quantity'
                                    

                                        WHERE SupStockNo='$id'";

        $result = mysqli_query($conn, $sql);

        if($result)
        {
            echo "<script> alert('Data Updated Successfully.'); </script>";
             echo "<meta http-equiv='refresh' content='0; url= stockbyinvoice.php'/>";
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>