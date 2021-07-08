      <!-- partial -->
      
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            
            
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Management Data Surat</h3>
                            <p class="card-description"> Halaman untuk mengatur data surat yang akan divalidasi.</code>
                            </p>
                            <?= $this->session->flashdata('pesan'); ?>
                            <a type="button" href="<?= base_url('data_entry/add_data') ?>"  class="btn btn-primary btn-icon-text">
                            <i class="mdi mdi-account-plus btn-icon-prepend"></i> Tambahkan Data Surat </a>
                            <br>
                            <br>
                            <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th> Nama Pasien </th>
                                    <th> NIK </th>
                                    <th> Alamat </th>
                                    <th> Jenis Kelamin </th>
                                    <th> Umur </th>
                                    <th> Tanggal Periksa </th>
                                    <th> Jam Periksa </th>
                                    <th> No. Surat </th>
                                    <th> Asal RS </th>
                                    <th> Hasil Pemeriksaan </th>
                                    <th> Jenis Pemeriksaan </th>
                                    <th> Inputer </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($surat as $p) : ?>
                                <tr>
                                    <td class="py-1">
                                    <?= $p['nama_pasien'] ?>
                                    </td>
                                    <td> <?= $p['nik'] ?></td>
                                    <td>
                                    <?= $p['alamat_pasien'] ?>
                                    </td>
                                    <td> <?= $p['jk_pasien'] ?> </td>
                                    <td> <?= $p['umur_pasien'] ?> </td>
                                    <td> <?= $p['tanggal_periksa'] ?> </td>
                                    <td> <?= $p['jam_periksa'] ?> </td>
                                    <td> <?= $p['no_surat'] ?> </td>
                                    <td> <?= $p['asal_rs'] ?> </td>
                                    <?php 
                                    if ($p['hasil'] == "Positif")
                                    {
                                        echo '<td><span class="badge bg-danger">Positif</span></td>';
                                    } else {
                                        echo '<td><span class="badge bg-success">Negatif</span></td>';
                                    }
                                     ?>
                                    <td> <?= $p['jenis_pemeriksaan'] ?> </td>
                                    <td> <?= $p['nama_penginput'] ?> </td>
                                   
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
