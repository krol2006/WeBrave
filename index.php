<?php
    include 'route.php';

    // it returns associative array with keys: language, page, id
    $way = parse($_SERVER['REQUEST_URI']);

    $langCode = $way["language"];

    require './content/lang_'.$langCode.'.php';

    switch ($way["page"]) {
        case '':
            $title = $lang['title'];
            $desc = $lang['mainDescription'];
            break;
        case 'services':
        if ($way["id"] == "") {
            $title = $lang['services'];
            $desc = $lang['servicesDescription'];
        } else {
            $serviceItem = null;
            foreach($lang['servicesList'] as $e) {
                if ($e["name"] == $way["id"]) {
                    $serviceItem = $e;
                }
            }
            if (isset($serviceItem)) {
                $title = $serviceItem['title'];
                $desc = $serviceItem['metaDescription'];
            } else {
                $title = $lang['error'];
                $desc = $lang['errorDescription'];
            }
        }
            break;
        case 'folio':
            $title = $lang['folio'];
            $desc = $lang['folioDescription'];
            break;
        case 'contacts':
            $title = $lang['contacts'];
            $desc = $lang['contactsDescription'];
            break;
        default:
            $title = $lang['error'];
            $desc = $lang['errorDescription'];
            break;
    };
?>

<!doctype html>
<html lang="<?= $langCode ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php if(isset($desc)): ?>
    <meta name="description" content="<?= $desc; ?>">
    <?php endif; ?>
    <title><?= 'Webrave | '.$title; ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="/css/init.css">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-134637839-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-134637839-1');
    </script>
</head>
<body>
    <div class="wrapper">
        <button type="button" class="sidebar__toggle">
            <span class="sidebar__toggle__box">
                <span class="sidebar__toggle__inner"></span>
            </span>
        </button>

        <main class="content">
            <?php 
                switch ($way["page"]) {
                    case '':
                        require './views/main.php';
                        break;
                    case 'services':                
                        if ($way["id"] == "") {
                            require './views/services.php';
                        } else {
                            $serviceItem = null;
                            foreach($lang['servicesList'] as $e) {
                                if ($e["name"] == $way["id"]) {
                                    $serviceItem = $e;
                                    break;
                                }
                            }
                            if (isset($serviceItem)) {
                                require './views/service.php';
                            } else {
                                require './views/404.php';
                            }
                        }
                        break;
                case 'folio':
                        require './views/folio.php';
                        break;
                    case 'contacts':
                        require './views/contacts.php';
                        break;
                    default:
                        require './views/404.php';
                        break;
                };
            ?>
        </main>

        <aside class="sidebar">
            <div class="anim" id="anim">  	 
                <canvas id="animCanvas"></canvas>
            </div>

            <div class="sidebar__layout">
                <div class="sidebar__langs">
                    <ul class="sidebar__langs__list">
                        <li class="sidebar__langs__item">
                            <a href=<?=changeLanguage($way, "en"); ?> data-lang="en" class="sidebar__langs__link <?= $langCode == "en" ? "sidebar__langs__link--active" : ""?> ">en</a>
                        </li>
                        <li class="sidebar__langs__item">
                            <a href=<?=changeLanguage($way, "ru"); ?> data-lang="ru" class="sidebar__langs__link <?= $langCode == "ru" ? "sidebar__langs__link--active" : ""?>">ru</a>
                        </li>                    
                    </ul>
                </div>

                <div class="sidebar__menu">
                    <ul class="sidebar__menu__list">
                        <?php foreach($lang['menu'] as $menuItem): ?>
                            <li class="sidebar__menu__item">
                                <a href="<?= changePage($way, $menuItem["url"]) ?>" class="sidebar__menu__link <?= $menuItem["url"] == "/".$way["page"] ? "sidebar__menu__link--active" : ""?>"><?= $menuItem["name"] ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="sidebar__contacts">
                    <a href="mailto:info@webrave.cz">info@webrave.cz</a>
                    <a href="tel:+420778898563">+420 778-898-563</a>
                </div>

                <div class="sidebar__socials">
                    <ul class="sidebar__socials__list">
                        <li class="sidebar__socials__item">
                            <a href="#" class="sidebar__socials__link sidebar__socials__link--fb"></a>
                        </li>
                        <li class="sidebar__socials__item">
                            <a href="#" class="sidebar__socials__link sidebar__socials__link--in"></a>
                        </li>
                        <li class="sidebar__socials__item">
                            <a href="#" class="sidebar__socials__link sidebar__socials__link--tw"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
    </div>

    <?php 
    if ($way["page"] == 'folio'):
    ?>
    <script src="js/photoswipe.min.js"></script>
    <script src="js/photoswipe-ui-default.min.js"></script> 
    <script src="js/photoswipe-gallery.js"></script>
    <?php endif; ?>
    <script src="js/anim.js"></script>
    <script src="js/main.js"></script>
</body>
</html>

