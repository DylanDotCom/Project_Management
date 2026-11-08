<?php
   session_start();

   include 'db_connect.php';

   $username = isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '';
   $password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '';

   //sql statement
   $sql = "SELECT * FROM Users WHERE username = ?";
   $stmt = $conn->prepare($sql);
   $stmt->bind_param("s", $username);

   //Execute prepared statement

   $stmt->execute();
   $result_username = $stmt->get_result();

   $stmt->close();

   if($result_username->num_rows == 1) {
    $row = $result_username->fetch_assoc();
    $user_id = $row['user_id'];

    $hashed_password = $row['password'];

    if(password_verify($password, $hashed_password)){
        $_SESSION["username"] = $username;
        $_SESSION["user_id"] = $user_id;

        echo json_encode([
            'success' => true,
            'message' => 'Login successful!',
            'user_id' => $user_id,
        ]);
    }

    else {
        echo json_encode([
            'success' => false,
            'message' => 'Incorrect Password',
            'user_id' => 0,
        ]);
    } 
  }

?>