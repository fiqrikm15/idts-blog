<div class="container">

    <div class="sidebar">

        <ul class="nav flex-column">
            <li class="nav-item">
                <img class="circle" src="<?php echo base_url(); ?>/assets/img/profile.png"></img><br>
                <p class="name">Welcome, <?php echo $this->session->userdata['nama']; ?></p>
            </li>
            <hr>
            <li class="nav-item">
                <?php echo anchor(site_url('admin'), 'Article List', 'class="nav-link active"'); ?>
            </li>

            <li class="nav-item">
                <?php echo anchor(site_url('admin/create_article'), 'Create Article', 'class="nav-link active"'); ?>
            </li>

            <li class="nav-item">
                <?php echo anchor(site_url('user/logout'), 'Logout', array('class' => 'nav-link disabled')); ?>
            </li>
        </ul>

    </div>

</div>