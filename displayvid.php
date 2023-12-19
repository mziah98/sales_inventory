 
<?php include 'menu.php'; ?>

 <?php
        include("connection.php");



        // if(isset($_POST['editvid'])){

        //   $VidId=$_POST['VidId'];

        // }
      
     $sql = mysqli_query($conn,"SELECT * FROM video");




   

     // $VidId=$_POST['VidId']; 

        if(isset($_POST['but_upload'])){
            $maxsize = 50000000 ; // 50MB
             //$VidId=$_POST['VidId']; 
            $name = $_FILES['file']['name'];
            $target_dir = "video/";
            $target_file = $target_dir . $_FILES["file"]["name"];

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
                        $query = "INSERT INTO video(VidName,location) VALUES('".$name."','".$target_file."')";

                        mysqli_query($conn,$query);

                        if($query)
              {
              echo "<script>alert('upload successfully!');</script>";
              echo "<meta http-equiv='refresh' content='0; url=displayvid.php'/>";
              
              }
            }
          }

       }else{
        echo "Invalid file extension.";
         echo "<script>alert('Invalid file extension!');</script>";
       // echo "<meta http-equiv='refresh' content='0; url=displayvid.php'/>";
       
        
       }
   }
        
        
        ?>


<!doctype html>
<html>
    <head>
    <body>
        <br>
        <h2><center>Compilation Videos &#127916;</center></h2>
       
        <p><center>This is some of compilation videos related to this company that contain some knowledge from the inventory <br>that have been supply from this company  including the campaigns and activities involved . 
        Hope you can explore more and enjoy it. &#128522;</p></center>
        <form method="post" text align="center" action="" enctype='multipart/form-data'>
           <center><input type='file' name='file' />
            <input type='submit' value='Upload' name='but_upload'></center> 
        </form>
        <br>


        <div id="border1">

    <table cellpadding="5" cellspacing="0" margin-left="50%" border="" text align="right" width="80%">
      <tbody>
        <tr>
          <th><strong>No</strong></th>
          <th><strong>Video</strong></th>
         
        
          <th><strong>Action</strong></th>
        </tr> 

        <tr>


                    <?php

                       $fetchVideos = mysqli_query($conn, "SELECT * FROM video");
                     $j=0; while($data = mysqli_fetch_array($sql)){ $j++;?>
          
            <td><?php echo $j; ?></td>

                               
            <td><?php
              
              $location = $data['location'];

       //echo "<br >";
       echo "<center >";
       echo "<div >";
       echo "<video src='".$location."' controls width='50%' height='50%' >";
       echo "</div>";

      
       // echo "</br >";
           echo "<b>";
         echo $data['VidName'];
          echo "</center>";
           echo "</b>";

        ?>
            </td> 
            <td>

          
          <a href="editvid.php?VidId=<?php echo $data['VidId'] ;?>" class="button" >Update</a>&nbsp;<a href="deletevideo.php?VidId=<?php echo $data["VidId"];?>" class="button">Delete</a></td>
    </tr>
        <!--   <input type='file' name='file' /> -->
            
            </form>

          </td>

          </tr>


    </body>

    <?php } ?>
        </tbody>
      </table>
</html>
 </head>



<!-- <?php
// include("connection.php");
?>
<!doctype html>
<html>
  <head>
    <style>
    video{
     float: left ;
     text-align: center;
     padding-left: 25%;
    }
    </style>
  </head>
  <body>
    <div>
 
     <?php
     // $fetchVideos = mysqli_query($conn, "SELECT location FROM video ORDER BY VidId DESC");
     // while($row = mysqli_fetch_assoc($fetchVideos)){
     //   $location = $row['location'];
      
     //   echo "<div >";
     //   echo "<video src='".$location."' controls width='50%' height='50%' >";
     //   echo "</div>";
     
     ?>
 
    </div>

  </body>
</html> -->

<!-- <form method="post" action="editvid.php">
          
          <input type='submit' value='Update' name='Update'>
            </form> -->