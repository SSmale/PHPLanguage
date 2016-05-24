<?php 
#index.php
$pageTitle = "Delete a User";
include ('Templates/header.html');

echo '<h1>Delete a User</h1>';

if ((isset($_GET['id'])) && (is_numeric($_GET['id']))){
    $id = £_GET['id'];
}elseif((isset($_POST['id'])) && (is_numeric($_POST['id']))){
    $id = £_POST['id'];
}else{
    echo '<p>This page has been accessed in error <a href="activity2.php">Click Here</a> to return.</p>';
    include ('Templates/footer.html');
    exit();
}

require_once ('../../../PHP_Book_MySQL_Connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    if ($_POST['sure'] == 'Yes'){
        
        $query = "DELETE FROM users WHERE user_id=$id LIMIT 1";
        $result = @mysqli_query($dbc, $query);
        if (mysqli_affected_rows($dbc) == 1){
            
            echo '<p>The user has been deleted</p>';
            
        }else{
            
            //Public message
            echo '<h1>System Error</h1><p>The user couldnt be deleted. Appologies.</p>';
            
            //Debug
            echo '<p>' . mysqli_error($dbc). '<br /><br /> Query: ' . $query . '</p>';
            
        }
        
    }else {
        
        echo '<p>The user has <b>NOT</b> been deleted.</p>';
    }
    
}else{
    
    $query = "SELECT CONCAT(last_name, ', ', first_name) FROM users WHERE user_id=$id";
    $result = @mysqli_query($dbc, $query);
    
    if (mysqli_num_rows($result) == 1){
                
        $row = mysqli_fetch_array ($result, MYSQLI_NUM);
        echo"<h3>Name: $row[0]</h3> Are you sure you want to delete this user?";
        
        // Create the form:
		echo '<form action="delete_user.php" method="post">
	   <input type="radio" name="sure" value="Yes" /> Yes 
	   <input type="radio" name="sure" value="No" checked="checked" /> No
	   <input type="submit" name="submit" value="Submit" />
	   <input type="hidden" name="id" value="' . $id . '" />
	   </form>';
        
    }else{
        
        echo '<p>This page has been accessed in error <a href="activity2.php">Click Here</a> to return.</p>';

    }
}

mysqli_close($dbc);

include ('Templates/footer.html');
?>