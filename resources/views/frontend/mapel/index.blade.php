@extends('layouts.app')

@section('title')
    Master Data - Mata Pelajaran
@endsection

@section('content')
    <div class="row">
        @yield('form')
        {{-- tabel data mapel --}}
        <div class="col-md-7 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">List Mata Pelajaran</h4>
                    <div class="row justify-content-between mx-0">
                        <p class="card-description">
                            Basic form layout
                        </p>
                    </div>
                    <hr>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered table-hover" id="tabel">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Jurusan</th>
                                    <th>Ampu 10</th>
                                    <th>Ampu 11</th>
                                    <th>Ampu 12</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataMapel as $Mapel)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $Mapel->nama }}</td>
                                        <td>{{ $Mapel->jurusan }}</td>
                                        <td>{{ $Mapel->ampu1 }}</td>
                                        <td>{{ $Mapel->ampu2 }}</td>
                                        <td>{{ $Mapel->ampu3 }}</td>
                                        <td>
                                            <a class="nav-link" href="#" role="button" data-toggle="dropdown"
                                                id="Dropdown{{ $Mapel->id }}">
                                                <i class="icon-ellipsis text-black"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                                                aria-labelledby="Dropdown{{ $Mapel->id }}">
                                                <!-- Button trigger edit modal -->
                                                <a class="dropdown-item"
                                                    href="{{ route('mapel.edit', ['id' => $Mapel->id]) }}">
                                                    <i class="ti-pencil text-black"></i>
                                                    Edit
                                                </a>
                                                <button class="dropdown-item" data-toggle="modal"
                                                    data-target="#delMapelModal{{ $Mapel->id }}">
                                                    <i class="ti-eraser text-black"></i>
                                                    Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>

                                    @include('frontend.mapel.delModal')
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
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, 'All'],
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
