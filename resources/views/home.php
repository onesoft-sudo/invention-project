<h1>Welcome!</h1>
<a href="/form" class="btn btn-primary">Form</a>

<div class="pt-3">
    <?php
        echo "<pre>";
        /** @var \App\Core\Model $model */
        print_r($_SESSION);
        echo "</pre>";
    ?>
</div>