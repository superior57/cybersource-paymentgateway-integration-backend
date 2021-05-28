<?php
$uuid = uniqid();
$amount = '5.30';
$button = file_get_contents('https://gateway.softpointdev.com/POSTrust/api/processor/cybersource/v1/iframe/web/payment_form.php?amount=' . $amount . '&uuid=' . $uuid);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My store</title>
</head>
<body>
<h1>My test store</h1>

<?=$button;?>
</body>
</html>
