<div class="header">
    <div class="header__logo">
        <a href="/" class="header__logo__link">webrave</a>
    </div>

    <h1 class="header__title"><?= $lang['services'] ?></h1>
</div>

<div class="services">
    <div class="services__list">
        <?php foreach($lang['servicesList'] as $servicesItem): ?>
        <div class="services__item">
            <div class="services__item__layout">
                <div class="services__item__title">
                    <a href='?id=<?= $servicesItem["id"]; ?>'><?= $servicesItem['title']; ?></a>
                </div>

                <div class="services__item__text">
                    <p><?= mb_strimwidth($servicesItem['text'], 0, 155, "..."); ?></p>
                </div>
            </div>

            <div class="services__item__more">
                <a href='/service?id=<?= $servicesItem["id"]; ?>'><?= $lang['more']; ?></a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>