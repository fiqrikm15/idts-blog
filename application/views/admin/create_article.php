<div class="container">

    <div class="form-create">

        <?php echo form_open(site_url('admin/create_action')); ?>

        <h3 align="center">Create Article</h3><br>

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id='title' placeholder='Type title for article' class='form-control'>
        </div>

        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" name="slug" id='slug' placeholder='Type slug for article' class='form-control'>
        </div>

        <div class="form-group">
            <label for="">Content</label>
            <div class="form-group">
                <textarea name="content" class="form-control" rows="10">Type Your Content Here!</textarea>
            </div>
        </div>

        <div class="form-group">
            <input type="submit" name="btn_create" id='btn_create' value="Create Article" class="btn btn-success">
            <?php echo anchor(site_url('admin'), 'Cancel', "class='btn btn-danger'"); ?>
        </div>

        <?php echo form_close(); ?>

    </div>

</div>