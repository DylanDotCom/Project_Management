<?php

include 'db_connect.php';
    $sql = "SELECT title FROM CartoonSearch";
    $result = $conn->query($sql);

$cartoons = [];
while ($row = $result->fetch_assoc()) {
    $cartoons[] = $row['title'];
}

            $conn->close();

echo json_encode($cartoons);

?>