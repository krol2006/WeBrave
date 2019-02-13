<?php 
    require ('../content/lang_ru.php');

    // $db = new Mongo('mongodb://localhost', [
    //     'db' => 'webrave'
    // ]);
phpinfo();
    echo "ok";
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
        <lenged>Menu</legend>

        <fieldset>
            <?php foreach($lang['menu'] as $key => $item):
                foreach($item as $k => $v):
                    if($k == 'url') continue;
            ?>
                <div class="form__input form__input--lvl1">
                    <label><?= $k; ?></label>
                    <input type="text" name="<?= $k; ?>" placeholder='<?= $v; ?>' value='<?= $v; ?>'>
                </div>
            <?php 
                endforeach;
                endforeach;
            ?>
            <button type="submit">Save changes</button>
        </fieldset>
    </form>

    <form class="form2" method="POST" action="#">
        <p>Services</p>

        <?php foreach($lang['servicesList'] as $key => $item):
            foreach($item as $k => $v):
                if($k == 'id') continue;
        ?>
            <div class="form__input form__input--lvl1">
                <label><?= $k; ?></label>
                <input type="text" placeholder='<?= $v; ?>' value='<?= $v; ?>'>
            </div>
        <?php 
            endforeach;
            endforeach;
        ?>
 
        <button type="submit">Save changes</button>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $('[type="submit"]').on('click', function(e) {
            e.preventDefault();
        
            const form = $(this).closest('form');
            const formArray = form.serializeArray();

        });
    </script>
</body>
</html>