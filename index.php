<!DOCTYPE html>
<html lang="es-AR">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Pelix, una aplicación web creada para ayudarte a encontrar tu película deseada">

    <title>Pelix</title>
    <link rel="icon" type="image/png" href="https://cdn0.iconfinder.com/data/icons/i-Love-Icons/128/cinema.png">
    <link rel="stylesheet" href="style.css?version=<? echo time() ?>">
</head>

<body>
    <?php
    require('connection.php');
    session_start();
    if (!isset($e)) {
        include('page.php');
    }
    ?>
</body>

</html>