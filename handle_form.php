<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Form Feedback</title>
</head>
<body>
<?php

# Script 2.2 - handle_form.php
# Created 22 April 2016
# Created by Simon Smale
# This script handles the HTML form and prints the input back to the user.

    
    //create shorthand variable names.
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $comments=$_REQUEST['comments'];

    /*not used
    $_REQUEST['age']
    $_REQUEST['gender']
    $_REQUEST['submit']
    */
    
    //print the submited info back to the user.
    echo "<p>Thanks <b>$name</b>, for the following comments: <b>$comments</b>. We will reply to you at <b>$email</b>.</p>"

?>
</body>
</html>