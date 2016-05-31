<?php 
#index.php
$pageTitle = "Login";
include ('Templates/header.html');

if (isset($errors) && !empty($erros)){
    echo '<h1>Doh</h1><p>';
    foreach ($errors as $msg){
        echo " - $msg<br />\n";
    }
    echo '</p><p>Please try again</p><br />';
}

?>
<p>Enter your Credentials</p>

<form action="login.php" method="post">
    <p>Email Address: <input type="text" name="email" size="20" maxlength="60"/> </p>
	<p>Password: <input type="password" name="pass1" size="10" maxlength="20"/></p>
    <p><input type="submit" name="submit" value="Login"/></p>
</form>

<?php
include ('Templates/footer.html');
?>