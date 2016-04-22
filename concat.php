<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Concatenation</title>
</head>
<body>
<?php

# Script 1.7 - concat.php
# Created 22 April 2016
# Created by Simon Smale
# This script shows the use of Concatenation with String Variables.

$firstName = 'Simon';
    $secondName = 'Smale';
    $book = 'Strings';
    $author = $firstName . ' ' . $secondName;
    
    echo"<p>The web page <em>$book</em>
    was writen by $author.</p>"

?>
</body>
</html>