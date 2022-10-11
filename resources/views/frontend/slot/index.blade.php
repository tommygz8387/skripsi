@extends('layouts.app')

@section('title')
    Master Data - Slot Jadwal
@endsection

@section('content')
    <!-- Modal Tambah -->
    <div class="modal fade" id="seedModal" tabindex="-1" aria-labelledby="seedModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            @include('frontend.slot.seedModal')
        </div>
    </div>
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            @include('frontend.slot.creModal')
        </div>
    </div>
    <div class="modal fade" id="resetModal" tabindex="-1" aria-labelledby="resetModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            @include('frontend.slot.resModal')
        </div>
    </div>
    <div class="row">
        {{-- tabel data mapel --}}
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">List Slot Jadwal</h4>
                    <div class="row justify-content-between mx-0">
                        <div class="cols-6">
                            <p class="card-description">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam, voluptate?
                            </p>
                        </div>
                        <div class="cols-3">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <!-- Button trigger create modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#createModal">
                                    Add Data
                                </button>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                                        aria-expanded="false">
                                        More
                                    </button>
                                    <div class="dropdown-menu">
                                        <!-- Button dummy reset modal -->
                                        <button type="button" class="dropdown-item" data-toggle="modal"
                                            data-target="#seedModal">
                                            Generate
                                        </button>
                                        <!-- Button trigger reset modal -->
                                        <button type="button" class="dropdown-item" data-toggle="modal"
                                            data-target="#resetModal">
                                            Reset
                                        </button>
                                        <!-- Button trigger export -->
                                        <a href="{{ route('slot.export') }}" class="dropdown-item">
                                            Export
                                        </a>
                                    </div>
                                </div>
                            </div>
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
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataSlot as $Slot)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $Slot->hari->hari }}</td>
                                        <td>{{ $Slot->waktu->jam_mulai }}-{{ $Slot->waktu->jam_selesai }}</td>
                                        <td>
                                            <a class="nav-link" href="#" role="button" data-toggle="dropdown"
                                                id="Dropdown{{ $Slot->id }}">
                                                <i class="icon-ellipsis text-black"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                                                aria-labelledby="Dropdown{{ $Slot->id }}">
                                                <!-- Button trigger edit modal -->
                                                <button class="dropdown-item" data-toggle="modal"
                                                    data-target="#editModal{{ $Slot->id }}">
                                                    <i class="ti-pencil text-black"></i>
                                                    Edit
                                                </button>
                                                <button class="dropdown-item" data-toggle="modal"
                                                    data-target="#delModal{{ $Slot->id }}">
                                                    <i class="ti-eraser text-black"></i>
                                                    Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>

                                    {{-- Modal Edit --}}
                                    <div class="modal fade" id="editModal{{ $Slot->id }}" tabindex="-1"
                                        aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            @include('frontend.slot.editModal')
                                        </div>
                                    </div>
                                    {{-- Modal Delete --}}
                                    <div class="modal fade" id="delModal{{ $Slot->id }}" tabindex="-1"
                                        aria-labelledby="delModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            @include('frontend.slot.delModal')
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
