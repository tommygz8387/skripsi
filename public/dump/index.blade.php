@extends('layouts.app')
@section('title')
    Data Kelas
@endsection
@section('modals')
    @include('frontend.kelas.modal')
@endsection
@section('content')
    <div class="row">
        {{-- tabel data guru --}}
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">List Kelas</h4>
                    <div class="row justify-content-between mx-0">
                        <div class="cols">
                            <p class="card-description">
                                Basic form layout
                            </p>
                        </div>
                        <div class="cols">
                            <!-- Button trigger create modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#createGuruModal">
                                Tambah Data
                            </button>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered table-hover" id="guru">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Kode</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($dataKelas as $Kelas)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $Kelas->nama }}</td>
                                        <td>{{ $Kelas->kode }}</td>
                                        <td>
                                            <a class="nav-link" href="#" role="button" data-toggle="dropdown"
                                                id="Dropdown{{ $Kelas->id }}">
                                                <i class="icon-ellipsis text-black"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                                                aria-labelledby="Dropdown{{ $Kelas->id }}">
                                                <!-- Button trigger edit modal -->
                                                <button class="dropdown-item " data-toggle="modal"
                                                    data-target="#editKelasModal{{ $Kelas->id }}">
                                                    <i class="ti-pencil text-black"></i>
                                                    Edit
                                                </button>
                                                <button class="dropdown-item" data-toggle="modal"
                                                    data-target="#delKelasModal{{ $Kelas->id }}">
                                                    <i class="ti-eraser text-black"></i>
                                                    Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>

                                    {{-- edit modal --}}
                                    <div class="modal fade" id="editKelasModal{{ $Kelas->id }}" tabindex="-1"
                                        aria-labelledby="editKelasModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="editKelasModalLabel"><strong>Edit Data
                                                            Kelas</strong></h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="forms-sample" method="POST"
                                                        action="{{ route('kelas.update', ['id' => $Kelas->id]) }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="namaKelas">Nama Kelas</label>
                                                            <input type="text" class="form-control" id="namaKelas"
                                                                placeholder="Nama Kelas" name="nama"
                                                                value="{{ $Kelas->nama }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="kodeKelas">Kode Kelas</label>
                                                            <input type="text" class="form-control" id="kodeKelas"
                                                                placeholder="Kode Kelas" name="kode"
                                                                value="{{ $Kelas->kode }}">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                                        <button type="reset" class="btn btn-danger">Reset</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    {{-- delete modal --}}
                                    <div class="modal fade" id="delKelasModal{{ $Kelas->id }}" tabindex="-1"
                                        aria-labelledby="delKelasModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="delKelasModalLabel"><strong>Hapus Data
                                                            Kelas</strong></h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        Apakah anda ingin menghapus data {{ $Kelas->nama }}?
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="{{ route('kelas.delete', ['id' => $Kelas->id]) }}"
                                                        class="btn btn-primary mr-2">Submit</a>
                                                    <button type="button" class="btn btn-secondary text-light"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
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
            $('#guru').DataTable();
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
