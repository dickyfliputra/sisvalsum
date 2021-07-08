    <?php
    $role_id = $this->session->userdata('role_id');
    $queryMenu = "SELECT `user_menu`.`id`, `title`, `menu`
                        FROM `user_menu` JOIN `user_access_menu` 
                        ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                        WHERE `user_access_menu`.`role_id` = $role_id
                        ORDER BY `user_access_menu`.`menu_id` ASC";
    $menu = $this->db->query($queryMenu)->result_array();
    ?>
          <?php foreach ($menu as $m) : ?>
            <li class="nav-item nav-category">
            <span class="nav-link"><?= $m['title'] ?></span>
          </li>
          <?php
          $menuId = $m['id'];
          $querySubmenu = "SELECT *
                          FROM `user_sub_menu`
                          WHERE `menu_id` = $menuId
                          AND `is_active` = 1";
          $submenu = $this->db->query($querySubmenu)->result_array();
          ?>
            <?php foreach ($submenu as $sm) : ?>
              <li class="nav-item menu-items">
                <a class="nav-link" href="<?= base_url() . $sm['url'] ?>">
                  <span class="menu-icon">
                    <i class="<?= $sm['icon'] ?>"></i>
                  </span>
                  <span class="menu-title"><?= $sm['title'] ?></span>
                </a>
              </li>
            <?php endforeach; ?>
          <?php endforeach; ?>
        </ul>
      </nav>
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="<?= base_url('assets/template/'); ?>assets/images/logo-mini.svg" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" data-toggle="dropdown">
                  <div class="navbar-profile">
                    <img class="img-xs rounded-circle" src="<?= base_url('assets/img/profile/') . $user['foto'] ; ?>" alt="">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name"><?= $user['nama'] ?></p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item" href="<?= base_url('auth/logout') ?>">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Log out</p>
                    </div>
                  </a>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>