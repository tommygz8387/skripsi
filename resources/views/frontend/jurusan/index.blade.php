@extends('layouts.app')

@section('title')
    Data Opsi - Tingkat dan Jurusan
@endsection

@section('content')
    <!-- Modal Tambah tingkat-->
    <div class="modal fade" id="createTingkatModal" tabindex="-1" aria-labelledby="createTingkatModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            @include('frontend.tingkat.creModal')
        </div>
    </div>
    <!-- Modal Tambah Jurusan-->
    <div class="modal fade" id="createJurusanModal" tabindex="-1" aria-labelledby="createJurusanModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            @include('frontend.jurusan.creModal')
        </div>
    </div>
    {{-- <div class="modal fade" id="resetJurusanModal" tabindex="-1" aria-labelledby="resetJurusanModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            @include('frontend.jurusan.resModal')
        </div>
    </div> --}}
    <div class="row">
        {{-- tabel data tingkat --}}
        <div class="col-md-5 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">List Tingkatan Kelas</h4>
                    <div class="row justify-content-between mx-0">
                        <div class="cols">
                            <p class="card-description">
                                Tabel tingkatan kelas.
                            </p>
                        </div>
                        <div class="cols">
                            <!-- Button trigger create modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#createTingkatModal">
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
                                    <th>TIngkat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataTingkat as $Tingkat)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $Tingkat->tingkat }}</td>
                                        <td>
                                            <a class="nav-link" href="#" role="button" data-toggle="dropdown"
                                                id="Dropdown{{ $Tingkat->id }}">
                                                <i class="icon-ellipsis text-black"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                                                aria-labelledby="Dropdown{{ $Tingkat->id }}">
                                                <!-- Button trigger edit modal -->
                                                <button class="dropdown-item" data-toggle="modal"
                                                    data-target="#editTingkatModal{{ $Tingkat->id }}">
                                                    <i class="ti-pencil text-black"></i>
                                                    Edit
                                                </button>
                                                <button class="dropdown-item" data-toggle="modal"
                                                    data-target="#delTingkatModal{{ $Tingkat->id }}">
                                                    <i class="ti-eraser text-black"></i>
                                                    Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>

                                    {{-- Modal Edit --}}
                                    <div class="modal fade" id="editTingkatModal{{ $Tingkat->id }}" tabindex="-1"
                                        aria-labelledby="editTingkatModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            @include('frontend.tingkat.editModal')
                                        </div>
                                    </div>
                                    {{-- Modal Delete --}}
                                    <div class="modal fade" id="delTingkatModal{{ $Tingkat->id }}" tabindex="-1"
                                        aria-labelledby="delTingkatModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            @include('frontend.tingkat.delModal')
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- tabel data jurusan --}}
        <div class="col-md-7 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">List Jurusan</h4>
                    <div class="row justify-content-between mx-0">
                        <div class="cols">
                            <p class="card-description">
                                Tabel berisi semua jurusan yang ada disekolah.
                            </p>
                        </div>
                        <div class="cols">
                            <!-- Button trigger create modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#createJurusanModal">
                                Tambah Data
                            </button>
                        </div>
                        {{-- <div class="cols">
                            <!-- Button trigger reset modal -->
                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                data-target="#resetJurusanModal">
                                Reset
                            </button>
                        </div> --}}
                    </div>
                    <hr>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered table-hover" id="tabel">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Jurusan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataJurusan as $Jurusan)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $Jurusan->jurusan }}</td>
                                        <td>
                                            <a class="nav-link" href="#" role="button" data-toggle="dropdown"
                                                id="Dropdown{{ $Jurusan->id }}">
                                                <i class="icon-ellipsis text-black"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                                                aria-labelledby="Dropdown{{ $Jurusan->id }}">
                                                <!-- Button trigger edit modal -->
                                                <button class="dropdown-item" data-toggle="modal"
                                                    data-target="#editJurusanModal{{ $Jurusan->id }}">
                                                    <i class="ti-pencil text-black"></i>
                                                    Edit
                                                </button>
                                                <button class="dropdown-item" data-toggle="modal"
                                                    data-target="#delJurusanModal{{ $Jurusan->id }}">
                                                    <i class="ti-eraser text-black"></i>
                                                    Delete
                                                </button>
                                            </div>
                                            </div>
                                        </td>
                                    </tr>

                                    {{-- Modal Edit --}}
                                    <div class="modal fade" id="editJurusanModal{{ $Jurusan->id }}" tabindex="-1"
                                        aria-labelledby="editJurusanModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            @include('frontend.jurusan.editModal')
                                        </div>
                                    </div>
                                    {{-- Modal Delete --}}
                                    <div class="modal fade" id="delJurusanModal{{ $Jurusan->id }}" tabindex="-1"
                                        aria-labelledby="delJurusanModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            @include('frontend.jurusan.delModal')
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
            $('#tabel').DataTable();
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
