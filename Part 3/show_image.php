<?php 

$name = FALSE;

if (isset($_GET['image'])){
    
    $ext = strtolower(substr($_GET['image'], -4));
    
    if (($ext == '.jpg') OR ($ext == 'jpeg') OR ($ext == '.png')){
        
        $image = "../../../PHPTest_Uploads/{$_GET['image']}";
        
        if (file_exists ($image) && (is_file($image))){
            
            $name = £_GET['image'];
            
        }
        
    }
    
}

if (!$name) {
	$image = 'Images/unavailable.png';	
	$name = 'unavailable.png';
}

$info = getimagesize($image);
$filesize = filesize($image);

header ("Content-Type: {$info['mime']}\n");
header ("Content_Disposition: inline; filename=\"$name\"\n");
header ("Content_Length: $filesize\n");

readfile($image);