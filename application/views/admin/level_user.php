      <!-- partial -->
      
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            
            
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Management Level Pengguna</h3>
                            <p class="card-description"> Halaman ini untuk mengatur level dari pengguna yang terdaftar pada sistem.</code>
                            </p>
                            <?= $this->session->flashdata('pesan'); ?>
                            
                            <br>
                            <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th> Nama </th>
                                    <th> Email </th>
                                    <th> Level Pengguna </th>
                                    <th> Dibuat Sejak </th>
                                    <th> Action </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($pengguna as $p) : ?>
                                <tr>
                                    <td class="py-1">
                                    <?= $p['nama'] ?>
                                    </td>
                                    <td> <?= $p['email'] ?></td>
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
                                    <td> 
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="mdi mdi-security"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                                        <h6 class="dropdown-header">Ubah level</h6>
                                        <a class="dropdown-item" href="<?= base_url('admin/ubah_admin/') . $p['id'] ?>">Administrator</a>
                                        <a class="dropdown-item" href="<?= base_url('admin/ubah_valid/') . $p['id'] ?>">Validator</a>
                                        <a class="dropdown-item" href="<?= base_url('admin/ubah_data/') . $p['id'] ?>">Data Entry</a>
                                        
                                    </div> 
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
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
