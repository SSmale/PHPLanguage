<?php 
#index.php
$pageTitle = "View an Image";
include ('Templates/headerjs.html');
        
echo '<h1>Click on an Image to view it!</h1>';

echo '<ul>';

$dir = '../../../PHPTest_Uploads';

$files = scandir($dir);

foreach ($files as $image){
    
    if (substr($image, 0, 1) != '.'){
        
        $image_size = getimagesize("$dir/$image");
        
        $image_name = urlencode($image);
        
       echo "<li><a href=\"javascript:create_window('$image_name', '$image_size[0]', '$image_size[1]')\">$image</a></li>\n";
        
    }
    
}

echo '</ul>';

include ('Templates/footer.html');
?>