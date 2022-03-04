:title('Login - Invention'):
:section('main'):
<?php

use OSN\Framework\Core\App;

?>
<div class="row">
    <div class="col-md-4 mx-auto">
        <h1>Login</h1>
        <br>
        <?php
            $msg = App::session()->getFlash('error');

            if($msg !== '' && $msg !== null) {
        ?>
                <div class="alert alert-danger bg-danger text-light">
                    <?= $msg ?>
                </div>
        <?php
            }
        ?>
        <br>
        <form action="{{ route('login.store') }}" method="post">
            :csrf:
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" <?= request()->has('username') ? "value=\"" . request()->username . "\" " : ""; ?>name="username" class="form-control<?= isset($errors["username"]) ? " is-invalid" : ""; ?>" id="username">
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
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control<?= isset($errors["password"]) ? " is-invalid" : ""; ?>" id="password">
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
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
:endsection:
