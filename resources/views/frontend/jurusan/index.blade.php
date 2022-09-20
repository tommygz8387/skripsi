@extends('layouts.app')

@section('content')
    <div class="row">
        @yield('form')
        {{-- tabel data guru --}}
        <div class="col-md-7 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">List Jurusan</h4>
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
                                                <a class="dropdown-item"
                                                    href="{{ route('jurusan.edit', ['id' => $Jurusan->id]) }}">
                                                    <i class="ti-pencil text-black"></i>
                                                    Edit
                                                </a>
                                                <button class="dropdown-item" data-toggle="modal"
                                                    data-target="#delJurusanModal{{ $Jurusan->id }}">
                                                    <i class="ti-eraser text-black"></i>
                                                    Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>

                                    {{-- delete modal --}}
                                    <div class="modal fade" id="delJurusanModal{{ $Jurusan->id }}" tabindex="-1"
                                        aria-labelledby="delJurusanModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="delJurusanModalLabel"><strong>Hapus Data
                                                            Jurusan</strong></h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        Apakah anda ingin menghapus data {{ $Jurusan->nama }}?
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="{{ route('jurusan.delete', ['id' => $Jurusan->id]) }}"
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
            $('#tabel').DataTable({
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
