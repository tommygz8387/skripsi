@php
    $userLogin = App\Models\User::Where('id', Auth::id())->first();
    $guru = App\Models\Guru::pluck('jml_ampu')->sum();
    $jurusan = App\Models\Jurusan::all();
    $kelas = App\Models\Kelas::all();
    $mapel = App\Models\Mapel::all();
    $ruang = App\Models\Ruang::all();
    $hari = App\Models\Hari::all();
    $waktu = App\Models\Waktu::all();
    $slot = App\Models\Slot::all();
    $ampu = App\Models\Ampu::all();
    $sl = count($slot);
    $kel = count($kelas);
    $tajar = $sl * $kel;
    $i=0;
@endphp
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="{{ url('/home') }}"><img src="{{ asset('/') }}images/logo.svg" class="mr-2"
                alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="{{ url('/home') }}"><img src="{{ asset('/') }}images/logo-mini.svg"
                alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                    data-toggle="dropdown">
                    <i class="icon-bell mx-0"></i>
                    <span class="count"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                    aria-labelledby="notificationDropdown">
                    <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                    @if ($guru>$tajar)
                    <a class="dropdown-item preview-item" href="{{ route('guru.index') }}">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-danger">
                                <i class="ti-alert mx-0"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <h6 class="preview-subject font-weight-normal">Syarat belum terpenuhi!</h6>
                            <p class="font-weight-light small-text mb-0 text-muted">
                                Jumlah jam ampu ({{ $guru }}) lebih <br> kecil dari total ajar({{ $tajar }})! 
                            </p>
                        </div>
                    </a>
                    @php
                        $i++;
                    @endphp
                    @endif
                    @if ($jurusan->isEmpty())
                    <a class="dropdown-item preview-item" href="{{ route('jurusan.index') }}">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-danger">
                                <i class="ti-alert mx-0"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <h6 class="preview-subject font-weight-normal">Data jurusan kosong!</h6>
                            <p class="font-weight-light small-text mb-0 text-muted">
                                Silahkan isi data agar sistem berjalan lancar! 
                            </p>
                        </div>
                    </a>
                    @php
                        $i++;
                    @endphp
                    @endif
                    @if ($kelas->isEmpty())
                    <a class="dropdown-item preview-item" href="{{ route('kelas.index') }}">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-danger">
                                <i class="ti-alert mx-0"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <h6 class="preview-subject font-weight-normal">Data kelas kosong!</h6>
                            <p class="font-weight-light small-text mb-0 text-muted">
                                Silahkan isi data agar sistem berjalan lancar! 
                            </p>
                        </div>
                    </a>
                    @php
                        $i++;
                    @endphp
                    @endif
                    @if ($kelas->isEmpty())
                    <a class="dropdown-item preview-item" href="{{ route('kelas.index') }}">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-danger">
                                <i class="ti-alert mx-0"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <h6 class="preview-subject font-weight-normal">Data kelas kosong!</h6>
                            <p class="font-weight-light small-text mb-0 text-muted">
                                Silahkan isi data agar sistem berjalan lancar! 
                            </p>
                        </div>
                    </a>
                    @php
                        $i++;
                    @endphp
                    @endif
                    @if ($mapel->isEmpty())
                    <a class="dropdown-item preview-item" href="{{ route('mapel.index') }}">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-danger">
                                <i class="ti-alert mx-0"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <h6 class="preview-subject font-weight-normal">Data mapel kosong!</h6>
                            <p class="font-weight-light small-text mb-0 text-muted">
                                Silahkan isi data agar sistem berjalan lancar! 
                            </p>
                        </div>
                    </a>
                    @php
                        $i++;
                    @endphp
                    @endif
                    @if ($ruang->isEmpty())
                    <a class="dropdown-item preview-item" href="{{ route('ruang.index') }}">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-danger">
                                <i class="ti-alert mx-0"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <h6 class="preview-subject font-weight-normal">Data ruang kosong!</h6>
                            <p class="font-weight-light small-text mb-0 text-muted">
                                Silahkan isi data agar sistem berjalan lancar! 
                            </p>
                        </div>
                    </a>
                    @php
                        $i++;
                    @endphp
                    @endif
                    @if ($hari->isEmpty()||$waktu->isEmpty())
                    <a class="dropdown-item preview-item" href="{{ route('waktu.index') }}">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-danger">
                                <i class="ti-alert mx-0"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <h6 class="preview-subject font-weight-normal">Data waktu kosong!</h6>
                            <p class="font-weight-light small-text mb-0 text-muted">
                                Silahkan isi data agar sistem berjalan lancar! 
                            </p>
                        </div>
                    </a>
                    @php
                        $i++;
                    @endphp
                    @endif
                    @if ($slot->isEmpty())
                    <a class="dropdown-item preview-item" href="{{ route('slot.index') }}">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-danger">
                                <i class="ti-alert mx-0"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <h6 class="preview-subject font-weight-normal">Data slot kosong!</h6>
                            <p class="font-weight-light small-text mb-0 text-muted">
                                Silahkan isi data agar sistem berjalan lancar! 
                            </p>
                        </div>
                    </a>
                    @php
                        $i++;
                    @endphp
                    @endif
                    @if ($ampu->isEmpty())
                    <a class="dropdown-item preview-item" href="{{ route('ampu.index') }}">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-danger">
                                <i class="ti-alert mx-0"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <h6 class="preview-subject font-weight-normal">Data ampu kosong!</h6>
                            <p class="font-weight-light small-text mb-0 text-muted">
                                Silahkan isi data agar sistem berjalan lancar! 
                            </p>
                        </div>
                    </a>
                    @php
                        $i++;
                    @endphp
                    @endif
                    {{-- @php
                        echo $i;
                    @endphp --}}
                    @if ($i===0)
                    <a class="dropdown-item preview-item" href="{{ route('otomatis.index') }}">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-success">
                                <i class="ti-check mx-0"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <h6 class="preview-subject font-weight-normal">Sistem berjalan lancar!</h6>
                            <p class="font-weight-light small-text mb-0 text-muted">
                                Sistem siap digunakan! 
                            </p>
                        </div>
                    </a>
                    @endif
                </div>
            </li>
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                    <img src="{{ asset('photo/'.$userLogin->photo) }}" alt="profile" />
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="{{ route('user.index') }}">
                        <i class="ti-settings text-primary"></i>
                        Profile
                    </a>
                    <a class="dropdown-item" href="{{ route('logout1') }}">
                        <i class="ti-power-off text-primary"></i>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="icon-menu"></span>
        </button>
    </div>
</nav>
