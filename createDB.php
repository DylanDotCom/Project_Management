<!DOCTYPE html>
<html>

<head>
    <title>Database</title>
</head>

<body>
    <?php
    $servername = "ProjectManagement";
    $username = "root";
    $password = "";

    //Create Connection
    $conn = new mysqli($servername, $username, $password);
    //Check Connection
    if (!$conn) {
       die("MyNewDatabase Connection Failed: " . mysqli_connect_error());
}

$dbname = "CartoonsInfo";

// Drop database if exists
$sql = "DROP DATABASE IF EXISTS $dbname;";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully<br>";
} else {
  echo "Error creating database: " . $conn->error;
}

// Create database
$sql = "CREATE DATABASE $dbname;";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully<br>";
} else {
  echo "Error creating database: " . $conn->error;
}

$conn->close();

$conn = new mysqli("ProjectManagement", "root", "", "CartoonsInfo");



$sql = "CREATE TABLE CartoonSearch (
    title VARCHAR(30) NOT NULL,
    id INT AUTO_INCREMENT PRIMARY KEY,
    year INT NOT NULL,
    creator VARCHAR(30) NOT NULL,
    genre VARCHAR(30) NOT NULL,
    rating VARCHAR(30) NOT NULL,
    runtime INT NOT NULL,
    episodes INT NOT NULL
) ENGINE=InnoDB;
";
if($conn->query(query: $sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$sql = "INSERT INTO CartoonSearch (title, year, creator, genre, rating, runtime, episodes) VALUES
('Spongebob Squarepants', '1999', 'Matt Groening', 'TV-PG', 'comedy', '23', '272'),
('The Simpsons', '1999', 'Stephen Hillenburg', 'TV-Y', 'comedy', '22', '684'),
('Gravity Falls', '2012', 'Alex Hirsch', 'TV-Y7', 'Action-Adventure', '23', '40'),
('Steven Universe', '2013', 'Rebecca Sugar', 'TV-PG', 'Action' , '11', '175')
;
";


if ($conn->query($sql) === TRUE) {
  echo "Table entries created successfully<br>";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
    ?>
</body>

</html>