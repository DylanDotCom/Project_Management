<?php
    session_start();
    include '../db_connect.php';
    require 'comments_include.php';

    $imgDir = "/db_images/";

    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

    $stmt = $conn->prepare("SELECT title, year, creator, genre, image_path FROM CartoonSearch WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $cartoon = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    if (!$cartoon) {
        http_response_code(404);
        die("Cartoon not Found. <a href='../SearchPage.php'>Back</a>");
    }

    $stmt = $conn->prepare(
        "SELECT season, episode_number, title, description
        FROM Episodes WHERE cartoon_id = ?
        ORDER BY season, episode_number"
    );
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $episodes = $stmt->get_result();
    ?>

    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <title><?= htmlspecialchars($cartoon['title']) ?> | Gismo</title>

            <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">

             <link href="../css/style_gismo.css" rel="stylesheet">
           
        </head>
        <body>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container">
                    <a class="navbar-brand" href="../index.php"><img src="../img/gismo_logo.png" alt="Logo"class="img-fluid logo"/></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link"  href="../index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link active" aria-current="page" href="../SearchPage.php">Search</a></li>
                            <li class="nav-item"><a class="nav-link"  href="../blog_page/blog.php">Blog</a></li>
                        </ul>
                        
                    </div>
                    <a href="login.php" class="profile-btn" aria-label="Profile"></a>
                </div>
                
            </nav>

             <div class="container my-4">
                <a href="../SearchPage.php">&larr; Back to cartoons</a>

                <div class="d-flex align-items-center gap-3 my-3">
                    <?php if (!empty($cartoon['image_path'])): ?>
                        <img src="../<?= htmlspecialchars($cartoon['image_path']) ?>"
                            alt="<?= htmlspecialchars($cartoon['title']) ?>"
                            style="width:90px; height:90px; object-fit:contain;">
                    <?php endif; ?>
                    <div>
                        <h1 class="mb-1"><?= htmlspecialchars($cartoon['title']) ?></h1>
                        <p class="text-muted mb-0">
                            <?= (int)$cartoon['year'] ?> &middot;
                            <?= htmlspecialchars($cartoon['creator']) ?> &middot;
                            <?= htmlspecialchars($cartoon['genre']) ?>
                        </p>
                    </div>
                </div>
                 <h2>Episodes</h2>

        <?php
            $episodeList = $episodes->fetch_all(MYSQLI_ASSOC);
            $perSlide    = 3;

            // one reusable card, so the grid and the carousel look the same
            function episodeCard(array $ep, string $imgDir): string {
                $img = !empty($ep['image_path']) ? $imgDir . $ep['image_path'] : $imgDir . "header.jpg";
                
                return "
                <div class='col'>
                    
                        <div class='card h-100'>
                            <img src='" . htmlspecialchars($img) . "' class='card-img-top' alt='" . htmlspecialchars($ep['title']) . "' style='height:160px; object-fit:cover;'>
                            <div class='card-body'>
                                <h5 class='card-title'>S" . (int)$ep['season'] . "E" . (int)$ep['episode_number'] . " - " . htmlspecialchars($ep['title']) . "</h5>
                                <p class='card-text'>" . htmlspecialchars($ep['description']) . "</p>
                            </div>
                        </div>
                    </a>
                </div>";
            }
            ?>

            <?php if (count($episodeList) === 0): ?>
                <p class="text-muted">No episodes have been added for this cartoon yet.</p>

            <?php elseif (count($episodeList) <= $perSlide): ?>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php foreach ($episodeList as $ep) echo episodeCard($ep, $imgDir); ?>
                </div>

            <?php else: ?>
                <div id="episodesCarousel" class="carousel slide px-5" data-bs-ride="false">
                    <div class="carousel-inner">
                        <?php foreach (array_chunk($episodeList, $perSlide) as $i => $group): ?>
                            <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
                                <div class="row row-cols-1 row-cols-md-3 g-4">
                                    <?php foreach ($group as $ep) echo episodeCard($ep, $imgDir); ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#episodesCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#episodesCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            <?php endif; ?>

        <hr class="my-5">
        <?php renderComments($conn, 'cartoon', $id); ?>
    </div>

    <footer class="py-5 bg-dark">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Gismo 2026</p></div>
    </footer>
    <script src="../bootstrap/js/bootstrap.js"></script>
</body>
</html>
<?php
$stmt->close();
$conn->close();
?>
        </body>
    </html>