<?php 
#index.php
$pageTitle = "Edit a User";
include ('Templates/header.html');

echo '<h1>Edit a User</h1>';

if ((isset($_GET['id'])) && (is_numeric($_GET['id']))){
    $id = $_GET['id'];
}elseif((isset($_POST['id'])) && (is_numeric($_POST['id']))){
    $id = $_POST['id'];
}else{
    echo '<p>This page has been accessed in error <a href="activity2.php">Click Here</a> to return.</p>';
    include ('Templates/footer.html');
    exit();
}

require_once ('../../../PHP_Book_MySQL_Connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $errors = array();
    
    //Check first name
    if (empty($_POST['first_name'])){
        $errors[] = 'You forgot to enter your first name';
    }else{
        $fn = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
    }
    
    //Check last name
    if (empty($_POST['last_name'])){
        $errors[] = 'You forgot to enter your last name';
    }else{
        $ln = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
    }
    
    //Check email
    if (empty($_POST['email'])){
        $errors[] = 'You forgot to enter your email address';
    }else{
        $email = mysqli_real_escape_string($dbc, trim($_POST['email']));
    }
    
    if (empty($errors)){
        
        $query = "SELECT user_id FROM users WHERE email='$email' AND user_id != $id";
        $result = @mysqli_query($dbc, $query);
        if (mysqli_affected_rows($dbc) == 0){ //Email Address is unique or the same as the current users 
            
            $query = "UPDATE users SET first_name='$fn', last_name='$ln', email='$email' WHERE user_id=$id LIMIT 1";
            $result = @mysqli_query($dbc, $query);
            if (mysqli_affected_rows($dbc) == 1){
            
                echo '<p>The user has been edited</p>';
            
            }else{
            
                //Public message
                echo '<h1>System Error</h1><p>The user couldnt be deleted. Appologies.</p>';
            
                //Debug
                echo '<p>' . mysqli_error($dbc). '<br /><br /> Query: ' . $query . '</p>';
            
            }
            
        }else{
            
            //Public message
            echo '<p>The email address ' . $email . ' has already been registered</p>';
        
        }
        
    }else{
        
        echo '<p>The following errors accured:';
        foreach ($errors as $msg){
            echo " - $msg\n";
        }
        echo '</p><p>Please try again</p>';
        
    }
    
}
     
$query = "SELECT last_name, first_name, email FROM users WHERE user_id=$id";
$result = @mysqli_query($dbc, $query);
if (mysqli_num_rows($result) == 1){
                
    $row = mysqli_fetch_array ($result, MYSQLI_NUM);
    echo"<h3>Name: $row[0]</h3> Are you sure you want to delete this user?";
        
    // Create the form:
	echo '<form action="edit_user.php" method="post">
    <p>First Name: <input type="text" name="first_name" size="15" maxlength="20" value="' . $row[1] . '" /></p>
	<p>Last Name: <input type="text" name="last_name" size="15" maxlength="40" value="' . $row[0] . '" /></p>
	<p>Email Address: <input type="text" name="email" size="20" maxlength="60" value="' . $row[2] . '" /> </p>
	<input type="submit" name="submit" value="Submit" />
	<input type="hidden" name="id" value="' . $id . '" />
	</form>';
        
}else{
        
    echo '<p>This page has been accessed in error <a href="activity2.php">Click Here</a> to return.</p>';

}

mysqli_close($dbc);

include ('Templates/footer.html');
?>