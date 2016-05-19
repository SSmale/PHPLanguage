<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Form Feedback</title>

</head>
<body>
<?php

# Script 2.5 - handle_formV4.php 
# Created 29 April 2016
# Created by Simon Smale
# This script handles the HTML form and validates the data before printing to screen.
# Using the $post superglobal variable. 
    
// Validate the name
if (!empty($_POST['name']) && !empty($_POST['comments']) && !empty($_POST['email'])) {
    echo "<p>Thank you, <b>{$_POST['name']}</b>, for the following comments:<br />
    <tt>{$_POST['comments']}</tt></p>
    <p>We will reply to you at <i>{$_POST['email']}</i>.</p>\n";
} else {// missing something
    echo '<p class="error">Please go back and fill in the form again.</p>';   
}
    
?>
</body>
</html>