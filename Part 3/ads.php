<?php 

function createAd(){
    echo '<p style="background-color: red">I\'m an annoying advert</p>';
}

#index.php
$pageTitle = "Welcome to Simon's PHP Sandbox";
include ('Templates/header.html');

createAd();
?>

<h1>Welcome to my Home Page</h1>

<p>FILL ME UP PLEASE!!!!</p>

<?php
createAd();
include ('Templates/footer.html');
?>