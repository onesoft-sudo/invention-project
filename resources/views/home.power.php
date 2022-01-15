:section('main')
<h1>Welcome!</h1>
<a href="/form" class="btn btn-primary">Form</a>
<a href="/api/v1" class="btn btn-primary">API v1</a>

<div class="pt-3">
    <?php
    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
    ?>
</div>
:endsection
