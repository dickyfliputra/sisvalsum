      <!-- partial -->
      <?php
      $corona = file_get_contents('https://api.kawalcorona.com/indonesia/provinsi');
      $indonesia = file_get_contents('https://api.kawalcorona.com/indonesia');
      $crn = json_decode($corona, true);
      $ind = json_decode($indonesia, true);
      foreach ($crn as $c) {
        if ($c['attributes']['Kode_Provi'] == 34) {
          $positif = $c['attributes']['Kasus_Posi'];
          $sembuh = $c['attributes']['Kasus_Semb'];
          $meninggal = $c['attributes']['Kasus_Meni'];
        }
      }
      foreach ($ind as $i) {
        $ind = $i['positif'];
      }
      ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

          <div class="row">
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-9">
                      <div class="d-flex align-items-center align-self-start">
                        <h3 class="mb-0"><?= $positif ?></h3>
                        <p class="text ml-2 mb-0 font-weight-medium"> Kasus</p>
                      </div>
                    </div>

                  </div>
                  <h6 class="text-muted font-weight-normal">Positif</h6>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-9">
                      <div class="d-flex align-items-center align-self-start">
                        <h3 class="mb-0"><?= $meninggal ?></h3>
                        <p class="text ml-2 mb-0 font-weight-medium"> Kasus</p>
                      </div>
                    </div>

                  </div>
                  <h6 class="text-muted font-weight-normal">Meninggal</h6>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-9">
                      <div class="d-flex align-items-center align-self-start">
                        <h3 class="mb-0"><?= $sembuh ?></h3>
                        <p class="text ml-2 mb-0 font-weight-medium"> Kasus</p>
                      </div>
                    </div>

                  </div>
                  <h6 class="text-muted font-weight-normal">Sembuh</h6>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-9">
                      <div class="d-flex align-items-center align-self-start">
                        <h3 class="mb-0"><?= $ind ?></h3>
                        <p class="text ml-2 mb-0 font-weight-medium"> Kasus</p>
                      </div>
                    </div>

                  </div>
                  <h6 class="text-muted font-weight-normal">Keseluruhan Indonesia</h6>
                </div>
              </div>
            </div>
          </div>





        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->