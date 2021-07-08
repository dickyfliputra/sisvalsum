     
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          <div class="row ">
              <div class="col-12 grid-margin">
               <div class="card mb-3 card-body" style="max-width: 540px;">
               <h3 class="card-title">Profile Saya</h3>
               <div class="row g-0">
                        <div class="col-md-4">
                        <img src="<?= base_url('assets/img/profile/') . $user['foto'] ; ?>" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $user['nama'] ; ?></h5>
                            <p class="card-text"><?= $user['email'] ; ?></p>
                            <p class="card-text"><?= $user['jabatan'] . ' ' . 'di ' . $user['tempat_kerja'] ; ?></p>
                            <p class="card-text"><small class="text-muted">Akun Dibuat Sejak <?= date('d F Y', $user['date_create']); ?></small></p>
                        </div>
                        </div>
                    </div>
                    </div>
                    
                </div>
                <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit Profile</h4>
                    
                    <form class="forms-sample" method="POST" action="<?= base_url('profile/edit_profile'); ?>">
                    <?php echo form_open_multipart('admin/edit_profile'); ?>
                      <div class="form-group">
                        <label for="exampleInputName1">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama'] ?>">
                        <?= form_error('nama', '<small class="text-danger" pl-3>', '</small>') ?>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Alamat Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" >
                        <?= form_error('email', '<small class="text-danger" pl-3>', '</small>') ?>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Tempat Kerja</label>
                        <input type="text" class="form-control" id="tempat_kerja" name="tempat_kerja" value="<?= $user['tempat_kerja'] ?>">
                        <?= form_error('tempat_kerja', '<small class="text-danger" pl-3>', '</small>') ?>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Tempat Kerja</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $user['no_hp'] ?>">
                        <?= form_error('no_hp', '<small class="text-danger" pl-3>', '</small>') ?>
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Jenis Kelamin</label>
                        <select class="form-control" id="jk" name="jk">
                            
                          <option value="Laki-laki">Laki-Laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                        <?= form_error('jk', '<small class="text-danger" pl-3>', '</small>') ?>
                      </div>
                      <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="foto" id="foto" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" name="foto" id="foto" placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                          </span>
                        </div>
                        <?= form_error('foto', '<small class="text-danger" pl-3>', '</small>') ?>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">Jabatan</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= $user['jabatan'] ?>">
                        <?= form_error('jabatan', '<small class="text-danger" pl-3>', '</small>') ?>
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="4" ><?= $user['alamat'] ?></textarea>
                        <?= form_error('alamat', '<small class="text-danger" pl-3>', '</small>') ?>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-dark">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
              </div>
              
            </div>
            
            
            
            
            
            
          </div>
          
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
