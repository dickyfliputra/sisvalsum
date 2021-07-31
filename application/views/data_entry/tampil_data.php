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
                          <a type="button" href="<?= base_url('data_entry/add_data') ?>" class="btn btn-primary btn-icon-text">
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
                                          <th> Aksi </th>
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
                                                if ($p['hasil'] == "Positif") {
                                                    echo '<td><label class="badge badge-danger">Positif</label></td>';
                                                } else {
                                                    echo '<td><label class="badge badge-success">Negatif</label></td>';
                                                }
                                                ?>
                                              <td> <?= $p['jenis_pemeriksaan'] ?> </td>
                                              <td> <?= $p['nama_penginput'] ?> </td>
                                              <td>
                                                  <div class="dropdown">
                                                      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                          <i class="mdi mdi-border-color"></i>
                                                      </button>
                                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                                                          <a class="dropdown-item" href="<?= base_url('data_entry/cetak_surat/') . $p['id'] ?>">Cetak</a>
                                                          <a class="dropdown-item" href="<?= base_url('data_entry/edit_surat/') . $p['id'] ?>">Edit</a>
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