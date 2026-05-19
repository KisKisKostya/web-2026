<div class="posts__item">
    <div class="posts__user">
        <div class="posts__avatar">
            <img src="<?= $post['avatar'] ?>" alt="avatar">
        </div>
        <div class="posts__user-name">
            <span class="posts__user-name-text"><?= $post['author'] ?></span>
        </div>
        <div class="posts__edit">
            <img src="../src/images/Edit.png" alt="Edit">
        </div>
    </div>
    <div class="posts__gallery">
        <img src="<?= $post['image'] ?>" alt="Photo">
        <div class="posts__gallery-indicator"></div>
    </div>
    <div class="posts__like">
        <div class="posts__like-icon">
            <img src="../src/images/like.png" alt="like">
        </div>
        <div class="posts__like-count"><?= (int)($post['likes']) ?></div>
    </div>
    <div class="posts__description">
        <div class="posts__description-text"><?= $post['description'] ?></div>
        <a href="/post?id=<?= $post['id'] ?>" class="posts__description-more">ещё</a>
    </div>
    <div class="posts__date"><?= $post['date'] ?></div>
</div>