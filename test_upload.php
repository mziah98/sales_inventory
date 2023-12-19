
        <?php
        include("connection.php");
     

        if(isset($_POST['but_upload'])){
            $maxsize = 50000000 ; // 5MB
                       
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
                    echo "File too large. File must be less than 5MB.";
                }else{
                    // Upload
                    if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
                        // Insert record
                        $query = "INSERT INTO video(VidName,location) VALUES('".$name."','".$target_file."')";

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

        <form method="post" action="" enctype='multipart/form-data'>
            <input type='file' name='file' />
            <input type='submit' value='Upload' name='but_upload'>
        </form>

    </body>
</html>
 </head>



