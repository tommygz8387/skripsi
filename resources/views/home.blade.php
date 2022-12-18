@extends('layouts.app')

@section('title')
    Dashboard
@endsection

{{-- @section('cus-css')
    <style>
        .card.tale-bg{
            background: #ffcccc;
        }
    </style>
@endsection --}}

@section('content')
    @php
        $userLogin = App\Models\User::Where('id', Auth::id())->first();
        $guru = count(App\Models\Guru::get());
        $ag = App\Models\Guru::pluck('jml_ampu')->sum();
        $slot = count(App\Models\Slot::get());
        $hari = count(App\Models\Hari::get());
        $waktu = count(App\Models\Waktu::get());
        $kelas = count(App\Models\Kelas::get());
        $jurusan = count(App\Models\Jurusan::get());
        $tingkat = count(App\Models\Tingkat::get());
        $jadwal = count(App\Models\Manual::get());
        $jkhusus = count(App\Models\JKhusus::get());
        
    @endphp
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Welcome {{ $userLogin->name }}</h3>
                    <h6 class="font-weight-normal mb-0">All systems are running smoothly!
                        <span class="text-primary">Happy Working!</span>
                    </h6>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card tale-bg">
                <div class="card-people mx-auto my-auto">
                    <img src="{{ asset('/') }}images/dashboard/people2.png" alt="people">
                    <div class="weather-info">
                        <div class="d-flex">
                            <div>
                                <h2 class="mb-0 font-weight-normal" id="simbol"></h2>
                            </div>
                            <div class="ml-2">
                                <h5 class="font-weight-bold" id="waktu"></h5>
                                <h6 class="font-weight-normal" id="jam"></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin transparent">
            <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-tale">
                        <a href="{{ route('guru.index') }}" class="text-light text-decoration-none">
                            <div class="card-body">
                                <p class="mb-4">Jumlah Guru</p>
                                <p class="fs-30 mb-2">{{ $guru }}</p>
                                <p>Total Jam Ampu : {{ $ag }}</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-dark-blue">
                        <a href="{{ route('slot.index') }}" class="text-light text-decoration-none">
                            <div class="card-body">
                                <p class="mb-4">Total Slot Ajar</p>
                                <p class="fs-30 mb-2">{{ $slot }}</p>
                                <p>Dari {{ $hari }} hari dan {{ $waktu }} jam ajar</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                    <div class="card card-light-blue">
                        <a href="{{ route('kelas.index') }}" class="text-light text-decoration-none">
                            <div class="card-body">
                                <p class="mb-4">Jumlah Kelas</p>
                                <p class="fs-30 mb-2">{{ $kelas }}</p>
                                <p>Dari {{ $jurusan }} jurusan dan {{ $tingkat }} angkatan</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                    <div class="card card-light-danger">
                        <a href="{{ route('jkhusus.index') }}" class="text-light text-decoration-none">
                            <div class="card-body">
                                <p class="mb-4">Jumlah Jadwal</p>
                                <p class="fs-30 mb-2">{{ $jadwal }}</p>
                                <p>Diluar dari {{ $jkhusus }} jam khusus</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Tentang Aplikasi</p>
                    <p class="font-weight-500 text-justify"><strong>Sispenma</strong> (Sistem Penjadwalan Mata Pelajaran) adalah sebuah sistem penjadwalan
                        berbasis web
                        yang digunakan untuk membuat sebuah jadwal secara otomatis dengan mengimplementasikan
                        algoritma ant colony optimization untuk mengoptimalkan jadwal dengan cara memerhatikan
                        batasan-batasan (<span class="font-italic"> constraint </span>) yang telah ditentukan sebelumnya. contoh batasan yang ada yaitu:
                    </p>
                    <ol class="font-weight-500 text-justify">
                        <li>Tidak ada bentrok pada jadwal mengajar guru, dimana guru hanya boleh mengajar satu kelas
                        dalam satu waktu.</li>
                        <li>Tidak ada bentrok pada jadwal penggunaan ruangan, dimana ruangan khusus selain ruang kelas
                        hanya dapat digunakan oleh satu kelas dalam satu waktu. misalnya hanya boleh ada satu kelas
                        yang menggunakan lab komputer dalam satu waktu.</li>
                        <li>Tidak ada kesalahan pada ampu guru, dimana guru harus mengajar sesuai dengan mata pelajaran
                        yang telah ditentukan, dan jumlah ampu guru per minggu harus sesuai dengan yag telah ditentukan.
                        Misalnya guru A harus mengajar sebanyak 20 jam dalam waktu satu minggu, maka 20 jam tersebut
                        harus dapat teralokasi dengan tepat.</li>
                        <li>Tidak ada kesalahan dalam jumlah mata pelajaran, dimana setiap kelas harus dapat memenuhi jumlah
                        mata pelajaran per minggu sesuai dengan yang telah ditentukan. Misalnya setiap kelas memiliki
                        waktu ampu sebanyak 45 jam dalam satu minggu, dan terdapat 24 mata pelajaran yang harus di ampu
                        dengan masing-masing mata pelajaran memiliki beban atau jumlah waktu tertentu, maka semua mata
                        pelajaran harus dialokasikan dengan baik sesuai dengan alokasi waktu dan bebannya masing-masing.</li>
                        <li>Tidak ada guru yang mengajar pada jam khusus yang diminta guru tersebut.</li>
                    </ol>
                    <p class="font-weight-500 text-justify">
                    Dengan adanya sistem ini, diharapkan tidak ditemukan lagi bentrok pada mata pelajaran yang dapat
                    mengganggu proses belajar mengajar di sekolah.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <p class="card-title">Algoritma Ant Colony</p>
                    </div>
                    <p class="font-weight-500 text-justify"><strong>Algoritma Ant colony Optimization</strong> merupakan teknik probabilistik 
                        untuk menjawab masalah komputasi yang bisa dikurangi dengan menemukan jalur yang baik dengan graf. 
                        ACO di inspirasi oleh koloni semut karena tingkah laku semut yang menarik ketika mencari makanan. 
                        Semut-semut menemukan jarak terpendek antara sarang semut dan sumber makanannya. Ketika berjalan 
                        dari sumber makanan menuju sarang mereka, semut memberikan tanda dengan zat feromon sehingga akan 
                        tercipta jalur feromon.</p>
                    <p class="font-weight-500 text-justify">Di dalam algoritma ACO, sebuah set perangkat lunak yang disebut 
                        semut buatan mencari solusi yang baik untuk masalah optimasi yang diberikan. Untuk menerapkan algoritma ACO, 
                        masalah optimasi ditransformasikan menjadi masalah pencarian jalur terbaik pada graf berbobot. Semut buatan 
                        (selanjutnya disebut semut) secara bertahap membangun solusi dengan bergerak pada grafik. Proses konstruksi 
                        solusi bersifat stokastik (petunjuk atau indikator yang berfungsi untuk menetukan jalur melalui dua garis yang 
                        berpotongan) dan didasari oleh model feromon yang terdapat pada semut sungguhan, yaitu seperangkat parameter 
                        yang terkait dengan komponen grafik (baik nodes atau edges) yang nilainya dimodifikasi pada saat runtime oleh semut.</p>
                    <p class="font-weight-500 text-justify">Cara kerja algoritma ant colony optimization yaitu berdasarkan pengamatan 
                        mengenai tingkah laku dari koloni semut, dimana semut dapat menentukan jarak terpendek antara sarang mereka, 
                        dan sumber makanan, dimana setiap semut dalam kawanan yang berjalan mencari atau menuju sumber makanan akan 
                        meninggalkan semacam zat kimia bernama feromon dijalur yang dilewatinya, dan feromon ini akan menjadi semacam 
                        sinyal atau penunjuk yang akan menjadi penunjuk arah bagi kawanan semut lain yang akan menuju sumber makanan tersebut.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('cus-script')
    <script>
        function timeCount() {
            arrbulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober",
                "November", "Desember"
            ];
            date = new Date();
            hari = date.getDay();
            tanggal = date.getDate();
            bulan = date.getMonth();
            tahun = date.getFullYear();

            var jam = date.getHours();
            if (jam < 10) jam = "0" + jam;

            var menit = date.getMinutes();
            if (menit < 10) menit = "0" + menit;

            var detik = date.getSeconds();
            if (detik < 10) detik = "0" + detik;

            document.getElementById('waktu').innerHTML = tanggal + " " + arrbulan[bulan] + " " + tahun;
            document.getElementById('jam').innerHTML = jam + ":" + menit + ":" + detik + " WIB";

            if (jam >= 6 && jam < 18) {
                document.getElementById('simbol').innerHTML = '<i class="icon-sun mr-2"></i>';
            } else {
                document.getElementById('simbol').innerHTML = '<i class="icon-moon mr-2"></i>';
            };

            setTimeout("timeCount()", 1000);
        }
    </script>
@endsection
