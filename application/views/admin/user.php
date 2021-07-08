      <!-- partial -->
      
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            
            
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Management Pengguna</h3>
                            <p class="card-description"> Halaman untuk mengatur pengguna yang terdaftar pada sistem.</code>
                            </p>
                            <a type="button" href="<?= base_url('admin/tambah_user') ?>"  class="btn btn-primary btn-icon-text">
                            <i class="mdi mdi-account-plus btn-icon-prepend"></i> Tambahkan Pengguna Baru </a>
                            <br>
                            <br>
                            <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th> Nama </th>
                                    <th> Email </th>
                                    <th> Alamat </th>
                                    <th> Nomor Hp </th>
                                    <th> Jenis Kelamin </th>
                                    <th> Jabatan </th>
                                    <th> Lokasi Kerja </th>
                                    <th> Level Pengguna </th>
                                    <th> Dibuat Sejak </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($pengguna as $p) : ?>
                                <tr>
                                    <td class="py-1">
                                    <?= $p['nama'] ?>
                                    </td>
                                    <td> <?= $p['email'] ?></td>
                                    <td>
                                    <?= $p['alamat'] ?>
                                    </td>
                                    <td> <?= $p['no_hp'] ?> </td>
                                    <td> <?= $p['jk'] ?> </td>
                                    <td> <?= $p['jabatan'] ?> </td>
                                    <td> <?= $p['tempat_kerja'] ?> </td>
                                    <?php 
                                    if ($p['level_user'] == 1) {
                                        echo '<td> Administrator </td>';
                                        } 
                                    else if ($p['level_user'] == 2){
                                        echo '<td> Validator </td>';
                                    } 
                                    else {
                                    echo '<td>Data Entry</td>';
                                    }?>
                                    <td> <?= date('d F Y', $user['date_create']); ?> </td>
                                </tr>
                                <?php endforeach; ?>
                                
                                </tbody>
                            </table>
                            </div>
                        </div>
                        </div>
                    </div>
              
            
            
            
            
            
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
