<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/home') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#menu" aria-expanded="false" aria-controls="menu">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Data Utama</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('guru.index') }}">Data Guru</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('kelas.index') }}">Data Kelas</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('mapel.index') }}">Data MaPel</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#opsi" aria-expanded="false" aria-controls="opsi">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Data Opsi</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="opsi">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('ruang.index') }}">Data Ruang</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('jurusan.index') }}">Data Jurusan</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('waktu.index') }}">Data Waktu</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#jadwal" aria-expanded="false" aria-controls="jadwal">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Atur Jadwal</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="jadwal">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('slot.index') }}">Data Slot Ajar</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('slot.index') }}">Data Ampu Guru</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('jkhusus.index') }}">Data Jam Khusus</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false"
                aria-controls="form-elements">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Penjadwalan</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('manual.index') }}">Jadwal Manual</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('manual.index') }}">Jadwal Otomatis</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pages/documentation/documentation.html">
                <i class="icon-cog menu-icon"></i>
                <span class="menu-title">Jadwal</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pages/documentation/documentation.html">
                <i class="icon-cog menu-icon"></i>
                <span class="menu-title">Pengaturan</span>
            </a>
        </li>
    </ul>
</nav>
