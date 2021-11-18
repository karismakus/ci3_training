<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Data Pegawai</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pegawai</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div>
                        <a class="btn btn-sm btn-success" href="<?= base_url('employees/add'); ?>">Tambah data</a>
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
                                <th scope="col">ID</th>
                                <th scope="col">Departement</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Address</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Action</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php $row = 1; ?>
                            <?php foreach ($employees as $employee) : ?>
                                <tr>
                                    <th scope="row"><?= $row++ ?></th>
                                    <td><?= $employee->ID; ?></td>
                                    <td><?= $employee->departement; ?></td>
                                    <td><?= $employee->name; ?></td>
                                    <td><?= $employee->email; ?></td>
                                    <td><?= $employee->address; ?></td>
                                    <td><?= $employee->phone; ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="<?= base_url('employees/edit/') . $employee->ID ?>">Edit</a>
                                        <a class="btn btn-sm btn-danger" href="<?= base_url('employees/delete/') . $employee->ID ?>">Delete</a>
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