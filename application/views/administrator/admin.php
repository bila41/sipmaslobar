<div class="container-fluid">
    <div class="text-dark m-2"><?= date('l, d M Y'); ?></div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <a class="breadcrumb-item text-info" href="<?= base_url('administrator'); ?>">Dashboard</a>
            <li class="breadcrumb-item active">Admin</li>
        </ol>
    </nav>

    <div class="row mb-4">
        <div class="col-lg-7">
            <div class="row mb-4">
                <div class="col">
                    <a href="#" class="btn btn-info">Daftarkan Admin Baru <i class="fa fa-plus"></i> </a>
                </div>
            </div>
            <div class="card shadow">
                <div class="card-header h4 text-dark text-center">
                    <i class="fa">Admin</i>
                </div>
                <div class="card-body">
                    <div class="tabel-responsive">
                        <table class="table table-bordered p-4">
                            <thead class="thead strong text-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($admin as $a) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $a["nama_admin"]; ?></td>
                                        <td><?= $a["email"]; ?></td>
                                        <td><?= $a["username"]; ?></td>
                                        <td>
                                            <div class="dropdown show">
                                                <a class="badge badge-info dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"> Aksi
                                                </a>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item" href="#">Detail</a>
                                                    <a class="dropdown-item" href="#">Hapus</a>
                                                </div>
                                            </div>
                                        </td>
                                    </div>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>