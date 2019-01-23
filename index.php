<?php
    if (isset($_COOKIE['language'])) {
        $langCode = $_COOKIE['language'];
    } else {
        $langCode = 'ru';
    }
    require './content/lang_'.$langCode.'.php';

    switch ($_SERVER['REQUEST_URI']) {
        case '/':
            $title = $lang['title'];
            break;
        case '':
            $title = $lang['title'];
            break;
        case '/services':
            $title = $lang['services'];                          
            break;
        case '/folio':
            $title = $lang['folio']; 
            break;
        case '/contacts':
            $title = $lang['contacts'];
            break;
        case '/service':
            $title = $lang['servicesList'][$_GET['id']]['title'];
            break;
        default:
            $title = $lang['error'];
            break;
    }
?>

<!doctype html>
<html lang="<?= $langCode ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="/css/init.css">
</head>
<body>
    <div class="wrapper">
        <main class="content">
            <?php
                switch ($_SERVER['REQUEST_URI']) {
                    case '/':
                        require './views/main.php';
                        break;
                    case '':
                        require './views/main.php';
                        break;
                    case '/about':
                        require './views/about.php';
                        break;
                    case '/services':
                        require './views/services.php';                            
                        break;
                    case '/service?id=<?= $_GET["id"]':
                        require './views/service.php';
                        break;
                    case '/folio':
                        require './views/folio.php';
                        break;
                    case '/contacts':
                        require './views/contacts.php';
                        break;                    
                    default:
                        require './views/404.php';
                        break;
                }
            ?>
        </main>

        <aside class="sidebar">
            <div class="sidebar__layout">
                <div class="sidebar__langs">
                    <ul class="sidebar__langs__list">
                        <li class="sidebar__langs__item">
                            <a href="#" data-lang="en" class="sidebar__langs__link <?= $langCode == "en" ? "sidebar__langs__link--active" : ""?> ">en</a>
                        </li>
                        <li class="sidebar__langs__item">
                            <a href="#" data-lang="ru" class="sidebar__langs__link <?= $langCode == "ru" ? "sidebar__langs__link--active" : ""?>">ru</a>
                        </li>                    
                    </ul>
                </div>

                <div class="sidebar__menu">
                    <ul class="sidebar__menu__list">
                        <?php foreach($lang['menu'] as $menuItem): ?>
                            <li class="sidebar__menu__item">
                                <a href="<?= $menuItem["url"] ?>" class="sidebar__menu__link <?= $menuItem["url"] == $request ? "sidebar__menu__link--active" : ""?>"><?= $menuItem["name"] ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
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

    <script src="js/photoswipe.min.js"></script>
    <script src="js/photoswipe-ui-default.min.js"></script> 
    <script src="js/photoswipe-gallery.js"></script>
    <script src="js/main.js"></script>
</body>
</html>

