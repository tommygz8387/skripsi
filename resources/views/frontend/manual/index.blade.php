@extends('layouts.app')

@section('title')
    Atur Jadwal - Jadwal Manual
@endsection

@section('content')
    <!-- Modal Tambah -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            @include('frontend.manual.creModal')
        </div>
    </div>
    <div class="row">
        {{-- tabel data mapel --}}
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">List Jam Ajar</h4>
                    <div class="row justify-content-between mx-0">
                        <div class="cols">
                            <p class="card-description">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam, voluptate?
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
                                <tr>
                                    <th>#</th>
                                    <th>Hari</th>
                                    <th>Jam</th>
                                    <th>Kelas</th>
                                    <th>Nama Guru</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Ruang</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataManual as $Manual)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $Manual->slot->hari->hari }}</td>
                                        <td>{{ $Manual->slot->waktu->jam_mulai }}-<br>{{ $Manual->slot->waktu->jam_selesai }}</td>
                                        <td>{{ $Manual->kelas->nama }}</td>
                                        <td>{{ $Manual->guru->nama }}</td>
                                        <td>{{ $Manual->mapel->nama }}</td>
                                        <td>{{ $Manual->ruang->nama }}</td>
                                        <td>
                                            <a class="nav-link" href="#" role="button" data-toggle="dropdown"
                                                id="Dropdown{{ $Manual->id }}">
                                                <i class="icon-ellipsis text-black"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                                                aria-labelledby="Dropdown{{ $Manual->id }}">
                                                <!-- Button trigger edit modal -->
                                                <button class="dropdown-item" data-toggle="modal"
                                                    data-target="#editModal{{ $Manual->id }}">
                                                    <i class="ti-pencil text-black"></i>
                                                    Edit
                                                </button>
                                                <button class="dropdown-item" data-toggle="modal"
                                                    data-target="#delModal{{ $Manual->id }}">
                                                    <i class="ti-eraser text-black"></i>
                                                    Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>

                                    {{-- Modal Edit --}}
                                    <div class="modal fade" id="editModal{{ $Manual->id }}" tabindex="-1"
                                        aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            @include('frontend.manual.editModal')
                                        </div>
                                    </div>
                                    {{-- Modal Delete --}}
                                    <div class="modal fade" id="delModal{{ $Manual->id }}" tabindex="-1"
                                        aria-labelledby="delModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            @include('frontend.manual.delModal')
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
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, 'All'],
                ],
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