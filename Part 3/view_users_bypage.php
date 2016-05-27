<?php 
#index.php
$pageTitle = "View Users";
include ('Templates/header.html');

echo '<h1>View Users</h1>';

require_once ('../../../PHP_Book_MySQL_Connection.php');

$display = 10;

if((isset($_POST['p'])) && (is_numeric($_POST['p']))){
    $pages = $_POST['p'];
}else{
    
    $query = "SELECT COUNT(user_id) FROM users";
    $result = @mysqli_query ($dbc , $query);
    $row = @mysqli_fetch_array ($result, MYSQLI_NUM);
    $records = $row[0];
    
    if ($records > $display){
        $pages = ceil ($records/$display);
    }else{
        $pages = 1;
    }
    
}

if((isset($_POST['s'])) && (is_numeric($_POST['s']))){
    $start = $_POST['s'];
}else{
    $start = 0:
}

$query = "SELECT last_name, first_name, DATE_FORMAT(registration_date, '%M %d %Y') as dr, user_id FROM users ORDER BY registration_date ASC LIMIT $start, $display";
$result = @mysqli_query ($dbc, $query);

echo '<table style="margin: auto;"><tr><th>Edit</th><th>Delete</th><th>First Name</th><th>Last Name</th><th>Registration Date</th></tr>';

$bg = '#eeeeee';

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    
    $bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee');
    
    echo '<tr bgcolor="' . $bg . '"><td><a href="edit_user.php?id=' . $row['user_id'] . '">EDIT</a></td><td><a href="delete_user.php?id=' . $row['user_id'] . '">DELETE</a></td><td>' . $row['last_name'] . '</td><td>' . $row['first_name'] . '</td><td>' . $row['dr'] . '</td></tr>';

}
echo '</table>';

mysqli_free_result($result);
mysqli_close($dbc);

if ($pages > 1){
    
    echo '<br /><p>';
    
    $current_page = ($start/$display) + 1;
    
    if ($current_page != 1){
        echo '<a href="view_users_bypage.php?s=' . ($start - $display) . '&p=' . $pages . '">Previous</a> ';
    }
    
    for ($i = 1; $i <= $pages; $i++){
        if ($i != $current_page){
            echo '<a href="view_users_bypage.php?s=' . ($display * ($i - 1)) . '&p=' . $pages . '">' . $i . '</a> ';
        }else{
            echo $i . ' ';
        }
    
    }
    
    if ($current_page != $pages){
        echo '<a href="view_users_bypage.php?s=' . ($start + $display) . '&p=' . $pages . '">Next</a> ';
    }
    
    echo '</p>';
    
}

include ('Templates/footer.html');
?>