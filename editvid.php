<?php
include "connection.php";

$id = $_GET['VidId'];
$select = mysqli_query($conn, "select * from video where VidId='$id'");
$data= mysqli_fetch_assoc($select);
?>




<?php include 'menu.php'; ?>

<html>
<head>


     <div class="main">
 <form method="post" text-align="center" enctype="multipart/form-data" >
      <input type="hidden" name="size" value="1000000">
      <div><br>
      <h1><center>Update Your Video Here</h1></center><br>
    </div>
          <div>
              <center><input type="file" name="file" ></center>
          </div><br>

         <!--  <div>
            <textarea name="detail" cols="40" rows="4" placeholder="Say something about this images">
            </textarea>
          </div><br> -->

          <div>
            <center><button type="submit" name="update">Update Video</button></center>
           </div>
        <br>
      <br>
  </form>
    </div>
    </div>

</head>




 <?php

      
        //  if(isset($_POST['editvid'])){

        //   $VidId=$_POST['VidId'];

        // }
      


     // $sql = mysqli_query($conn,"SELECT * FROM video");

     

        if(isset($_POST['update'])){
            $maxsize = 50000000 ; // 50MB
                       
            $name = $_FILES['file']['name'];
            //$VidId=$_POST['VidId'];
            $target_dir = "video/";
            $target_file = $target_dir . $_FILES["file"]["name"];
                $id = $_GET['VidId'];

            // Select file type
            $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Valid file extensions
            $extensions_arr = array("mp4","avi","3gp","mov","mpeg");

            // Check extension
            if( in_array($videoFileType,$extensions_arr) ){
                
                // Check file size
                if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
                    echo "File too large. File must be less than 50MB.";
                }else{
                    // Upload
                    if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){


                        // Insert record
                        $query = "UPDATE video SET VidName= '".$name."',location= '".$target_file."' 
                        WHERE VidId='".$id."'";

                       

                       $query2 = mysqli_query($conn,$query);

              //$result = mysqli_query($conn,$query);
              if($query)
              {
              echo "<script>alert('video update successfully!');</script>";
              echo "<meta http-equiv='refresh' content='0; url=displayvid.php'/>";
              }
            }
          }

       }else{
        echo "Invalid file extension.";
        echo "<script>alert('Invalid file extension!');</script>";
        echo "<meta http-equiv='refresh' content='0; url=displayvid.php'/>";
       }
   }
        ?>

<!--  -->

