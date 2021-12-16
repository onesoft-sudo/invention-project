<h1>Welcome, <?= \App\Core\App::session()->get("name") ?>!</h1>

<div class="pt-3">
    <?php
        echo "<pre>";
        /** @var \App\Core\Model $model */

        print_r($model);
        echo "</pre>";
    ?>
</div>

<a href="/logout" class="btn btn-primary mt-3">Logout</a>