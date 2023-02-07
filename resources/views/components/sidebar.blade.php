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
      {{-- master --}}
      <li class="menu-header">Master Data</li>
      <li
        class="nav-item dropdown {{ $type_menu === 'data guru' || $type_menu === 'data-tingkatan' || $type_menu === 'data tunjangan' || 'data jam mengajar' ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-database"></i>
          <span>Master Data</span></a>
        <ul class="dropdown-menu block">
          <li class="nav-item dropdown {{ $type_menu === 'data guru' ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('data-guru') }}"><i class="fa-solid fa-users"></i></i><span>Data
                Guru</span></a>
          </li>
          <li class="nav-item dropdown {{ $type_menu === 'data-tingkatan' ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('data-tingkatan') }}"><i class="fa fa-line-chart"
                aria-hidden="true"></i><span> Data Tingkatan </span></a>
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
      <li class="menu-header">Trasaksi</li>
      <li class="nav-item dropdown {{ $type_menu === 'data-absen' || $type_menu === 'data-gajih' ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
            class="fa-solid fa-money-check-dollar"></i>
          <span>Trasaksi</span></a>
        <ul class="dropdown-menu block">
          <li class="nav-item dropdown {{ $type_menu === 'data-absen' ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/tarsaaksi') }}"><i class="fa fa-book"></i></i><span>Data
                Absensi</span></a>
          </li>
          <li class="nav-item dropdown {{ $type_menu === 'data-gajih' ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('tingkat-honor') }}"><i class="fa fa-dollar"
                aria-hidden="true"></i><span>Data Gajih</span></a>
          </li>
        </ul>
        {{-- <li class="menu-header">Laporan</li>
      <li
        class="nav-item dropdown {{ $type_menu === 'laporan-absen' || $type_menu === 'laporan-gajih' || $type_menu === 'slip-gajih' ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa-solid fa-newspaper"></i>
          <span>Laporan</span></a>
        <ul class="dropdown-menu block">
          <li class="nav-item dropdown {{ $type_menu === 'laporan-absen' ? 'active' : '' }}">
            <a class="nav-link" href=""><i class="fa-solid fa-users"></i></i><span>Laporan
                Absensi</span></a>
          </li>
          <li class="nav-item dropdown {{ $type_menu === 'laporan-gajih' ? 'active' : '' }}">
            <a class="nav-link" href="laporan-gajih"><i class="fa fa-list-alt" aria-hidden="true"></i><span>Laporan
                Gajih</span></a>
          </li>
          <li class="nav-item dropdown {{ $type_menu === 'slip-gajih' ? 'active' : '' }}">
            <a class="nav-link" href="/slip-gajih"><i class="fa-solid fa-users"></i></i><span>Slip
                Gajih</span></a>
          </li>
        </ul>
      </li> --}}

      <li class="nav-item dropdown {{ $type_menu === 'generate qr code' ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('generate-qr-code') }}"><i class="fas fa-qrcode"></i><span>Generate QR
            Code</span></a>
      </li>
      </li>
    </ul>
  </aside>
</div>
