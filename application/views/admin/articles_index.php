<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Artikel</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Artikel</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>

                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div>
                        <a class="btn btn-sm btn-success" href="<?= base_url('articles/add'); ?>">Tambah artikel</a>
                        <hr>
                    </div>
                    <?php
                    if ($this->session->flashdata('messageFail')) {
                        echo '<div class="alert alert-danger" role="alert">' . $this->session->userdata('messageFail') . '</div>';
                    }
                    if ($this->session->flashdata('messageSuccess')) {
                        echo '<div class="alert alert-success" role="alert">' . $this->session->userdata('messageSuccess') . '</div>';
                    }
                    ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Date Created</th>
                                <th scope="col">Category</th>
                                <th scope="col">Action</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php $row = 1; ?>
                            <?php foreach ($articles as $article) : ?>
                                <tr>
                                    <th scope="row"><?= $row++ ?></th>
                                    <td><?= $article->title; ?></td>
                                    <td><?= $article->date_created; ?></td>
                                    <td><?= $article->category; ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="<?= base_url('articles/edit/') . $article->article_id ?>">Edit</a>
                                        <a class="btn btn-sm btn-danger" href="<?= base_url('articles/delete/') . $article->article_id ?>">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>



</div>
<!-- /.container-fluid -->