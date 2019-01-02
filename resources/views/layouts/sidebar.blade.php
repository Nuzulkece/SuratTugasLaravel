<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('assets/images/sru-putih.png')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu Utama</li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        
        <!-- surat tugas -->
        <li class="treeview {{ set_active(['st_surat.index','st_surat.edit','st_surat.create','st_tujuan.index','st_tujuan.edit','st_tujuan.create','st_pegawai.index','st_pegawai.edit','st_pegawai.create'])}}">
          <a href="#">
            <i class="fa fa-briefcase"></i>
            <span>Surat Tugas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ set_active(['st_surat.index', 'st_surat.edit', 'st_surat.create'])}}"><a href="{{route('st_surat.index')}}"><i class="fa fa-envelope"></i> Surat Tugas</a></li>

            <li class="{{ set_active(['st_pegawai.index', 'st_pegawai.edit', 'st_pegawai.create'])}}"><a href="{{route('st_pegawai.index')}}"><i class="fa fa-male"></i> Manajemen Pegawai</a></li>
            
            <li class="{{ set_active(['st_tujuan.index', 'st_tujuan.edit', 'st_tujuan.create'])}}"><a href="{{route('st_tujuan.index')}}"><i class="fa fa-location-arrow"></i> Manajemen Tujuan</a></li>
          </ul>
        </li>

    </section>
  <!-- /.sidebar -->
</aside>