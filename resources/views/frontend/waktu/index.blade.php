@extends('layouts.app')

@section('title')
    Master Data - Waktu Belajar Mengajar
@endsection

@section('content')
    <!-- Modal Tambah jam-->
    <div class="modal fade" id="createWaktuModal" tabindex="-1" aria-labelledby="createWaktuModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            @include('frontend.waktu.creModal')
        </div>
    </div>
    <!-- Modal Tambah hari-->
    <div class="modal fade" id="createHariModal" tabindex="-1" aria-labelledby="createHariModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            @include('frontend.hari.creModal')
        </div>
    </div>
    <div class="row">
        {{-- tabel data hari --}}
        <div class="col-md-5 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">List Hari Belajar Mengajar</h4>
                    <div class="row justify-content-between mx-0">
                        <div class="cols">
                            <p class="card-description">
                                Basic form layout
                            </p>
                        </div>
                        <div class="cols">
                            <!-- Button trigger create modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#createHariModal">
                                Tambah Data
                            </button>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered table-hover" id="tabel2">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Hari</th>
                                    <th>Jam</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataHari as $Hari)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $Hari->hari }}</td>
                                        <td>{{ $Hari->jml_jam }}</td>
                                        <td>
                                            <a class="nav-link" href="#" role="button" data-toggle="dropdown"
                                                id="Dropdown{{ $Hari->id }}">
                                                <i class="icon-ellipsis text-black"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                                                aria-labelledby="Dropdown{{ $Hari->id }}">
                                                <!-- Button trigger edit modal -->
                                                <button class="dropdown-item" data-toggle="modal"
                                                    data-target="#editHariModal{{ $Hari->id }}">
                                                    <i class="ti-pencil text-black"></i>
                                                    Edit
                                                </button>
                                                <button class="dropdown-item" data-toggle="modal"
                                                    data-target="#delHariModal{{ $Hari->id }}">
                                                    <i class="ti-eraser text-black"></i>
                                                    Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>

                                    {{-- Modal Edit --}}
                                    <div class="modal fade" id="editHariModal{{ $Hari->id }}" tabindex="-1"
                                        aria-labelledby="editHariModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            @include('frontend.hari.editModal')
                                        </div>
                                    </div>
                                    {{-- Modal Delete --}}
                                    <div class="modal fade" id="delHariModal{{ $Hari->id }}" tabindex="-1"
                                        aria-labelledby="delHariModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            @include('frontend.hari.delModal')
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- tabel data jam --}}
        <div class="col-md-7 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">List Jam Belajar Mengajar</h4>
                    <div class="row justify-content-between mx-0">
                        <div class="cols">
                            <p class="card-description">
                                Basic form layout
                            </p>
                        </div>
                        <div class="cols">
                            <!-- Button trigger create modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#createWaktuModal">
                                Tambah Data
                            </button>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered table-hover" id="tabel">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Mulai</th>
                                    <th>Selesai</th>
                                    <th>Total</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataWaktu as $Waktu)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $Waktu->jam_mulai }}</td>
                                        <td>{{ $Waktu->jam_selesai }}</td>
                                        <td>{{ $Waktu->total }}</td>
                                        <td>
                                            <a class="nav-link" href="#" role="button" data-toggle="dropdown"
                                                id="Dropdown{{ $Waktu->id }}">
                                                <i class="icon-ellipsis text-black"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                                                aria-labelledby="Dropdown{{ $Waktu->id }}">
                                                <!-- Button trigger edit modal -->
                                                <button class="dropdown-item" data-toggle="modal"
                                                    data-target="#editWaktuModal{{ $Waktu->id }}">
                                                    <i class="ti-pencil text-black"></i>
                                                    Edit
                                                </button>
                                                <button class="dropdown-item" data-toggle="modal"
                                                    data-target="#delWaktuModal{{ $Waktu->id }}">
                                                    <i class="ti-eraser text-black"></i>
                                                    Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>

                                    {{-- Modal Edit --}}
                                    <div class="modal fade" id="editWaktuModal{{ $Waktu->id }}" tabindex="-1"
                                        aria-labelledby="editWaktuModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            @include('frontend.waktu.editModal')
                                        </div>
                                    </div>
                                    {{-- Modal Delete --}}
                                    <div class="modal fade" id="delWaktuModal{{ $Waktu->id }}" tabindex="-1"
                                        aria-labelledby="delWaktuModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            @include('frontend.waktu.delModal')
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('cus-script')
    <script>
        $(document).ready(function() {
            $('#tabel').DataTable({
                // lengthMenu: [
                    // [5, 10, 25, 50, -1],
                    // [5, 10, 25, 50, 'All'],
                // ],
            });
            $('#tabel2').DataTable({
                lengthChange: false,
                "dom": '<"top"<"pull-left"f><"pull-right"l>>rt<"bottom"<"pull-left"i><"pull-right"p>>'
            });
        });
    </script>
    <!-- Plugin js for this page -->
    {{-- <script src="{{ asset('/') }}vendors/chart.js/Chart.min.js"></script> --}}
    <script src="{{ asset('/') }}vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="{{ asset('/') }}vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    {{-- <script src="{{ asset('/') }}js/dataTables.select.min.js"></script>
    <script src="{{ asset('/') }}js/todolist.js"></script>
    <script src="{{ asset('/') }}js/Chart.roundedBarCharts.js"></script> --}}
    <!-- End plugin js for this page -->
@endsection
