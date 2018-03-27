<div class="container article-list">

    <h3 align="center">Article List</h3>

    <table class="table">
        <thead class="thead-dark" align="center">
            <tr>
                <th>No.</th>
                <th>Title</th>
                <th>Author</th>
                <th>Status</th>
                <th>Date Created</th>
                <th>Last Update</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody class="thead-light" align="center">
            <?php 
            $i = 0;
            foreach($article as $articles): 
                $i++;
            ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $articles->title; ?></td>
                    <td><?php echo $articles->nama; ?></td>
                    <td><?php echo $articles->status; ?></td>
                    <td><?php echo $articles->tgl_create; ?></td>
                    <td><?php echo $articles->last_update; ?></td>
                    <td><?php echo anchor(site_url('admin/edit/'.$articles->id_article), 'Edit', 'class="btn btn-outline-warning btn-sm"'); ?></td>
                    <td><?php echo anchor(site_url('admin/delete/'.$articles->id_article), 'Delete', 'class="btn btn-outline-danger btn-sm"'); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>