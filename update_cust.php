<?php

    // Insert the content of connection.php file
    include('connection.php');

    // Update data into the database
    if(ISSET($_POST['Update']))
    {   
        $id = $_POST['OrderNo'];
        $name = $_POST['CusName'];
        $add = $_POST['CusAdd'];
       
        // $name2 = $_POST['CusPhoneNo'];
       
        $email = $_POST['CusEmail'];
       
        $cat = $_POST['StockNo'];

          // $cat2 = $_POST['InName'];
       
        //$price = $_POST['SellingPrice'];
       
        $quantity = $_POST['OrderQuantity'];
        $image = $_POST['OrderDate'];
          $pay = $_POST['StatusPayment'];


  $sql3 = "SELECT * FROM stock where StockNo = '$cat' ";
 $query3 = mysqli_query($conn,$sql3);
// $result3=mysqli_fetch_array($query3,MYSQLI_ASSOC);
$data = mysqli_fetch_assoc($query3);
$quantity2=$data['StockQuantity'];
// $qt3 = $result3['status'];
$total=$quantity2-$quantity;
if ( $quantity2 < $quantity )

      {

        echo "<script>alert('Insufficient stock quantity..');location.href</script>";
        //echo "<script>alert('Added to invoice..');location.href</script>";
        echo"<meta http-equiv='refresh' content='0; url=custorder.php'/>";

         
      }
      else
       {

        $sql = "UPDATE cus_order SET CusName='$name',
                                              CusAdd='$add',
                                              
                                              CusEmail='$email',
                                      
                                        
                                          StockNo='$cat',
                                      OrderQuantity = '$quantity',
                                     OrderDate = '$image',
                                    StatusPayment = '$pay'

                                        WHERE OrderNo='$id'";
 $query = mysqli_query($conn,$sql) or die (mysqli_error($conn));
       
 if($query)
 {

       
                $sql2 = "UPDATE stock SET StockQuantity='$total' where StockNo='$cat'";
                $query2 = mysqli_query($conn,$sql2) or die (mysqli_error($conn));
        //echo "<script>alert('Insufficient stock quantity')";
        echo "<script>alert('Updated to invoice..');location.href</script>";
          echo "<meta http-equiv='refresh' content='0; url=custorder.php'/>";
          }

          else
          {
            echo "<script>alert('Insert fail');location.href</script>";
  //      echo "<meta http-equiv='refresh' content='0; url=create_cust.php'/>";
          }


      }


    
  // if ( $quantity > $qty )
  //    {
  //      echo "<script>alert('Insufficient stock quantity')";
  //      echo "<meta http-equiv='refresh' content='0; url=create_cust.php'/>";
  //    }
  //    else {
      
  //      echo "<script>alert('Added to invoice')";
  //      echo "<meta http-equiv='refresh' content='0; url=custorder.php'/>";
  //    }



}
 ?>