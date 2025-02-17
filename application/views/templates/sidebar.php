 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<div class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
  <div class="sidebar-brand-icon">
    <img src="<?= base_url('assets/'); ?>img/tangantelkom.png" alt="" class="col-sm col-lg">
  </div>
  <div class="sidebar-brand-text">Telkom Indonesia</div>
</div>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- QUERY MENU -->
<?php

$role_id = $this->session->userdata('role_id');
$queryMenu = "SELECT `user_menu` . `id`, `menu`
              FROM `user_menu` JOIN `user_access_menu`
                ON `user_menu` . `id` = `user_access_menu` . `menu_id`
              WHERE `user_access_menu` . `role_id` = $role_id 
              ORDER BY `user_access_menu` . `menu_id` ASC
              ";

$menu = $this->db->query($queryMenu)->result_array();


?>

<!-- LOOPING MENU -->
<?php foreach($menu as $m) : ?>
<!-- <div class="sidebar-heading">
  <?php // echo $m['menu']; ?>
</div> -->

<!-- SIAPKAN SUB-MENU SESUAI MENU -->
<?php
$menuId = $m['id'];
  $querySubMenu = "SELECT *
                  FROM `user_sub_menu` JOIN `user_menu`
                    ON `user_sub_menu` . `menu_id` = `user_menu` . `id`
                  WHERE `user_sub_menu` . `menu_id` = $menuId
                  AND `user_sub_menu` . `is_active` = 1
                  ";

  $subMenu = $this->db->query($querySubMenu)->result_array();

?>
  <?php foreach ($subMenu as $sm) : ?>
  <?php if($title == $sm['title']) : ?>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
    <?php else : ?>
    <li class="nav-item">
  <?php endif; ?>

      <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
        <i class="<?= $sm['icon']; ?>"></i>
        <span><?= $sm['title']; ?></span></a>
    </li>

  <?php endforeach; ?>
  <!-- <hr class="sidebar-divider mt-3"> -->
<?php endforeach; ?>

<!-- Nav Item - Logout -->
<li class="nav-item">
  <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
    <i class="fas fa-sign-out-alt"></i>
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
