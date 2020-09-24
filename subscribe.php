<?php

## CONFIG ##

# LIST EMAIL ADDRESS
$recipient = $_REQUEST['Email'];

# SUBJECT (Subscribe/Remove)
$subject = "Subscribe";

# RESULT PAGE
$location = "/";

## FORM VALUES ##

# SENDER - WE ALSO USE THE RECIPIENT AS SENDER IN THIS SAMPLE
# DON'T INCLUDE UNFILTERED USER INPUT IN THE MAIL HEADER!
$sender = "info@gamelancing.com";

# MAIL BODY
$body .= "Hi ".$_REQUEST['Name'].",\n";
$body .= "Thanks for subscribing to gamelancing newsletter.You will now get an email each time we organise a game.";


## SEND MESSGAE ##

mail( $recipient, $subject, $body, "From: $sender" ) or die ("Mail could not be sent.");

## SHOW RESULT PAGE ##

header( "Location: $location" );


$servername = "localhost";
$database = "databasename";
$username = "name";
$password = "password";
$table = "subscribe_data";

// Name and email for database
$name= $_POST['Name'];
$email= $_POST['Email'];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query= "INSERT INTO $table  ". "VALUES ('$name', '$email')";

mysqli_query ($conn, $query) 
or die ("Error querying database"); 

echo "Connected successfully";
mysqli_close($conn);
?>