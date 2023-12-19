<?php

    // Insert the content of connection.php file
    include('connection.php');

    // Update data into the database
    if(ISSET($_POST['update']))
    {   

        $id = $_POST['PoNo'];
        $name = $_POST['Description'];
  $quantity = $_POST['Quantity'];
  $name1 = $_POST['CompName'];
  $name2 = $_POST['CompAdd'];
  $name3 = $_POST['CompEmail'];
  // $name4 = $_POST['CompPhone'];
  $date= $_POST['Date'];
  //$category = $_POST['Notes'];
  
    //$cus = $_POST['StaffNo']; 

  $sql = "call updatepo1 ('$id','$name1','$name2','$name3','$name',' $quantity','$date')";

        // $sql = "UPDATE purchase_order SET Description='$name',
        //                                CompName='$name1',
        //                                  CompAdd='$name2',
        //                                    CompEmail='$name3',
                                             
                                 
                                   
        //                               Quantity = '$quantity',
        //                              Date = '$date'
                                    

        //                                 WHERE PoNo='$id'";

        $result = mysqli_query($conn, $sql);

        if($result)
        {
            echo "<script> alert('Data Updated Successfully.'); </script>";
             echo "<meta http-equiv='refresh' content='0; url= purorder.php'/>";
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
              echo "<meta http-equiv='refresh' content='0; url= purorder.php'/>";
        }
    }
?>