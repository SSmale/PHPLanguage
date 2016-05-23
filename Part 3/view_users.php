<?php 
#index.php
$pageTitle = "View All Users";
include ('Templates/header.html');

//connect to the db
require ('../../../PHP_Book_MySQL_Connection.php');
        
//Make the query
$query = "SELECT CONCAT(last_name, ', ', first_name) AS name, DATE_FORMAT(registration_date, '%M %d %Y') AS dr 
FROM users 
ORDER BY registration_date ASC";

//run the query
$result = @mysqli_query ($dbc, $query);

if ($result){
    echo '<table><tr><td>Name</td><td>Registration Date</td></tr>';
    
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        echo '<table><tr><td>' . $row['name'] . '</td><td>' . $row['dr'] . '</td></tr>';
    }
    echo '</table>';
    
    mysqli_free_result($result);
}else{//error with query
    //Public message
    echo '<h1>System Error</h1><p>The current users can\'t be loaded at this time. Appologies.</p>';
        
    //Debug
    echo '<p>' . mysqli_error($dbc). '<br /><br /> Query: ' . $query . '</p>';
}

mysqli_close($dbc);

include ('Templates/footer.html');
?>