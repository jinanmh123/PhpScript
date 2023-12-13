<?php
# mysql db info
$servername = ""; # database host
$username = ""; # database username
$password = ""; # database password
$dbname = ""; # database name (the name of ur mysql db)

# create a connection to mysql db
$conn = new mysqli($servername, $username, $password, $dbname);

# check if the connection is successful or not
if ($conn->connect_error) {
    die("Failed to connect, got an error : " . $conn->connect_error);
}
# check if data was sent via POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    # get `POST`ed name and value [if you are sending 'name' and 'value' parameters (change them if you need to)]
    $name = $_POST["name"];
    $value = $_POST["value"];
    # insert the data into the 'entries' table using sql
    $sql = "INSERT INTO entries (name, value) VALUES ('$name', '$value')";
    if ($conn->query($sql) === TRUE) {
        echo "Successfully inserted the data"; # data entry successful
    } else {
        echo "Oops! Error: " . $sql . "<br>" . $conn->error; # echo the the error if not successful
    }
}
$conn->close(); # finally, close the connection to the mysql database
?>
