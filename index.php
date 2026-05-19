<?php
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/published_relative.php';

$sql = "
    SELECT
        p.id,
        p.title,
        p.subtitle,
        p.content,
        p.excerpt,
        p.featured_image,
        p.views,
        p.published_at,
        u.full_name,
        u.avatar_url
    FROM
        post p
    INNER JOIN
        `user` u ON p.user_id = u.id
    WHERE
        p.status = 'published'
    ORDER BY
        p.published_at DESC
";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$posts = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="src/styles/home.css">
    <link rel="stylesheet" href="src/styles/main.css">
</head>
<body>
    <nav class="navigation">
        <div class="navigation__home"><img src="src/images/home.png" alt=""></div>
        <div class="navigation__user"><img src="src/images/profile.png" alt=""></div>
        <div class="navigation__newPost"><img src="src/images/add.png" alt=""></div>
    </nav>

    <main class="posts">
        <?php if (count($posts) > 0): ?>
            <?php foreach ($posts as $post): ?>
                <?php
                $excerpt = trim((string) ($post['excerpt'] ?? ''));
                if ($excerpt === '') {
                    $content = (string) ($post['content'] ?? '');
                    $excerpt = mb_strlen($content) > 280
                        ? mb_substr($content, 0, 280) . '…'
                        : $content;
                }
                ?>
                <article class="postUser">
                    <div class="postUser__header">
                        <img src="<?= htmlspecialchars($post['avatar_url'], ENT_QUOTES, 'UTF-8') ?>"
                             alt=""
                             class="postUser__header--avatar">
                        <p class="postUser__header--name">
                            <?= htmlspecialchars($post['full_name'], ENT_QUOTES, 'UTF-8') ?>
                        </p>
                        <div class="postUser__header--edit">
                            <img src="src/images/Edit.png" alt="">
                        </div>
                    </div>

                    <div class="postUser__gallery">
                        <img src="<?= htmlspecialchars($post['featured_image'], ENT_QUOTES, 'UTF-8') ?>" alt="">
                    </div>

                    <div class="postUser__like">
                        <img class="postUser__like--button" src="src/images/like.png" alt="">
                        <p class="postUser__like--count">
                            <?= number_format((int) $post['views'], 0, '', ' ') ?>
                        </p>
                    </div>

                    <div class="postUser__discription">
                        <?php if (trim((string) ($post['title'] ?? '')) !== ''): ?>
                            <p class="postUser__title-line"><strong><?= htmlspecialchars((string) $post['title'], ENT_QUOTES, 'UTF-8') ?></strong></p>
                        <?php endif; ?>
                        <p><?= htmlspecialchars($excerpt, ENT_QUOTES, 'UTF-8') ?></p>
                        <a class="postUser__discription--more" href="post.php?postId=<?= (int) $post['id'] ?>">ещё</a>
                    </div>

                    <div class="postUser__date">
                        <?= htmlspecialchars(published_relative($post['published_at'] ?? null), ENT_QUOTES, 'UTF-8') ?>
                    </div>
                </article>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="no-posts">
                <p>Пока нет постов.</p>
            </div>
        <?php endif; ?>
    </main>
</body>
</html>
