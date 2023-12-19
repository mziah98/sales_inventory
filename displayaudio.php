 
<?php include 'menu.php'; ?>

 <?php
        include("connection.php");
     
?>

<?php
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
                        echo "Upload successfully.";
                        
                    }
                }

            }else{
                echo "Invalid file extension.";
            }
        
        }
        ?>


   


<!doctype html>
<html>
    <head>
    <body>
        <br>
        <h3><center>Audio</center></h3>
        <form method="post" text align="center" action="" enctype='multipart/form-data'>
            <input type='file' name='file' />
            <input type='submit' value='Upload' name='but_upload'>
        </form>
        <br><br>
    </body>
</html>
 </head>



<?php
include("connection.php");
?>
<!doctype html>
<html>
  <head>
    <style>
    audio{
     float: left ;
     text-align: center;
     padding-left: 40%;
    }
    </style>
  </head>
  <body>
    <div>
 
     <?php
     $fetchAudios = mysqli_query($conn, "SELECT location FROM audio ORDER BY AuId DESC");
     while($row = mysqli_fetch_assoc($fetchAudios)){
       $location = $row['location'];
 
       echo "<div >";
       echo "<audio src='".$location."' controls width='30%' height='30%' >";
       echo "</div>";
     }
     ?>
 
    </div>

  </body>
</html>
