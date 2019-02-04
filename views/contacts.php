<div class="header">
    <div class="header__logo">
        <a href="/" class="header__logo__link">webrave</a>
    </div>

    <h1 class="header__title"><?= $lang['contacts']; ?></h1>
</div>

<form method="POST" action="#" class="form">
    <div class="form__title">
        <p><?= $lang['contactUs']; ?></p>
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
        <button type="submit" class="button"><?= $lang['sendRequest']; ?></button>
    </div>
</form>

<div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2562.9316594995603!2d14.53220341571624!3d50.03137637941979!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470b920d938a7911%3A0x5e387d6b4f10794e!2sHlavat%C3%A9ho+662%2F17%2C+149+00+Praha+11-H%C3%A1je!5e0!3m2!1sen!2scz!4v1548005176954" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>