<br>
<div class="container">

    <div class="form-create">

        <?php echo form_open(site_url('user/register_action')); ?>

        <h3 align="center">New User Register</h3><br>

        <div class="form-group">
            <label for="title">Nama</label>
            <input type="text" name="nama" id='title' placeholder='Type title for article' class='form-control'>
        </div>

        <div class="form-group">
            <label for="title">Username</label>
            <input type="text" name="username" id='title' placeholder='Type title for article' class='form-control'>
        </div>

        <div class="form-group">
            <label for="slug">Email</label>
            <input type="text" name="email" id='slug' placeholder='Type slug for article' class='form-control'>
        </div>

        <div class="form-group">
            <label for="slug">Password</label>
            <input type="text" name="password" id='slug' placeholder='Type slug for article' class='form-control'>
        </div>

        <div class="form-group">
            <label for="slug">Confirm Password</label>
            <input type="text" name="c_password" id='slug' placeholder='Type slug for article' class='form-control'>
        </div>

        <div class="form-group">
            <input type="submit" name="btn_register" id='btn_create' value="Register" class="btn btn-success">
            <?php echo anchor(site_url('/'), 'Cancel', "class='btn btn-danger'"); ?>
        </div>

        <?php echo form_close(); ?>

    </div>

</div>