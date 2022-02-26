<?php
    /** @var string $uri */
?>
<h1>429 Too Many Requests</h1>
<p>Your browser sent too many requests at a time. Please retry after <?= response()->header('Retry-After') ?>.</p>
