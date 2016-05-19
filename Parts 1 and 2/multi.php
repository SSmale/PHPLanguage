<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>MultiDimention Array</title>
</head>
<body>
    <p>Some counties and thier towns</p>
    <?php

    # Script 2.7 - multi.php
    # Created 19 May 2016
    # Created by Simon Smale
    # This script prints out elements of a multidimentional array.

        //Make the town array for Dorset
        $dorset = array(
        'BH' => 'Bournemouth',
        'DT' => 'Dorchester'
        );

        //Make the town array for Hampshire
        $hants = array(
        'PO' => 'Portsmouth',
        'SO' => 'Southampton'
        );
    
        //Make the town array for Surrey
        $surrey = array(
        'RH' => 'Redhill',
        'RG' => 'Reigate'
        );
    
        //Combine the arrays
        $england = array(
        'Dorset' => $dorset,
        'Hampshire' => $hants,
        'Surrey' => $surrey
        );
    
        //Loop the counties
        foreach($england as $county => $list){
            //print heading
            echo"<h2>$county</h2><ul>";
            
            //print each town
            foreach($list as $key => $value){
                echo "<li>$key - $value</li>\n";
            }//END of Inner loop
            
            //Close the list tag
            echo '</ul>';
        }//END of Outer loop
    ?>
    
</body>
</html>