<?php

use App\Core\App;
use App\Widgets\CSRFWidget;

?>
<div class="row">
    <div class="col-md-4 mx-auto">
        <h1>Register</h1>
        <br>
        <?php
        $msg = App::session()->getFlash();

        if($msg !== '' && $msg !== false) {
            ?>
            <div class="alert alert-danger bg-danger text-light">
                <?= $msg ?>
            </div>
            <?php
        }
        ?>
        <br>
        <form action="" method="post">
            <?= new CSRFWidget(); ?>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" <?= isset($model->name) ? "value=\"" . $model->name . "\" " : ""; ?>name="name" class="form-control<?= isset($errors["name"]) ? " is-invalid" : ""; ?>" id="name">
                <?php
                if(isset($errors["name"])):
                    ?>
                    <div class="invalid-feedback">
                        <?= $errors["name"][array_key_first($errors["name"])] ?>
                    </div>
                <?php
                endif;
                ?>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" <?= isset($model->email) ? "value=\"" . $model->email . "\" " : ""; ?>name="email" class="form-control<?= isset($errors["email"]) ? " is-invalid" : ""; ?>" id="email">
                <?php
                if(isset($errors["email"])):
                    ?>
                    <div class="invalid-feedback">
                        <?= $errors["email"][array_key_first($errors["email"])] ?>
                    </div>
                <?php
                endif;
                ?>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" <?= isset($model->username) ? "value=\"" . $model->username . "\" " : ""; ?>name="username" class="form-control<?= isset($errors["username"]) ? " is-invalid" : ""; ?>" id="username">
                <?php
                if(isset($errors["username"])):
                    ?>
                    <div class="invalid-feedback">
                        <?= $errors["username"][array_key_first($errors["username"])] ?>
                    </div>
                <?php
                endif;
                ?>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control<?= isset($errors["password"]) ? " is-invalid" : ""; ?>" id="exampleInputPassword1">
                <?php
                if(isset($errors["password"])):
                    ?>
                    <div class="invalid-feedback">
                        <?= $errors["password"][array_key_first($errors["password"])] ?>
                    </div>
                <?php
                endif;
                ?>
            </div>
            <div class="mb-3">
                <label for="passwordConfirmation" class="form-label">Confirm Password</label>
                <input type="password" name="passwordConfirmation" class="form-control<?= isset($errors["passwordConfirmation"]) ? " is-invalid" : ""; ?>" id="passwordConfirmation">
                <?php
                if(isset($errors["passwordConfirmation"])):
                    ?>
                    <div class="invalid-feedback">
                        <?= $errors["passwordConfirmation"][array_key_first($errors["passwordConfirmation"])] ?>
                    </div>
                <?php
                endif;
                ?>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</div>