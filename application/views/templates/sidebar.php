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
         Admin M-Mart
     </div>

     <!-- Nav Item - Dashboard -->
     <li class="nav-item">

         <a class="nav-link pb" href="<?= base_url('admin') ?>">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Halaman Admin</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider my">

      <!-- Heading -->
     <div class="sidebar-heading">
         Web
     </div>

     <!-- Nav Item - Dashboard -->
     <li class="nav-item">

         <a class="nav-link pb" href="<?= base_url('admin/jenis') ?>">
             <i class="fas fa-fw fa-tags"></i>
             <span>Jenis & Harga</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider my">

     <!-- Heading -->
     <div class="sidebar-heading">
         Supervisor
     </div>
     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('admin/supervisor') ?>">
             <i class="fas fa-fw fa-poll"></i>
             <span>Data Supervisor</span></a>
     </li>

     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
             <i class="fas fa-fw fa-comment-dollar"></i>
             <span>Data Termin</span>
         </a>
         <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Termin pembayaran</h6>
                 <a class="collapse-item" href="<?= base_url('admin/datatermin'); ?>">Proses</a>
                 <a class="collapse-item" href="<?= base_url('admin/selesai'); ?>">Selesai</a>
                 <a class="collapse-item" href="<?= base_url('admin/ditolak'); ?>">Ditolak</a>
             </div>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('admin/laporan') ?>">
             <i class="fas fa-fw fa-poll"></i>
             <span>Laporan Pembayaran</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Marketing
     </div>

     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('admin/marketer') ?>">
             <i class="fas fa-fw fa-users"></i>
             <span>Data Marketing</span></a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('admin/pendapatan_marketing') ?>">
             <i class="fas fa-fw fa-dollar-sign"></i>
             <span>Pendapatan Marketing</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Pelanggan
     </div>

     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('admin/pelanggan') ?>">
             <i class="fas fa-fw fa-table"></i>
             <span>Data Pelanggan</span></a>
     </li>


     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

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

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

 </ul>
 <!-- End of Sidebar -->