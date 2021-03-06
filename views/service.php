<?php 
    $way = parse($_SERVER['REQUEST_URI']);
    $langCode = $way["language"];

    $service = null;
    foreach($lang['servicesList'] as $e) {
        if ($e["name"] == $way["id"]) {
            $service = $e;
            break;
        }
    }
?>

<div class="header">
    <div class="header__logo">
        <a href="<?= mainPage($langCode); ?>" class="header__logo__link">webrave</a>
    </div>

    <h1 class="header__title"><a href="<?= $_SERVER['HTTP_REFERER'] ?>" class="header__title__back"></a><?= $service['title']; ?></h1>
</div>

<div class="service">
    <div class="service__layout">
        <div class="service__description">
            <p><?= $service['text']; ?></p>
            <p><strong><?= $service['deadline']; ?></strong></p>
        </div>

        <div class="service__price">
            <p class="service__price__title"><?= $lang['price']; ?></p>
            <p class="service__price__depends"><?= $lang['depends']; ?></p>
            
            <div class="service__price__result">
                <p><span><?= $lang['from']; ?></span><?= $service['priceMin']; ?></p>
                <p><span><?= $lang['to']; ?></span><?= $service['priceMax']; ?></p>
            </div>
        </div>
    </div>
</div>

<form method="POST" action="#" class="form">
    <input type="hidden" value="<?= $service['title']; ?>" name="site">

    <div class="form__title">
        <p><?= $service['sendRequest']; ?></p>
    </div>

    <div class="form__layout">
        <div class="form__input">
            <input type="text" placeholder='<?= $lang["name"]; ?>' name="name">
        </div>

        <div class="form__input">
            <input type="tel" placeholder='<?= $lang["phone"]; ?>' name="phone">
        </div>

        <div class="form__input">
            <input type="email" placeholder='<?= $lang["email"]; ?>' name="email">
        </div>

        <div class="form__input">
            <textarea placeholder='<?= $lang["message"]; ?>' name="message"></textarea>
        </div>
    </div>

    <div class="form__submit">
        <button class="button" type="submit"><?= $lang['sendRequest']; ?></button>
    </div>
</form>