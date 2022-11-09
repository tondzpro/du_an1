<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Document</title>
</head>
<body>
    <header>
        menu
        <a href="<?= SITE_URL.'?trang-chu'?>">trang chu</a>
        <a href="<?= SITE_URL.'?san-pham'?>">san pham</a>
    </header>
    <main>
     <?php include_once $VIEW_NAME; ?>
     nội dung
    </main>
    <footer>
        cuối trang
    </footer>

</body>
</html>