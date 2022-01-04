<?php
    /** @var Exception $exception */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Internal Error Occurred</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="container bg-light py-3">
    <div class="row">
        <div class="col">
            <h1><?= $exception->getMessage(); ?></h1>
            <p><?= $exception->getFile(); ?>:<?= $exception->getLine(); ?></p>
            <p>Code: <?= $exception->getCode(); ?></p>

            <h4>Stack Trace</h4>
            <pre><?= $exception->getTraceAsString(); ?></pre>
        </div>
    </div>
</div>
</body>
</html>
