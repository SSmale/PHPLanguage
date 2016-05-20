<?php 

function createPriceRadio($value){
    
    //Start printing the element
   echo '<input type="radio" name="fuelPrice" value=" ' . $value . '"';
    
    //check for sticky
    if (isset($_POST['fuelPrice']) && ($_POST['fuelPrice'] == $value){
        echo 'checked="checked"'; 
    }
    
    //primnt the end of the html and the value
    echo "/> £  $value ";
        
}

$pageTitle = "PHP Fuel Clac";
include ('Templates/header.html');

//Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    //Validate form
    if (isset($_POST['distance'], $_POST['fuelPrice'], $_POST['efficiency']) && is_numeric($_POST['fuelPrice']) && is_numeric($_POST['distance']) && is_numeric($_POST['efficiency'])){
        
        //Calculate the result
        $mpg = $_POST['distance'] / $_POST['efficiency'];
        $cost = $mpg * ($_POST['fuelPrice']*4.54609);
        $hours = $_POST['distance']/65;
        
        //Print Result
        echo '<h1>Total Estimated Cost</h1>
        <p>The cost of driving ' . $_POST['distance'] . 'miles, averaging ' . $_POST['efficiency'] . ' MPG, paying an average of £' . $_POST['fuelPrice'] . ' per litre, is £' . number_format ($cost,2) . '. If you drive at an average of 65 mph, the trip will take approx. ' . number_format ($hours,2) . ' hours </p>';
    
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
        createPriceRadio('0.999');
        createPriceRadio('1.059');
        createPriceRadio('1.109');
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