<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Yalma-Ku</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">YAKU</a>
        </div>
        
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown {{ $type_menu === 'dashboard' ? 'active' : '' }}">
                <a class="nav-link"
                href="{{ url('dashboard-general-dashboard') }}"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="nav-item dropdown {{ $type_menu === 'AmbilQR' ? 'active' : '' }}">
                <a class="nav-link"
                href="{{ url('scan') }}"><i class="fas fa-camera"></i><span>Scan Qr</span></a>
            </li>
            <li class="nav-item dropdown {{ $type_menu === 'AmbilQR' ? 'active' : '' }}">
                <a class="nav-link"
                href="{{ url('rekap-absen') }}"><i class="fa fa-book mr-0 mr-md-4" aria-hidden="true"></i><span>Rekap Absen</span></a>
            </li>
            <li class="nav-item dropdown {{ $type_menu === 'statusguru' ? 'active' : '' }}">
                <a class="nav-link"
                href="{{ url('status-guru') }}"><i class="fas fa-check"></i><span>Status</span></a>
            </li>
            <li class="menu-header">Master Data</li>
            <li class="nav-item dropdown {{ $type_menu === 'layout' ? 'active' : '' }}">
                <a href="#"
                    class="nav-link has-dropdown"
                    data-toggle="dropdown"><i class="fas fa-database"></i> <span>Master Data</span></a>
                <ul class="dropdown-menu">
                    <li class="nav-item dropdown {{ $type_menu === 'DataGuru' ? 'active' : '' }}">
                        <a class="nav-link"
                        href="{{ url('data-guru') }}"><i class="fa-solid fa-users"></i></i><span>Data Guru</span></a>
                    </li>
                    <li class="nav-item dropdown {{ $type_menu === 'TingkatHonor' ? 'active' : '' }}">
                        <a class="nav-link"
                        href="{{ url('tingkat-honor') }}"><i class="fa fa-line-chart" aria-hidden="true"></i><span>Tingkatan Honor</span></a>
                    </li>
                    <li class="nav-item dropdown {{ $type_menu === 'StatusGuru' ? 'active' : '' }}">
                        <a class="nav-link"
                        href="{{ url('data-tunjangan') }}"><i class="fa fa-usd" aria-hidden="true"></i></i><span>Data Tunjangan</span></a>
                    </li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
