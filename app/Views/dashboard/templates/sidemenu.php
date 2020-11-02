<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <?php $nivel = $_SESSION['token']['nivel'] ?>
      <div class="logo"><a href="#" class="simple-text logo-normal">
          Mascotas 
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item <?php if($_SERVER['PATH_INFO'] == '/dashboard'): echo 'active'; endif ?> ">
            <a class="nav-link" href="<?= base_url(); ?>/dashboard">
              <i class="material-icons">person</i>
              <p>Perfil</p>
            </a>
          </li>
          <li class="nav-item <?php if($_SERVER['PATH_INFO'] == '/dashboard/citas'): echo 'active'; endif ?>">
            <a class="nav-link" href="<?= base_url(); ?>/dashboard/citas">
              <i class="fas fa-clipboard-list"></i>
              <p>Citas</p>
            </a>
          </li>
          <li class="nav-item <?php if($_SERVER['PATH_INFO'] == '/dashboard/agenda_citas'): echo 'active'; endif ?>">
            <a class="nav-link" href="<?= base_url(); ?>/dashboard/agenda_citas">
              <i class="fas fa-clipboard-list"></i>
              <p>Agenda citas</p>
            </a>
          </li>
          <?php if($nivel !='cliente'): ?>
          <li class="nav-item <?php if($_SERVER['PATH_INFO'] == '/dashboard/mascotas'): echo 'active'; endif ?>">
            <a class="nav-link" href="<?= base_url(); ?>/dashboard/mascotas">
              <i class="material-icons">content_paste</i>
              <p>Mascotas</p>
            </a>
          </li>
          <li class="nav-item <?php if($_SERVER['PATH_INFO'] == '/dashboard/doctores'): echo 'active'; endif ?>">
            <a class="nav-link" href="<?= base_url(); ?>/dashboard/doctores">
              <i class="fas fa-user-md""></i>
              <p>Doctores</p>
            </a>
          </li>
          <?php endif; ?>
          <?php if($nivel != 'cliente' or $nivel != 'doctor'): ?>
          <li class="nav-item <?php if($_SERVER['PATH_INFO'] == '/dashboard/configuracion'): echo 'active'; endif ?>">
            <a class="nav-link" href="<?= base_url(); ?>/dashboard/configuracion">
              <i class="material-icons">folder</i>
              <p>Configuración</p>
            </a>
          </li>
          <?php endif; ?>
          <li class="nav-item ">
            <a class="nav-link" href="<?= base_url() ?>/dashboard/logout">
            <i class="material-icons">person</i>
              <p>Cerrar sesión</p>
            </a>
          </li>
        </ul>
      </div>
    </div>