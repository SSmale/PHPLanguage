<?php 

function createRadio($value, $name = 'fuelPrice'){
    
    //Start printing the element
   echo '<input type="radio" name="'.$name.'" value=" ' . $value . '"';
    
    //check for sticky
    if (isset($_POST[$name]) && ($_POST[$name] == $value)){
        echo 'checked="checked"'; 
    }
    
    //primnt the end of the html and the value
    echo "/> $value ";
        
}
function calcTripCost($distance, $efficiency, $fuelPrice){
    
    $mpg = $_POST['distance'] / $_POST['efficiency'];
    $pounds = $mpg * ($_POST['fuelPrice']*4.54609);
    return number_format ($pounds,2);
}

$pageTitle = "PHP Fuel Clac";
include ('Templates/header.html');

//Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    //Validate form
    if (isset($_POST['distance'], $_POST['fuelPrice'], $_POST['efficiency']) && is_numeric($_POST['fuelPrice']) && is_numeric($_POST['distance']) && is_numeric($_POST['efficiency'])){
        
        //Calculate the result
        $cost = calcTriopCost($_POST['distance'], $_POST['efficiency'], $_POST['fuelPrice']);
        $hours = $_POST['distance']/65;
            
        //Print Result
        echo '<h1>Total Estimated Cost</h1>
        <p>The cost of driving ' . $_POST['distance'] . 'miles, averaging ' . $_POST['efficiency'] . ' MPG, paying an average of £' . $_POST['fuelPrice'] . ' per litre, is £' . $cost . '. If you drive at an average of 65 mph, the trip will take approx. ' . number_format ($hours,2) . ' hours </p>';
    
    }else{
    
    echo '<h1>ERROR</h1>
    <p class="error">Please resubmot the form!</p>';
    
    }
    
}

?>

<h1>Fuel Cost</h1>

<form action="calcV3.php" method="post">
    <p>Distance in miles: <input type="text" name="distance" value="<?php if (isset($_POST['distance'])){ echo $_POST['distance']; } ?>"/></p>
    <p>Ave. Price per Litre: <span class="input">
        <?php
        createRadio('0.999');
        createRadio('1.059');
        createRadio('1.109');
        ?>
    </span></p>
    <p>Fuel Efficency: <select name="efficiency">
        <option value="10" <?php if (isset($_POST['efficiency']) && ($_POST['efficiency'] == '10')){ echo 'selected="selected"'; } ?>>Terrible</option>
        <option value="20" <?php if (isset($_POST['efficiency']) && ($_POST['efficiency'] == '20')){ echo 'selected="selected"'; } ?>>Low</option>
        <option value="30" <?php if (isset($_POST['efficiency']) && ($_POST['efficiency'] == '30')){ echo 'selected="selected"'; } ?>>Average</option>
        <option value="40" <?php if (isset($_POST['efficiency']) && ($_POST['efficiency'] == '40')){ echo 'selected="selected"'; } ?>>Decent</option>
        <option value="50" <?php if (isset($_POST['efficiency']) && ($_POST['efficiency'] == '50')){ echo 'selected="selected"'; } ?>>Very Good</option>
        <option value="60" <?php if (isset($_POST['efficiency']) && ($_POST['efficiency'] == '60')){ echo 'selected="selected"'; } ?>>Outstanding</option>
    </select></p>
    <p><input type="submit" name="submit" value="CALCULATE!" /></p>
</form>    
    
<?php
include ('Templates/footer.html');
?>