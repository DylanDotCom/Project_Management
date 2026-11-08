<?php
$search = $_GET["q"];

include 'db_connect.php';

$sql = "SELECT title, id, year, creator, genre, runtime, episodes FROM CartoonSearch WHERE title='$search'";
$result = $conn->query($sql);

if($result->num_rows > 0) {
    //outputting row data
    while($row = $result->fetch_assoc()) {
        echo $row["title"]. "<br>Year: " . $row["year"]."<br>Genre: " . $row["genre"]. 
        "<br>: Runtime" . $row["runtime"]. "<br>: Episodes" . $row["episodes"]."<br>";
    }

}

$conn->close();
?>