<?php 
#index.php
$pageTitle = "View All Users";
include ('Templates/header.html');

//connect to the db
require ('../../../PHP_Book_MySQL_Connection.php');
        
//Make the query
$query = "SELECT last_name, first_name, DATE_FORMAT(registration_date, '%M %d %Y') AS dr, user_id 
FROM users 
ORDER BY registration_date ASC";

//run the query
$result = @mysqli_query ($dbc, $query);

$num = mysqli_num_rows ($result);

if ($num >0){
    
    echo "<p>There are currently $num registered users.</p>";
    
    echo '<table style="margin: auto;"><tr><th>Edit</th><th>Delete</th><th>First Name</th><th>Last Name</th><th>Registration Date</th></tr>';
    
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        echo '<tr><td><a href="edit_user.php?id=' . $row['user_id'] . '">EDIT</a></td><td><a href="delete_user.php?id=' . $row['user_id'] . '">DELETE</a></td><td>' . $row['last_name'] . '</td><td>' . $row['first_name'] . '</td><td>' . $row['dr'] . '</td></tr>';
    }
    echo '</table>';
    
    mysqli_free_result($result);
}else{//error with query
    
    echo 'There are NO registered users.</p>';
    
}

mysqli_close($dbc);

include ('Templates/footer.html');
?>