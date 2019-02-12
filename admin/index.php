<?php 
    require '../content/lang_ru.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Webrave | Admin</title>
    <link rel="stylesheet" href="./index.css">
</head>
<body>
    <form class="form" method="POST" action="#">
        <?php
            foreach($lang as $key => $item) {
        ?>
                    <div class="form__input form__input--lvl1">
                        <label><?= $key; ?></label>
                        <input type="text" placeholder='<?= $item; ?>' value='<?= $item; ?>'>
                    </div>
 
        <?php  
            }
        ?>
    </form>
</body>
</html>