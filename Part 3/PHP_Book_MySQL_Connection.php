<?php 

# Connects to the Test DB for the larry ullman book.
# Stored outside the accessable pages (var/www/).

//Define the access information.
DEFINE ('DB_USER','PHPBook');
DEFINE ('DB_PASSWORD','LarryUllman');
DEFINE ('DB_Host','localhost');
DEFINE ('DB_NAME','PHP_Book_DB');

//Make the connection or log errors.
$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die ('Could not connect to DB : ' . mysqli_connect_error());

// Set the encoding
mysqli_set_charset($dbc, 'utf8');