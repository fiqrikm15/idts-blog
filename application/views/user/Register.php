<br>
<div class="container register-form">

    <div class="form-create">

        <?php echo form_open(site_url('user/register_action')); ?>

        <h3 align="center">New User Register</h3><br>

        <div class="form-group">
            <label for="title">Name</label>
            <input type="text" name="nama" id='title' class='form-control'>
            <p class="error"><?php echo form_error('nama'); ?></p>
        </div>

        <div class="form-group">
            <label for="title">Username</label>
            <input type="text" name="username" id='title' class='form-control'>
            <p class="error"><?php echo form_error('username'); ?></p>
        </div>

        <div class="form-group">
            <label for="slug">Email</label>
            <input type="text" name="email" id='slug' class='form-control'>
            <p class="error"><?php echo form_error('email'); ?></p>
        </div>

        <div class="form-group">
            <label for="slug">Password</label>
            <input type="password" name="password" id='slug' class='form-control'>
            <p class="error"><?php echo form_error('password'); ?></p>
        </div>

        <div class="form-group">
            <label for="slug">Confirm Password</label>
            <input type="password" name="c_password" id='slug' class='form-control'>
            <p class="error"><?php echo form_error('c_password'); ?></p>
        </div>

        <div class="form-group">
            <input type="submit" name="btn_register" id='btn_create' value="Register" class="btn btn-success">
            <?php echo anchor(site_url('/'), 'Cancel', "class='btn btn-danger'"); ?>
        </div>

        <?php echo form_close(); ?>

    </div>

</div>