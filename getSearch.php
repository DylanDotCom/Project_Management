<?php
include 'db_connect.php';

$search = trim($_GET['q'] ?? '');

if ($search === '') {
    echo "<p class='text-muted'>Please enter a search term.</p>";
    $conn->close();
    exit;
}
//tst again
$stmt = $conn->prepare(
    "SELECT id, title, year, creator, genre, runtime, episodes, image_path
     FROM CartoonSearch
     WHERE title LIKE ?"
);
$like = "%" . $search . "%";
$stmt->bind_param("s", $like);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<div class='row row-cols-1 row-cols-md-3 g-4'>";
    while ($row = $result->fetch_assoc()) {
        $id = (int)$row['id'];
        $genre   = $row['genre']   ? htmlspecialchars($row['genre'])   : "No genre listed";
        $runtime = $row['runtime'] ? htmlspecialchars($row['runtime']) . " min" : "No runtime listed";
        $img = !empty($row['image_path']) ? $row['image_path'] : "db_images/header.jpg";
        // echo "<small>DEBUG: " . htmlspecialchars($row['image_path'] ?? 'NULL') . " → " . htmlspecialchars($img) . "</small>";
       
        echo "<div class='col'>";
      
        echo "<div class='card h-200'>";
        echo "<a href='cartoon_pages/episodes.php?id=$id' class='text-decoration-none text-reset'>";
        echo "<img src='" .htmlspecialchars($img) . "' class='card-ing-top' alt='" .htmlspecialchars($row['title']) . "' style='height:450px; object-fit:contain;'></a>";
        echo "<div class='card-body'>";
        echo "<div class='d-flex justify-content-between align--items-start'>";
        echo "<h5 class='card-title'>" . htmlspecialchars($row['title']) . "</h5>";
        echo "<span class='fw-bold'>" . htmlspecialchars($row['episodes']) . " </span>";
        echo "</div>";
        echo "<p class='card-text'>" . htmlspecialchars($row['year']) . "</p>";
        echo "</div>";
        echo "<div class='card-footer bg-transparent border-0 pb-3'>";
        echo "<div class='mb-2'>" . $genre . "</div>" . $runtime;
        echo "</div></div></div>";
    }
    echo "</div>";
} else {
    echo "<p>No cartoons found for \"" . htmlspecialchars($search) . "\".</p>";
}

$stmt->close();
$conn->close();

?>
