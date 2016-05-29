<?php 
#index.php
$pageTitle = "Upload an Image";
include ('Templates/header.html');

        
    echo '<h1>Upload an Image</h1>';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        if (isset($_FILES['upload'])){
             
            $allowed = array ('image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png');
            
            if (in_array($_FILES['upload']['type'], $allowed)){
                
                if (move_uploaded_file ($_FILES['upload']['tmp_name'], "../../../PHPTest_Uploads/{$_FILES['upload']['name']}")){
                    echo '<p>File uploaded!</p>';
                }else{
                    echo 'File not moved';
                }
                
            }else{
                echo '<p>Invalid file. Please upload a JPEG or PNG</p>';
            }
            
        }
         
        if ($_FILES['upload']['error'] > 0){
            
            echo'<p>The file could not be uploaded because:<strong>';
            
            switch ($_FILES['upload']['error']){
                case 1:
                    print 'The file exceeds the max PHP file size';
                    break;
                case 2:
                    print 'The file exceeds the max form size';
                    break;
                case 3:
                    print 'The file was partially uploaded';
                    break;
                case 4:
                    print 'No file uploaded';
                    break;
                case 6:
                    print 'Temporary Folder unavaliable';
                    break;
                case 7:
                    print 'Unable to write to disk';
                    break;
                case 8:
                    print 'File upload stopped';
                    break;
                default:
                    print 'A system error accured';
                    break;
            }
            
            echo '</strong></p>';
            
        }
        
        if (file_exists ($_FILES['upload']['tmp_name']) && is_file($_FILES['upload']['tmp_name'])){
            unlink($_FILES['upload']['tmp_name']);
        }
        
    }

?>

        <p>Upload a PNG or JPEG below</p>

        <form enctype="multipart/form-data" action="upload_image.php" method="post">
            <input type="hidden" name="MAX_FILE_SIZE" value="524288"/>
            <fieldset><legend style="max-width: 50%;">Select an image</legend><p><b>File:</b> <input type=file name="upload" /></p></fieldset>
            <p><input type="submit" name="submit" value="Send!"/></p>
        </form>

<?php
include ('Templates/footer.html');
?>