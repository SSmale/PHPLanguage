<?php 
#register.php
$pageTitle = "Register";
include ('Templates/header.html');

//Create the error array
if ($_SERVER['REQUEST_METHOD'] == 'Post'){
    
    $errors = array();//for storing the errors.

    //Check first name
    if (empty($POST['first_name'])){
        $errors[] = 'You forgot to enter your first name';
    }else{
        $fn = trim($POST['first_name']);
    }
    
        //Check last name
    if (empty($POST['last_name'])){
        $errors[] = 'You forgot to enter your last name';
    }else{
        $ln = trim($POST['last_name']);
    }
    
        //Check email
    if (empty($POST['email'])){
        $errors[] = 'You forgot to enter your email address';
    }else{
        $email = trim($POST['email']);
    }
    
    //Check that the password is present and match.
        //Check first name
    if (empty($POST['pass1'])){
        $errors[] = 'You forgot to enter a password';
    }else{
        if ($POST['pass1'] != $POST['pass2']){
            $errors[] = 'Your passwords do not match';
        }else{
            $pass = trim($POST['pass1']);
        }
    }
    
    //if everything is working 
    if(empty($errors)){
        
        #Register the user.
        
        //connect to the db
        require ('../PHP_Book_MySQL_Connection.php');
        
        //Make the query
        $query = "INSERT INTO users (first_name, last_name, email, pass, registration_date) VALUES ('$fn','$ln','$email', SHA1('$pass'), NOW())";
        
        //run the query
        $result = @mysqli_query ($dbc, $query);
        if ($result){
            //Print a message
            echo '<h1>Thank you!</h1><p>You are now registered!</p><p><br /></p>';
        }else{//error with query
            //Public message
            echo '<h1>System Error</h1><p>You could not be registered at this time. Appologies.</p>';
            
            //Debug
            echo '<p>' . mysqli_error($dbc). '<br /><br /> Query: ' . $query . '</p>';
        }
        
        mysqli_close($dbc);
        include ('Templates/footer.html');
        exit();
        
    }else{
        //Print the form errors
        echo '<h1>Doh</h1><p>';
        foreach ($errors as $msg){
            echo " - $msg<br />\n";
        }
        echo '</p><p>Please try again</p><br />'
    }
    
}//close of the if == post.

?>

<h1>Register Here</h1>

<form action="register.php" method="post">
    <p>First Name: <input type="text" name="first_name" size="15" maxlength="20" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>" /></p>
	<p>Last Name: <input type="text" name="last_name" size="15" maxlength="40" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>" /></p>
	<p>Email Address: <input type="text" name="email" size="20" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"  /> </p>
	<p>Password: <input type="password" name="pass1" size="10" maxlength="20" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>"  /></p>
	<p>Confirm Password: <input type="password" name="pass2" size="10" maxlength="20" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>"  /></p>
	<p><input type="submit" name="submit" value="Register" /></p>
</form>

<?php
include ('Templates/footer.html');
?>