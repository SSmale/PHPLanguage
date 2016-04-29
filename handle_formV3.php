<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Form Feedback</title>
    <style type="text/css" title="text/css" media="all">
	.error {
		font-weight: bold;
		color: #C00;
	}
    </style>
</head>
<body>
<?php

# Script 2.4 - handle_formV3.php 
# Created 29 April 2016
# Created by Simon Smale
# This script handles the HTML form and validates the data before printing to screen.
    
// Validate the name
if (!empty($_REQUEST['name'])) {
    $name = $_REQUEST['name'];
} else {
    $name = null;
    echo '<p class="error">You forgot to enter your name!</p>';
}
        
//Validate the email
if (!empty($_REQUEST['email'])) {
    $email = $_REQUEST['email'];
} else {
    $email = null;
    echo '<p class="error">You forgot to enter your email!</p>';
}
        
//Validate the comment
if (!empty($_REQUEST['comments'])) {
    $comments = $_REQUEST['comments'];
} else {
    $comments = null;
    echo '<p class="error">You forgot to enter your comment!</p>';
}

// Validate the gender
if (isset($_REQUEST['gender'])) {
            
    $gender = $_REQUEST['gender'];
            
    // Print a message based upon the gender value:
    if ($gender == 'M') {
        $greeting = '<p><b>Good day, Sir!</b></p>';
    } elseif ($gender == 'F') {
         $greeting =  '<p><b>Good day, Madam!</b></p>';
    } else { // Invalid Response
        $gender = NULL;
        echo '<p class="error"><b>Gender is ether Male or Female</b></p>';
    }
            
} else {//No gender selected
    $gender = NULL;
    echo '<p class="error">You forgot to select your gender</p>';
}

// If all is ok print the message
if ($name && $email && $gender && $comments) {
    echo "<p>Thank you, <b>$name</b>, for the following comments:<br />
    <tt>$comments</tt></p>
    <p>We will reply to you at <i>$email</i>.</p>\n";
    
    echo $greeting;
    
} else {// missing something
    echo '<p class="error">Please go back and fill in the form again.</p>';   
}
    
?>
</body>
</html>