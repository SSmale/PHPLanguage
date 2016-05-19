<?php 
$pageTitle = "PHP Fuel Clac";
include ('Templates/header.html');

//Check if the form was submitted
if ($_SERVER['REQUEST_METHOD]=='POST'){
    
    //Validate form
    if (isset($_POST['distance'], $_POST['fuelPrice'], $_POST['efficiency']) && is_numeric($_POST['fuelPrice']) && is_numeric($_POST['distance']) && is_numeric($_POST['efficiency'])){
        
        //Calculate the result
        $mpg = $_POST['distance'] / $_POST['efficiency'];
        $cost = $mpg * $_POST['fuelPrice'];
        $hours - $_POST['distance']/65;
        
        //Print Result
        echo '<h1>Total Estimated Cost</h1>
        <p>The cost of driving ' . $_POST['distance'] . 'miles, averaging ' . $_POST['efficiency'] . ' MPG, paying an average of £ ' . $_POST['fuelCost'] . ' per litre, is £' . number_format ($cost,2) . '. If you drive at an average of 65 mph, the trip will take approx. ' . number_format ($hours,2) . ' hours </p>';
    
    }else{
    
    echo '<h1>ERROR</h1>
    <p class="error">Please resubmot the form!</p>';
    
    }
    
}

?>

<h1>Fuel Cost</h1>

<form action="calc.php" method="post">
    <p>Distance in miles: <input type"text" name="distance" /></p>
    <p>Ave. Price per Litre: <span class="input">
        <input type="radio" name="fuelPrice" value="0.999"/> 99.9
        <input type="radio" name="fuelPrice" value="1.059"/> 105.9
        <input type="radio" name="fuelPrice" value="1.109"/> 110.9
    </span></p>
    <p>Fuel Efficency: <select name="efficiency">
        <option value="10">Terrible</option>
        <option value="20">Low</option>
        <option value="30">Average</option>
        <option value="40">Decent</option>
        <option value="50">Very Good</option>
        <option value="60">Outstanding</option>
    </select></p>
    <p><input type="submit" name="submit" value="CALCULATE!" /></p>
</form>    
    
<?php
include ('Templates/footer.html');
?>