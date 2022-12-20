@extends('layouts.app')

@section('title')
    Data Opsi - Ruang
@endsection

@section('content')
    <!-- Modal Tambah -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            @include('frontend.ruang.creModal')
        </div>
    </div>
    <div class="row">
        {{-- tabel data guru --}}
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">List Ruang</h4>
                    <div class="row justify-content-between mx-0">
                        <div class="cols">
                            <p class="card-description">
                                Berisi daftar ruangan yang digunakan dalam kegiatan belajar mengajar
                            </p>
                        </div>
                        <div class="cols">
                            <!-- Button trigger create modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#createModal">
                                Tambah Data
                            </button>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered table-hover" id="tabel">
                            <thead>
                            {{-- <thead style="background: #4B49AC;color: #ffffff;"> --}}
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Kode</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataRuang as $Ruang)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $Ruang->nama }}</td>
                                        <td>{{ $Ruang->kode }}</td>
                                        <td>
                                            <a class="nav-link" href="#" role="button" data-toggle="dropdown"
                                                id="Dropdown{{ $Ruang->id }}">
                                                <i class="icon-ellipsis text-black"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                                                aria-labelledby="Dropdown{{ $Ruang->id }}">
                                                <!-- Button trigger edit modal -->
                                                <button class="dropdown-item" data-toggle="modal"
                                                    data-target="#editModal{{ $Ruang->id }}">
                                                    <i class="ti-pencil text-black"></i>
                                                    Edit
                                                </button>
                                                <button class="dropdown-item" data-toggle="modal"
                                                    data-target="#delRuangModal{{ $Ruang->id }}">
                                                    <i class="ti-eraser text-black"></i>
                                                    Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- Modal Edit --}}
                                    <div class="modal fade" id="editModal{{ $Ruang->id }}" tabindex="-1"
                                        aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            @include('frontend.ruang.editModal')
                                        </div>
                                    </div>
                                    {{-- delete modal --}}
                                    <div class="modal fade" id="delRuangModal{{ $Ruang->id }}" tabindex="-1"
                                        aria-labelledby="delRuangModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            @include('frontend.ruang.delModal')
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
                //     [5, 10, 25, 50, -1],
                //     [5, 10, 25, 50, 'All'],
                // ],
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
