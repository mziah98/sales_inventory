<?php

    // Insert the content of connection.php file
    include('connection.php');
    // Update data into the database
    if(ISSET($_POST['updateData']))
    {   
      $id = $_POST['updateId'];

        $name = $_POST['updateInName'];
       
        $cat = $_POST['updateSupNo'];

      
        $cat2 = $_POST['updateCatNo'];
        $pr = $_POST['updateInPrice'];
        // $sell = $_POST['updateTotalPrice'];
        $quantity = $_POST['updateInQuantity'];
        $image = $_POST['updateInDate'];
          // $pay = $_POST['updatePaymentDue'];

        $sql = "UPDATE invoice SET InName='$name',
                                       
                                       SupNo='$cat',
                                       
                                        CatNo='$cat2',
                                        InPrice='$pr',
                                     
                                      InQuantity = '$quantity',
                                     InDate = '$image'
                                    

                                        WHERE InNo='$id'";

        $result = mysqli_query($conn, $sql);

        if($result)
        {
            echo "<script> alert('Data Updated Successfully.'); </script>";
             echo "<meta http-equiv='refresh' content='0; url= invoice.php'/>";
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
              echo "<meta http-equiv='refresh' content='0; url= invoice.php'/>";
        }
    }
?>