<dic class="container">

    <div class="sidebar">

        <ul class="nav flex-column">
            <li class="nav-item">
                <img class="circle" src="<?php echo base_url(); ?>/assets/img/profile.png"></img><br>
                <p class="name">Welcome, </p>
            </li>

            <li class="nav-item">
                <?php echo anchor(site_url('admin'), 'Article List', 'class="nav-link active"'); ?>
            </li>

            <li class="nav-item">
                <?php echo anchor(site_url('admin/create_article'), 'Create Article', 'class="nav-link active"'); ?>
            </li>

            <li class="nav-item">
                <a class="nav-link disabled" href="#">Logout</a>
            </li>
        </ul>

    </div>

</div>