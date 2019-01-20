<div class="header">
    <div class="header__logo">
        <a href="/" class="header__logo__link">webrave</a>
    </div>

    <h1 class="header__title"><?= $lang['about'] ?></h1>
</div>

<div class="about">
    <div class="about__text">
        <p><?= $lang['aboutText'] ?></p>
    </div>

    <div class="about__content">
        <ul class="about__list">
            <?php foreach($lang['aboutList'] as $aboutItem): ?>
            <li class="about__list__item"><img class="about__list__image" src='/images/<?= $aboutItem['image'] ?>' alt='<?= $aboutItem['text'] ?>'><?= $aboutItem['text'] ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>