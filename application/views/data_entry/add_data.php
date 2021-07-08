     
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title">Tambah Data</h3>
                    <form class="forms-sample" action="<?= base_url('data_entry/add_data'); ?>" method="POST">
                    <?php echo form_open_multipart('data_entry/add_data'); ?>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Pasien</label>
                            <input type="text" class="form-control p-input" name="nama_pasien" id="nama_pasien" aria-describedby="emailHelp" placeholder="Masukkan Nama">
                            <?= form_error('nama_pasien', '<small class="text-danger" pl-3>', '</small>') ?>
                        </div>
                        
                        
                            <input type="text" hidden class="form-control p-input" name="nama_penginput" id="nama_penginput" aria-describedby="emailHelp" value="<?= $user['nama'] ?>">
                        <div class="form-group">
                            <label for="exampleInputPassword1">NIK</label>
                            <input type="text" class="form-control p-input" name="nik" id="nik" placeholder=" Masukkan NIK">
                            <?= form_error('nik', '<small class="text-danger" pl-3>', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea">Alamat</label>
                            <textarea class="form-control p-input" id="alamat_pasien" name="alamat_pasien" rows="3" placeholder="Masukan Alamat Pasien"></textarea>
                            <?= form_error('alamat_pasien', '<small class="text-danger" pl-3>', '</small>') ?>
                        </div>
                        
                        <fieldset class="form-group">
                            <Label>Jenis Kelamin</Label>
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="jk_pasien" id="jk_pasien" value="Laki-laki">Laki-laki
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="jk_pasien" id="jk_pasien" value="Perempuan">Perempuan
                                </label>
                            </div>
                            <?= form_error('jk_pasien', '<small class="text-danger" pl-3>', '</small>') ?>
                        </fieldset>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Umur Pasien</label>
                            <input type="text" class="form-control p-input" id="umur_pasien" name="umur_pasien"  placeholder="Masukkan Umur Pasien">
                            <?= form_error('no_hp', '<small class="text-danger" pl-3>', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Periksa</label>
                            <input type="date" class="form-control p-input" id="tanggal_periksa" name="tanggal_periksa">
                            <?= form_error('tanggal_periksa', '<small class="text-danger" pl-3>', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jam Periksa</label>
                            <input type="time" class="form-control p-input" id="jam_periksa" name="jam_periksa">
                            <?= form_error('jam_periksa', '<small class="text-danger" pl-3>', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">No. Surat/Register</label>
                            <input type="text" class="form-control p-input" id="no_surat" name="no_surat" placeholder="Masukkan Nomor Surat/registrasi">
                            <?= form_error('nama', '<small class="text-danger" pl-3>', '</small>') ?>
                        </div>
                            <input type="text" hidden class="form-control p-input" id="asal_rs" name="asal_rs"  value="<?= $user['tempat_kerja'] ?>">
                        <fieldset class="form-group">
                            <Label>Hasil Pemeriksaan</Label>
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="hasil" id="hasil" value="Positif">Positif
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="hasil" id="hasil" value="Negatif">Negatif
                                </label>
                            </div>
                            <?= form_error('jk', '<small class="text-danger" pl-3>', '</small>') ?>
                        </fieldset>
                        <div class="form-group">
                        <label>Jenis Pemeriksaan</label>
                        <select class="js-example-basic-single" id="jenis_pemeriksaan" name="jenis_pemeriksaan" style="width:100%">
                            <option value="Swab Antigen">Swab Antigen</option>
                            <option value="Swab PCR">Swab PCR</option>
                            <option value="Genose">Genose</option>
                        </select>
                        <?= form_error('level_user', '<small class="text-danger" pl-3>', '</small>') ?>
                        </div>
                        <div class="form-check col-12">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" required>
                            Apakah Data Sudah Benar ?
                            </label>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            
            
            
            
            
            
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
