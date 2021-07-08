     
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title">Tambah Data</h3>
                    <form class="forms-sample" action="<?= base_url('data_entry/add_data'); ?>" method="POST">
                    <?php echo form_open_multipart('admin/tambah_user'); ?>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat Email</label>
                            <input type="email" class="form-control p-input" name="email" id="email" aria-describedby="emailHelp" placeholder="Masukkan email">
                            <?= form_error('email', '<small class="text-danger" pl-3>', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control p-input" name="password" id="password" placeholder="Password">
                            <?= form_error('password', '<small class="text-danger" pl-3>', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Pengguna</label>
                            <input type="text" class="form-control p-input" id="nama" name="nama" placeholder="Masukkan Nama Pengguna">
                            <?= form_error('nama', '<small class="text-danger" pl-3>', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nomor Handphone</label>
                            <input type="text" class="form-control p-input" id="no_hp" name="no_hp"  placeholder="Masukkan Nomor Handphone">
                            <?= form_error('no_hp', '<small class="text-danger" pl-3>', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jabatan</label>
                            <input type="text" class="form-control p-input" id="jabatan" name="jabatan" placeholder="Masukkan Jabatan">
                            <?= form_error('jabatan', '<small class="text-danger" pl-3>', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tempat Kerja</label>
                            <input type="text" class="form-control p-input" id="tempat_kerja" name="tempat_kerja" placeholder="Masukkan Tempat Kerja">
                            <?= form_error('tempat_kerja', '<small class="text-danger" pl-3>', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea">Alamat</label>
                            <textarea class="form-control p-input" id="alamat" name="alamat" rows="3" placeholder="Masukan Alamat"></textarea>
                            <?= form_error('alamat', '<small class="text-danger" pl-3>', '</small>') ?>
                        </div>
                        <fieldset class="form-group">
                            <Label>Jenis Kelamin</Label>
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="jk" id="jk" value="Laki-laki">Laki-laki
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="jk" id="jk" value="Perempuan">Perempuan
                                </label>
                            </div>
                            <?= form_error('jk', '<small class="text-danger" pl-3>', '</small>') ?>
                        </fieldset>
                        <div class="form-group">
                        <label>Level Pengguna</label>
                        <select class="js-example-basic-single" id="level_user" name="level_user" style="width:100%">
                            <option value="1">Administrator</option>
                            <option value="2">Validator</option>
                            <option value="3">Data Entry</option>
                        </select>
                        <?= form_error('level_user', '<small class="text-danger" pl-3>', '</small>') ?>
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputFile">Foto Profile</label>
                            <input type="file" class="form-control-file" id="foto" name="foto" aria-describedby="fileHelp">
                            <?= form_error('foto', '<small class="text-danger" pl-3>', '</small>') ?>
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
