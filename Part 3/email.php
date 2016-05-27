<?php 
#index.php
$pageTitle = "Contact Me";
include ('Templates/header.html');

        
    echo '<h1>Contact Me</h1>';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['comments'])){
             
            $body = "Name : {$_POST['name']}\n\nFrom: {$_POST['email']}\n\nComments: {$_POST['comments']}";
             
            $body = wordwrap($body, 70);

            $to = 'simon@smalemail.net';

            $subject = 'Contact Form Submission';

            $headers = "From: commentstest\r\n";
                
            //$headers .= "Cc: simonsmale@protonmail.com\r\n";

            mail($to, $subject, $body, $headers);

            echo '<p>Thanks, ill get back to you soon!</p>';

            $_POST = array();

        }else{
            echo '<p>Please fill out the form completly</p>';
        }

    }       

?>

        <p>Please contact me via the form below</p>

        <form action="email.php" method="post">
            <p>Name: <input type="text" name="name" size="30" maxlength="60" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>"/></p>
            <p>Email Address: <input type="text" name="email" size="30" maxlength="80" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"/></p>
            <p>Comments: <textarea name="comments" row="5" cols="30"><?php if (isset($_POST['comments'])) echo $_POST['comments']; ?></textarea></p>
            <p><input type="submit" name="submit" value="Send!"/></p>
        </form>

<?php
include ('Templates/footer.html');
?>