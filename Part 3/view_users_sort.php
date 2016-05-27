<?php 
#index.php
$pageTitle = "View Users";
include ('Templates/header.html');

echo '<h1>View Users</h1>';

require_once ('../../../PHP_Book_MySQL_Connection.php');

$display = 5;

if((isset($_GET['p'])) && (is_numeric($_GET['p']))){
    $pages = $_GET['p'];
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

if((isset($_GET['s'])) && (is_numeric($_GET['s']))){
    $start = $_GET['s'];
}else{
    $start = 0;
}

$sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'rd';

switch ($sort){
    case 'ln':
        $order_by = 'last_name ASC';
        break;
    case 'fn':
        $order_by = 'first_name ASC';
        break;
    case 'rd':
        $order_by = 'registration_date ASC';
        break;
    default:
        $order_by = 'registration_date ASC';
        $sort = 'rd';
        break;
}

$query = "SELECT last_name, first_name, DATE_FORMAT(registration_date, '%M %d %Y') as dr, user_id FROM users ORDER BY $order_by LIMIT $start, $display";
$result = @mysqli_query ($dbc, $query);

echo '<table style="margin: auto;"><tr><th>Edit</th><th>Delete</th><th><a href="view_users_sort.php?&sort=fn">First Name</a></th><th><a href="view_users_sort.php?&sort=ln">Last Name</a></th><th><a href="view_users_sort.php?&sort=rd">Registration Date</a></th></tr>';

$bg = '#000000';

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    
    $bg = ($bg=='#000000' ? '#0000A0' : '#000000');
    
    echo '<tr bgcolor="' . $bg . '"><td><a href="edit_user.php?id=' . $row['user_id'] . '">EDIT</a></td><td><a href="delete_user.php?id=' . $row['user_id'] . '">DELETE</a></td><td>' . $row['first_name'] . '</td><td>' . $row['last_name'] . '</td><td>' . $row['dr'] . '</td></tr>';

}
echo '</table>';

mysqli_free_result($result);
mysqli_close($dbc);

if ($pages > 1){
    
    echo '<br /><p>';
    
    $current_page = ($start/$display) + 1;
    
    if ($current_page != 1){
        echo '<a href="view_users_sort.php?s=' . ($start - $display) . '&p=' . $pages . '&sort=' . $sort . '">Previous</a> ';
    }
    
    for ($i = 1; $i <= $pages; $i++){
        if ($i != $current_page){
            echo '<a href="view_users_sort.php?s=' . (($display * ($i - 1))) . '&p=' . $pages . '&sort=' . $sort .'">' . $i . '</a> ';
        }else{
            echo $i . ' ';
        }
    
    }
    
    if ($current_page != $pages){
        echo '<a href="view_users_sort.php?s=' . ($start + $display) . '&p=' . $pages . '&sort=' . $sort .'">Next</a> ';
    }
    
    echo '</p>';
    
}

include ('Templates/footer.html');
?>