 
<?php include 'menu.php'; ?>

 <?php
        include("connection.php");



        // if(isset($_POST['editvid'])){

        //   $VidId=$_POST['VidId'];

        // }
      
     $sql = mysqli_query($conn,"SELECT * FROM audio");




   

     // $VidId=$_POST['VidId']; 

        if(isset($_POST['but_upload'])){
            $maxsize = 50000000 ; // 50MB
                       
            $name = $_FILES['file']['name'];
            $target_dir = "audio/";
            $target_file = $target_dir . $_FILES["file"]["name"];

            // Select file type
            $audioFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Valid file extensions
            $extensions_arr = array("aif","cda","midi","mpa","ogg","mp3","wav","wma","wpl");

            // Check extension
            if( in_array($audioFileType,$extensions_arr) ){
                
                // Check file size
                if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
                    echo "File too large. File must be less than 50MB.";
                }else{
                    // Upload
                    if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
                        // Insert record
                        $query = "INSERT INTO audio(AuName,location) VALUES('".$name."','".$target_file."')";

                        mysqli_query($conn,$query);
                        if($query)
              {
              echo "<script>alert('upload successfully!');</script>";
              echo "<meta http-equiv='refresh' content='0; url=audio.php'/>";
              
              }
            }
          }

       }else{
        echo "Invalid file extension.";
         echo "<script>alert('Invalid file extension!');</script>";
        // echo "<meta http-equiv='refresh' content='0; url=audio.php'/>";
       
        
       }
   }
        
        ?>



   


<!doctype html>
<html>
    <head>
    <body>
        <br>
        <h2><center>Compilation Audios &#127911;</center></h2>
        <p><center>Regarding from the videos, these are audios version of it.<br>There are some audios that you may hear to explore more about the inventory that the company supplies. &#128522;</p></center>
        <form method="post" text align="center" action="" enctype='multipart/form-data'>
           <center> <input type='file' name='file' />
            <input type='submit' value='Upload' name='but_upload'></center>
        </form>
        <br>


        <div id="border1">

    <table cellpadding="5" cellspacing="0" margin-left="50%" border="" text align="right" width="80%">
      <tbody>
        <tr>
          <th><strong>No</strong></th>
          <th><strong>Audio</strong></th>
         
        
          <th><strong>Action</strong></th>
        </tr> 

        <tr>


                    <?php

                     $fetchAudios = mysqli_query($conn, "SELECT * FROM audio");

                     $j=0; while($data = mysqli_fetch_array($sql)){ $j++;?>
          
            <td><?php echo $j; ?></td>

                               
            <td><?php
              
              $location = $data['location'];

       //echo "<br >";
       echo "<center >";
       echo "<div >";
       echo "<audio src='".$location."' controls width='50%' height='50%' >";
       echo "</div>";

      
       // echo "</br >";
           echo "<b>";
         echo $data['AuName'];
          echo "</center>";
           echo "</b>";

        ?>
            </td> 
            <td>
      
          
          <a href="editaudio.php?AuId=<?php echo $data['AuId'] ;?>" >Update</a>&nbsp;<a href="deleteaudio.php?AuId=<?php echo $data["AuId"];?>" class="button">Delete</a></td>
        
            
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