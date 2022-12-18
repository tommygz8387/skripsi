<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/home') }}">
                <i class="ti-home menu-icon text-bg-light"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#menu" aria-expanded="false" aria-controls="menu">
                <i class="ti-layout-grid2 menu-icon text-bg-light"></i>
                <span class="menu-title">Data Utama</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('guru.index') }}">Data Guru</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('jurusan.index') }}">Data Jurusan</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('kelas.index') }}">Data Kelas</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('mapel.index') }}">Data MaPel</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('ruang.index') }}">Data Ruang</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('waktu.index') }}">Data Waktu</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#aturjadwal" aria-expanded="false" aria-controls="aturjadwal">
                <i class="ti-agenda menu-icon text-bg-light"></i>
                <span class="menu-title">Atur Jadwal</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="aturjadwal">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('slot.index') }}">Data Slot Ajar</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('ampu.index') }}">Data Ampu Guru</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('jkhusus.index') }}">Data Jam Khusus</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#penjadwalan" aria-expanded="false"
                aria-controls="penjadwalan">
                <i class="ti-book menu-icon text-bg-light"></i>
                <span class="menu-title">Penjadwalan</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="penjadwalan">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('manual.index') }}">Jadwal Manual</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('otomatis.index') }}">Jadwal Otomatis</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#jadwal" aria-expanded="false"
                aria-controls="jadwal">
                <i class="ti-calendar menu-icon text-bg-light"></i>
                <span class="menu-title">Jadwal</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="jadwal">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('jadwal.kelas') }}">Jadwal Kelas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('jadwal.guru') }}">Jadwal Guru</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.index') }}">
                <i class="icon-cog menu-icon text-bg-light"></i>
                <span class="menu-title">Pengaturan</span>
            </a>
        </li>
    </ul>
</nav>
