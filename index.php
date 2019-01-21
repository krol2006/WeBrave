<?php 
    if (isset($_COOKIE['language'])) {
        $langCode = $_COOKIE['language'];
    } else {
        $langCode = 'ru';
    }
    include $_SERVER['DOCUMENT_ROOT'].'/content/lang_'.$langCode.'.php';

    if(isset($_SERVER['REDIRECT_URL'])) {
        $request = $_SERVER['REDIRECT_URL'];

        switch ($request) {
            case '/about':
                $title = $lang['about'];
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
    } else {
        $title = $lang['title'];
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
                if(isset($_SERVER['REDIRECT_URL'])) {
                    $request = $_SERVER['REDIRECT_URL'];
        
                    switch ($request) {
                        case '/':
                            require __DIR__ . '/views/main.php';
                            break;
                        case '':
                            require __DIR__ . '/views/main.php';
                            break;
                        case '/about':
                            require __DIR__ . '/views/about.php';
                            break;
                        case '/services':
                            require __DIR__ . '/views/services.php';                            
                            break;
                        case '/folio':
                            require __DIR__ . '/views/folio.php';
                            break;
                        case '/contacts':
                            require __DIR__ . '/views/contacts.php';
                            break;
                        case '/service':
                            require __DIR__ . '/views/service.php';
                            break;
                        default:
                            require __DIR__ . '/views/404.php';
                            break;
                    }
                } else {
                    require __DIR__ . '/views/main.php';
                }
            ?>
        </main>

        <aside class="sidebar">
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
        </aside>
    </div>

    <script src="js/main.js"></script>
</body>
</html>

