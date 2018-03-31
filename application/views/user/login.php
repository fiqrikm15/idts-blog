<div class="container form-login">

    <div class="form-create">

        <?php echo form_open(site_url('user/login_action')); ?>

        <h4 align="center">User Login</h4>
        <hr>

        <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label">Username</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" id="staticEmail" name="email" placeholder="username">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-9">
            <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12">
            <input type="submit" class="btn btn-primary btn-sm btn-lg btn-block" id="login-btn" name="login-btn" value="Login">
            </div>
        </div>

        <?php echo form_close(); ?>

    </div>

</div>