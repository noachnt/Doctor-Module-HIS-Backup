<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <i class="fas fa-user-md"></i>
        </div>
        <div class="sidebar-brand-text mx-3">MedicGo </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- QUERY Menu -->

    <?php
    $role_id = $this->session->userdata('role_id');
    $queryMenu = "SELECT `user_menu`.`id`, `menu`  
                    FROM `user_menu` JOIN `user_access_menu`  
                      ON `user_menu`.`id` = `user_access_menu`.`menu_id` 
                   WHERE `user_access_menu`.`role_id` = $role_id 
                ORDER BY `user_access_menu`.`menu_id` ASC 
                   ";

    $menu = $this->db->query($queryMenu)->result_array();
    ?>

    <!-- LOOPING MENU -->
    <!-- Heading -->
    <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading">
            <?= $m['menu']; ?>
        </div>


        <!-- SIAPKAN SUB-MENU SESUAI MENU -->
        <?php

        $menuId = $m['id'];
        $querySubMenu = "SELECT *
                           FROM `user_sub_menu` JOIN `user_menu`
                             ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                          WHERE `user_sub_menu`.`menu_id` = $menuId
                            AND `user_sub_menu`.`is_active` = 1
           ";

        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>

        <?php foreach ($subMenu as $sm) :  ?>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= ($title == $sm['title']) ? 'active' : '' ?>">
                <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                    <i class="<?= $sm['icon']; ?>"></i>
                    <span><?= $sm['title']; ?></span></a>
            </li>
        <?php endforeach; ?>
        <!-- Divider -->
        <hr class="sidebar-divider mt-3">
    <?php endforeach; ?>


    <!-- Nav Item - Patient Menu-->
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMenu1" aria-expanded="true" aria-controls="collapseMenu1">
            <i class="fas fa-fw fa-user-injured"></i>
            <span>Patient</span>
        </a>
        <div id="collapseMenu1" class="collapse" aria-labelledby="headingMenu1" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="text-wrap collapse-item" href="newpatientform.html">Add New Patient</a>
                <a class="text-wrap collapse-item" href="viewpatientlist.html">View Patient List</a>

            </div>
        </div>
    </li>  -->


    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout') ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->