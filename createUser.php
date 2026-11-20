<?php
if($_SERVER ['REQUEST_METHOD'] == 'POST') {
    //Getting form data. 
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

}

include 'db_connect.php';

$username = isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '';
$email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
$password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '';

//Checking if username exists
$sql = "SELECT username FROM Users WHERE username=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username); //s indicates parameter is string.
$stmt->execute();
$result_username = $stmt->get_result();

if ($result_username->num_rows > 0) {
    $usernameExists = 1; 
}

//Check if email exists
$sql = "SELECT email FROM Users WHERE email=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email); //s indicates parameter is string.
$stmt->execute();
$result_email = $stmt->get_result();

$emailExists = 0;
$usernameExists = 0;

if ($result_email->num_rows > 0) {
    $emailExists = 1; 
}

if($usernameExists != 1 && $emailExists != 1) {
    //prepare sql statement
    $stmt = $conn->prepare("INSERT INTO Users (username, email, password) VALUES (?, ?, ?)" );
    $stmt->bind_param("sss", $username, $email, $hashed_password);

    //Execute statement
    if($stmt->execute()) {
        echo "User registered succesfully!<br>";
        echo "Username : {$username}<br>";
        echo "Email : {$email}<br>";
    } else {
        echo "Error: " . $stmt->error;
    }

    //Close connection
    $stmt->close();
} else {
    if($usernameExists == 1) {
        echo "This username already exists.<br>";
    }
    if($emailExists == 1) {
        echo "This email address already exists.<br>";
    }
}

?>
