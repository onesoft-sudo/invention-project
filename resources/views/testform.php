<?php

use App\Widgets\CSRFWidget;

?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <h1>Test Form</h1>

        <form action="<?= $this->getURI(); ?>" method="post">
            <?= new CSRFWidget(); ?>
            <div class="form-group mb-2">
                <label for="i1">Name</label>
                <input type="text" name="name" id="i1" class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="i2">Username</label>
                <input type="text" name="username" id="i2" class="form-control">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>