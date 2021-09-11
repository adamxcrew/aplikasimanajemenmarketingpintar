 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-dark1 sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('marketing') ?>">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fab fa-fw fa-monero"></i>
         </div>
         <div class="sidebar-brand-text mx-3">M-SMART</div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my">

     <!-- Heading -->
     <div class="sidebar-heading">
         Marketing
     </div>

     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('marketing') ?>">
             <i class="fas fa-fw fa-house-user"></i>
             <span>Halaman Marketing</span></a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('marketing/pelanggan'); ?>">
             <i class="fas fa-fw fa-table"></i>
             <span>Data Pelanggan</span></a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('marketing/termin'); ?>">
             <i class="fas fa-fw fa-user"></i>
             <span>Data Order Pelanggan</span></a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('marketing/reminder'); ?>">
             <i class="fas fa-fw fa-inbox"></i>
             <span>Termin Reminder</span></a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('marketing/pendapatan'); ?>">
             <i class="fas fa-fw fa-money-check-alt"></i>
             <span>Pendapatan Marketing</span></a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('marketing/laporanku'); ?>">
             <i class="fas fa-fw fa-poll"></i>
             <span>Laporan Pendapatan</span></a>
     </li>

     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
             <i class="fas fa-fw fa-cog"></i>
             <span>Pengaturan</span>
         </a>
         <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Profil</h6>
                 <a class="collapse-item" href="<?= base_url('pengaturan') ?>">Profil</a>
                 <a class="collapse-item" href="#" data-toggle="modal" data-target="#ubahProfilModal">Ubah Profil</a>
                 <a class="collapse-item" href="#" data-toggle="modal" data-target="#ubahPasswordModal">Ganti Kata Sandi</a>
             </div>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

 </ul>
 <!-- End of Sidebar -->