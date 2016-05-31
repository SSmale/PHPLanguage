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
        
        $file_size = round((filesize("$dir/$image"))/ 1024) . "kb";
        
        $image_date = date("F d, Y H:i:s", filemtime("$dir/$image"));
        
        echo "<li><a href=\"javascript:create_window('$image_name', '$image_size[0]', '$image_size[1]')\">$image</a>$file_size ($image_date)</li>\n";
        
    }
    
}

echo '</ul>';

include ('Templates/footer.html');
?>