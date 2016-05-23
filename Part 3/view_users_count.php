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

$num = mysqli_num_rows ($result);

if ($num >0){
    
    echo "<p>There are currently $num registered users.</p>";
    
    echo '<table><tr><td>Name</td><td>Registration Date</td></tr>';
    
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        echo '<table><tr><td>' . $row['name'] . '</td><td>' . $row['dr'] . '</td></tr>';
    }
    echo '</table>';
    
    mysqli_free_result($result);
}else{//error with query
    
    echo 'There are NO registered users.</p>';
    
}

mysqli_close($dbc);

include ('Templates/footer.html');
?>