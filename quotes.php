<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Quotes</title>
</head>
<body>
<?php

# Script 1.10 - quotes.php
# Created 22 April 2016
# Created by Simon Smale
# This script shows the use of Quotes .

//set the variables
$qty = 30; // number they buy
$price = 119.95;
$taxRate = .2; //20% tax (UK VAT)
    
//calc the total
$total = $qty*$price;
$total = $total + ($total * $taxRate);
// calulate then add tax
    
//Format
$total = number_format ($total, 2);
    
//print to screen using Double Quotes.
    echo "Print with \"";
echo "<p>You are purchasing <b> . $qty . </b> widget(s) at a cost of <b>£ . $price . </b> each. \nWith VAT the total comes to <b>£ . $total . </b>.</p>";
    
    //print to screen using single Quotes.
    echo "Print with \'";
echo '<p>You are purchasing <b> . $qty . </b> widget(s) at a cost of <b>£ . $price . </b> each. \nWith VAT the total comes to <b>£ . $total . </b>.</p>';

?>    
</body>
</html>