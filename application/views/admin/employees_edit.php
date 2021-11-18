<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Pegawai</h1>
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

                    <form action="<?= base_url('employees/edit_proses'); ?>" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama lengkap</label>
                            <input readonly value="<?= $employee['ID'] ?>" name="ID" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan nama lengkap">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama lengkap</label>
                            <input value="<?= $employee['name'] ?>" name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan nama lengkap">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat email</label>
                            <input value="<?= $employee['email'] ?>" name=" email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan email">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama lengkap</label>
                            <textarea class="form-control" name="address" id="" cols="30" rows="5"><?= $employee['address'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">No Telepon</label>
                            <input value="<?= $employee['phone'] ?>" name="phone" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan nama lengkap">

                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a class="btn btn-secondary" href="<?= base_url('employees/index'); ?>">Batal</a>
                    </form>
                </div>
            </div>
        </div>

    </div>



</div>
<!-- /.container-fluid -->