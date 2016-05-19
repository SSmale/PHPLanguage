<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Sorting Arrays</title>
</head>
<body>

    <table border="0" cellspacing="3" cellpadding="3" align="center">
        <tr>
        <td><h2>Rating</h2></td>
        <td><h2>Title</h2></td>
        </tr>
    <?php

    # Script 2.8 - sorting.php
    # Created 19 May 2016
    # Created by Simon Smale
    # This script pritns a table form of an array and then sorts and reprints the information.

    $movies = array(
    'Thor' => 10,
    'GOTG' => 10,
    'After Earth' => 2,
    'Rocky' => 7,
    'Plastic' => 8,
    'Spiderman' => 7,
    'Love Actually' => 4
    );
    
    //Display the original order
    echo '<tr><td colspan="2"><b>In original order:</b></td></tr>';
    
    foreach ($movies as $title => $rating){
        echo "<tr><td>$rating</td><td>$title</td></tr>\n";
    }
    
    //sort by name and display
    ksort($movies);
    
        echo '<tr><td colspan="2"><b>sorted by title:</b></td></tr>';
    
    foreach ($movies as $title => $rating){
        echo "<tr><td>$rating</td><td>$title</td></tr>\n";
    }
    
    //sort by rating and display
    arsort($movies);
    
        echo '<tr><td colspan="2"><b>sorted by title:</b></td></tr>';
    
    foreach ($movies as $title => $rating){
        echo "<tr><td>$rating</td><td>$title</td></tr>\n";
    }

    ?>
     
    </table>
    
</body>
    
</html>