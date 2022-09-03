@extends('layouts.app')
@section('title')
    Master Data - Guru
@endsection
@section('content')
    <!-- Modal Tambah -->
    <div class="modal fade" id="createGuruModal" tabindex="-1" aria-labelledby="createGuruModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            @include('frontend.guru.creModal')
        </div>
    </div>
    <div class="row">
        {{-- tabel data guru --}}
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">List Guru</h4>
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
                                    <th>NIP</th>
                                    <th>No Telepon</th>
                                    <th><span data-toggle="tooltip" title="Jam Ampu per Minggu">Ampu</span></th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($dataGuru as $Guru)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $Guru->nama }}</td>
                                        <td>{{ $Guru->nip }}</td>
                                        <td>{{ $Guru->no_tlp }}</td>
                                        <td>{{ $Guru->jml_ampu }}</td>
                                        <td>{{ $Guru->keterangan }}</td>
                                        <td>
                                            <a class="nav-link" href="#" role="button" data-toggle="dropdown"
                                                id="Dropdown{{ $Guru->id }}">
                                                <i class="icon-ellipsis text-black"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                                                aria-labelledby="Dropdown{{ $Guru->id }}">
                                                <!-- Button trigger edit modal -->
                                                <button class="dropdown-item " data-toggle="modal"
                                                    data-target="#editGuruModal{{ $Guru->id }}">
                                                    <i class="ti-pencil text-black"></i>
                                                    Edit
                                                </button>
                                                <button class="dropdown-item" data-toggle="modal"
                                                    data-target="#delGuruModal{{ $Guru->id }}">
                                                    <i class="ti-eraser text-black"></i>
                                                    Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>

                                    {{-- Modal Edit --}}
                                    <div class="modal fade" id="editGuruModal{{ $Guru->id }}" tabindex="-1"
                                        aria-labelledby="editGuruModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            @include('frontend.guru.editModal')
                                        </div>
                                    </div>


                                    {{-- Modal Delete --}}
                                    <div class="modal fade" id="delGuruModal{{ $Guru->id }}" tabindex="-1"
                                        aria-labelledby="delGuruModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            @include('frontend.guru.delModal')
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
