<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Comments</title>
</head>
<body>
    <form action="calendar.php" method="post">
<?php

# Script 2.6 - calendar.php
# Created 19 May 2016
# Created by Simon Smale
# This script generates a calender selector using php.

        //Make the month array
$months = array (1 => 'Jan', 'Feb', 'March', 'April', 'May', 'June', 'July', 'Aug', 'Sept', 'Nov', 'Dec');
      //Make the days and years using range()
        $days = range (1, 31);
        $years = range (1900,2100);
        
        //Generate Form
        //days
        echo '<select name="day">';
        foreach($days as $key => $value){
            echo "<option value=\"$key\"> $value </option>\n";
        }
        echo '</select>';
        
                //months
        echo '<select name="month">';
        foreach($months as $value){
            echo "<option value=\"$value\"> $value </option>\n";
        }
        echo '</select>';
        
                //years
        echo '<select name="year">';
        foreach($years as $value){
            echo "<option value=\"$value\"> $value </option>\n";
        }
        echo '</select>';
?>
    </form>
    
</body>
</html>