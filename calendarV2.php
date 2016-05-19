<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Calendar v2</title>
</head>
<body>
    <form action="calendar.php" method="post">
<?php

# Script 2.9 - calendarV2.php
# Created 19 May 2016
# Created by Simon Smale
# This script generates a calender selector using php.
#v2 using for loops in place for the foreach.

        //Make the month array
$months = array (1 => 'Jan', 'Feb', 'March', 'April', 'May', 'June', 'July', 'Aug', 'Sept', 'Nov', 'Dec');
                
        //Generate Form
        //days
        echo '<select name="day">';
        for($day = 1; $day <=31; $day++){
            echo "<option value=\"$day\"> $day </option>\n";
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
        for($year =1900; $year <=2100; $year++){
            echo "<option value=\"$year\"> $year </option>\n";
        }
        echo '</select>';
?>
    </form>
    
</body>
</html>