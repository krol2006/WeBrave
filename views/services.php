<?php 
    $way = parse($_SERVER['REQUEST_URI']);
    $langCode = $way["language"];

?>

<div class="header">
    <div class="header__logo">
        <a href="<?= mainPage($langCode); ?>" class="header__logo__link">webrave</a>
    </div>

    <h1 class="header__title"><?= $lang['services'] ?></h1>
</div>

<div class="services">
    <div class="services__list">
        <?php foreach($lang['servicesList'] as $servicesItem): ?>
        <div class="services__item">
            <div class="services__item__layout">
                <div class="services__item__title">
                    <a href='/<?= $servicesItem["name"]; ?>'><?= $servicesItem['title']; ?></a>
                </div>

                <div class="services__item__text">
                    <p><?= mb_strimwidth($servicesItem['text'], 0, 155, "..."); ?></p>
                </div>
            </div>

            <div class="services__item__more">
                <a href='<?= changeId($way, $servicesItem["name"]); ?>'><?= $lang['more']; ?></a>
            </div>
        </div>
        <?php endforeach; ?>

        <div class="services__item">
            <div class="services__item__layout">
                <div class="services__item__title">
                    <a href='http://seorave.cz' target="_blank"><?= $lang['SEOservice']['title']; ?></a>
                </div>

                <div class="services__item__text">
                    <p><?= mb_strimwidth($lang['SEOservice']['text'], 0, 155, "..."); ?></p>
                </div>
            </div>

            <div class="services__item__more">
                <a href='http://seorave.cz' target="_blank"><?= $lang['more']; ?></a>
            </div>
        </div>
    </div>
</div>