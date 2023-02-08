<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">YALMA-KU</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">YAKU</a>
    </div>

    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="nav-item dropdown {{ $type_menu === 'dashboard' ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('dashboard') }}"><i class="fas fa-fire"></i><span>Dashboard</span></a>
      </li>
      <li class="nav-item dropdown {{ $type_menu === 'scan qr' ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('scan') }}"><i class="fas fa-camera"></i><span>Scan Qr</span></a>
      </li>

      <li class="nav-item dropdown {{ $type_menu === 'status' ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('status-guru') }}"><i class="fas fa-check"></i><span>Status</span></a>
      </li>

      <li class="nav-item dropdown {{ $type_menu === 'generate qr code' ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('generate-qr-code') }}"><i class="fas fa-qrcode"></i><span>Generate QR
            Code</span></a>
      </li>
      {{-- master --}}
      <li class="menu-header">Master Data</li>
      <li
        class="nav-item dropdown {{ $type_menu === 'data guru' || $type_menu === 'data jabatan' || $type_menu === 'data tunjangan' || $type_menu === 'data jam mengajar' ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-database"></i>
          <span>Master Data</span></a>
        <ul class="dropdown-menu block">
          <li class="nav-item dropdown {{ $type_menu === 'data guru' ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('data-guru') }}"><i class="fa-solid fa-users"></i></i><span>Data
                Guru</span></a>
          </li>
          <li class="nav-item dropdown {{ $type_menu === 'data jabatan' ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('data-jabatan') }}"><i class="fa fa-line-chart"
                aria-hidden="true"></i><span> Data Jabatan</span></a>
          </li>
          <li class="nav-item dropdown {{ $type_menu === 'data tunjangan' ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('data-tunjangan') }}"><i class="fa fa-usd"
                aria-hidden="true"></i></i><span>Data Tunjangan</span></a>
          </li>
          <li class="nav-item dropdown {{ $type_menu === 'data jam mengajar' ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('data-jam-mengajar') }}"><i class="fa fa-calendar"
                aria-hidden="true"></i></i><span>Data jam Mengajar</span></a>
          </li>
        </ul>
      </li>

      <li class="menu-header">Trasaksi</li>
      <li class="nav-item dropdown {{ $type_menu === 'laporan-gaji' ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
            class="fa-solid fa-money-check-dollar"></i>
          <span>Laporan</span></a>
        <ul class="dropdown-menu block">
          <li class="nav-item dropdown {{ $type_menu === 'laporan-gaji' ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('laporan-gaji') }}"><i class="fa fa-dollar"
                aria-hidden="true"></i><span>Gaji Guru</span></a>
          </li>
        </ul>
      </li>
    </ul>
  </aside>
</div>
