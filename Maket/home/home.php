<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/styles/home.css">
    <link rel="stylesheet" href="../src/styles/main.css">
    <title>Главная</title>
</head>
<body>
    <nav class="nav">
        <div class="nav__home"><img src="../src/images/home.png" alt="home"></div>
        <div class="nav__profile"><img src="../src/images/profile.png" alt="profile"></div>
        <div class="nav__add"><img src="../src/images/add.png" alt="add"></div>
    </nav>

    <?php
    $posts = [
        [
            'id'          => 1,
            'title'       => 'The Road Ahead',
            'subtitle'    => 'Путешествие начинается',
            'avatar'      => '../src/images/Avatar.png',
            'author'      => 'Ваня Денисов',
            'image'       => '../src/images/Photo.png',
            'likes'       => 203,
            'description' => 'Так красиво сегодня на улице! Настоящая зима)) Вспоминается Бродский: «Поздно ночью, в уснувшей долине, на самом дне, в городке, занесенном снегом по ручку двери...»',
            'date'        => time(), 
        ],
        [
            'id'          => 2,
            'title'       => 'Adventures in Tech',
            'subtitle'    => 'Технологии будущего',
            'avatar'      => '../src/images/Avatar2.png',
            'author'      => 'Лиза Дёмина',
            'image'       => '../src/images/Photo2.png',
            'likes'       => 156,
            'description' => 'Интересный день сегодня! Много нового узнала про современные технологии.',
            'date'        => time(), 
        ],
    ];
    ?>

    <div class="posts">
        <?php foreach ($posts as $post): ?>
            <?php include 'post_preview.php'; ?>
        <?php endforeach; ?>
    </div>

</body>
</html>