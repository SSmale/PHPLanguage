<?php 
#register.php
$pageTitle = "Change Password";
include ('Templates/header.html');

//Create the error array
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    //connect to the db
    require ('../../../PHP_Book_MySQL_Connection.php');
    
    $errors = array();//for storing the errors.
    
    //Check email
    if (empty($_POST['email'])){
        $errors[] = 'You forgot to enter your email address';
    }else{
        $email = mysqli_real_escape_string($dbc, trim($_POST['email']));
    }
    
    //Check old password
    if (empty($_POST['pass3'])){
        $errors[] = 'You forgot to enter your old password';
    }else{
        $email = mysqli_real_escape_string($dbc, trim($_POST['pass3']));
    }
    
    //Check that the password is present and match.
        //Check first name
    if (empty($_POST['pass1'])){
        $errors[] = 'You forgot to enter a password';
    }else{
        if ($_POST['pass1'] != $_POST['pass2']){
            $errors[] = 'Your passwords do not match';
        }else{
            $pass = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
        }
    }
    
    //if everything is working 
    if(empty($errors)){
                        
        //Make the query
        $query = "SELECT user_id FROM users WHERE (email='$email' AND pass=SHA1('$pass3'))";
        
        //run the query
        $result = @mysqli_query ($dbc, $query);
        
        //count the no of records updated
        $num = mysqli_num_rows($result);
        if ($num == 1){
            
            //get the user id
            $row = mysqli_fetch_array($result, MYSQLI_NUM);
            
            //make the update query
            $query = "UPDATE users SET pass=SHA1('$pass1') WHERE user_id=$row[0]";
            
            //run the update querry
            $result = @mysqli_query($dbc,$query);
            
            if (mysqli_affected_rows($dbc) == 1){
            
                //Print a message
                echo '<h1>Thank you!</h1><p>Your password has been changed</p><p><br /></p>';
                
            }else{//error with query
                //Public message
                echo '<h1>System Error</h1><p>Password cant be changed. Appologies.</p>';
            
                //Debug
                echo '<p>' . mysqli_error($dbc). '<br /><br /> Query: ' . $query . '</p>';
            }
            
            mysqli_close($dbc);
            include ('Templates/footer.html');
            exit();
            
        }else{
            echo '<h1>Error!</h1><p>The username/password didnt match our records</p>';
        }
            
    }else{
        //Print the form errors
        echo '<h1>Doh</h1><p>';
        foreach ($errors as $msg){
            echo " - $msg<br />\n";
        }
        echo '</p><p>Please try again</p><br />';
    }
    
    mysqli_close($dbc);

}//close of the if == post.

?>

<h1>Change Password</h1>

<form action="password.php" method="post">
    <p>Email Address: <input type="text" name="email" size="20" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"  /> </p>
    <p>Old Password: <input type="password" name="pass3" size="15" maxlength="20" value="<?php if (isset($_POST['pass3'])) echo $_POST['pass3']; ?>" /></p>
    <p>New Password: <input type="password" name="pass1" size="10" maxlength="20" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>"  /></p>
	<p>Confirm Password: <input type="password" name="pass2" size="10" maxlength="20" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>"  /></p>
	<p><input type="submit" name="submit" value="Register" /></p>
</form>

<?php
include ('Templates/footer.html');
?>