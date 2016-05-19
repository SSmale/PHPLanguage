<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Constants</title>
</head>
<body>
<?php

# Script 1.9 - constants.php
# Created 22 April 2016
# Created by Simon Smale
# This script shows the use of comments.

    //set todays date
    define ('TODAY', '22 April 2016');
    
    //print a message using the TODAY and predefined Constants
    echo '<p>Today is ' .TODAY . '<br /> This Server is running version <b>' . PHP_VERSION . '</b> of PHP on the <b>' . PHP_OS . '</b> Operating System.</p>';

?>
</body>
</html>