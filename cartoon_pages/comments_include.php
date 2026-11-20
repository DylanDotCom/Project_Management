<?php

function renderComments(mysqli $conn, string $type, int $targetId, string $action = 'post_comment.php'): void {
    $columns = ['cartoon' => 'cartoon_id', 'episode' => 'episode_id', 'article' => 'article_id'];
    $column  = $columns[$type] ?? 'cartoon_id';

    $stmt = $conn->prepare(
        "SELECT c.body, c.created_at, u.username
         FROM Comments c JOIN Users u ON u.user_id = c.user_id
         WHERE c.$column = ?
         ORDER BY c.created_at DESC"
    );
    $stmt->bind_param("i", $targetId);
    $stmt->execute();
    $comments = $stmt->get_result();
    ?>
    <section class="comments">
        <h2>Comments (<?= $comments->num_rows ?>)</h2>

        <?php if (!empty($_SESSION['user_id'])): ?>
            <form action="post_comment.php" method="POST">
                <input type="hidden" name="type" value="<?= htmlspecialchars($type) ?>">
                <input type="hidden" name="target_id" value="<?= $targetId ?>">
                <textarea name="body" rows="3" maxlength="1000" required placeholder="Write a comment..."></textarea>
                <button type="submit">Post</button>
            </form>
        <?php else: ?>
            <p>Please log in to leave a comment.</p>
        <?php endif; ?>

        <?php while ($c = $comments->fetch_assoc()): ?>
            <div class="comment">
                <strong><?= htmlspecialchars($c['username']) ?></strong>
                <small><?= htmlspecialchars($c['created_at']) ?></small>
                <p><?= nl2br(htmlspecialchars($c['body'])) ?></p>
            </div>
        <?php endwhile; ?>
    </section>
    <?php
    $stmt->close();
}
