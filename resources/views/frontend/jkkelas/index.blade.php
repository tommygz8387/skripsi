@extends('layouts.app')

@section('title')
    Atur Jadwal - Jadwal Khusus Kelas
@endsection

@section('content')
    <!-- Modal Tambah -->
    <div class="modal fade" id="seedModal" tabindex="-1" aria-labelledby="seedModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            @include('frontend.jkkelas.seedModal')
        </div>
    </div>
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            @include('frontend.jkkelas.creModal')
        </div>
    </div>
    <div class="modal fade" id="resetModal" tabindex="-1" aria-labelledby="resetModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            @include('frontend.jkkelas.resModal')
        </div>
    </div>
    <div class="row">
        {{-- tabel data mapel --}}
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">List Jam Khusus Kelas</h4>
                    <div class="row justify-content-between mx-0">
                        <div class="cols-6">
                            <p class="card-description">
                                Jam khusus ini diisi saat tidak ada jam pelajaran pada kelas tersebut.
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
                                        {{-- <a href="{{ route('jkkelas.export') }}" class="dropdown-item">
                                            Export
                                        </a> --}}
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
                                    <th>Kelas</th>
                                    <th>Hari</th>
                                    <th>Jam</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataJKKelas as $JKKelas)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $JKKelas->kelas->nama }}</td>
                                        <td>{{ $JKKelas->slot->hari->hari }}</td>
                                        <td>{{ $JKKelas->slot->waktu->jam_mulai }}-{{ $JKKelas->slot->waktu->jam_selesai }}</td>
                                        <td>
                                            <a class="nav-link" href="#" role="button" data-toggle="dropdown"
                                                id="Dropdown{{ $JKKelas->id }}">
                                                <i class="icon-ellipsis text-black"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                                                aria-labelledby="Dropdown{{ $JKKelas->id }}">
                                                <!-- Button trigger edit modal -->
                                                <button class="dropdown-item" data-toggle="modal"
                                                    data-target="#editModal{{ $JKKelas->id }}">
                                                    <i class="ti-pencil text-black"></i>
                                                    Edit
                                                </button>
                                                <button class="dropdown-item" data-toggle="modal"
                                                    data-target="#delModal{{ $JKKelas->id }}">
                                                    <i class="ti-eraser text-black"></i>
                                                    Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>

                                    {{-- Modal Edit --}}
                                    <div class="modal fade" id="editModal{{ $JKKelas->id }}" tabindex="-1"
                                        aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            @include('frontend.jkkelas.editModal')
                                        </div>
                                    </div>
                                    {{-- Modal Delete --}}
                                    <div class="modal fade" id="delModal{{ $JKKelas->id }}" tabindex="-1"
                                        aria-labelledby="delModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            @include('frontend.jkkelas.delModal')
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
        $(function(){
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });
        });
    </script>
    <script>
        $(function(){
            $('#Hari').on('change',function(){
                let hari_id = $('#Hari').val();

                
                $.ajax({
                    type: 'POST',
                    url: "{{ route('jkkelas.getSlot') }}",
                    data: {awe : hari_id},
                    cache: false,

                    success: function (msg) {  
                        $('#Jam').html(msg);
                    },
                    error: function (data) {  
                        console.log('error:',data);
                    }
                });
                    // console.log(msg);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#tabel').DataTable({
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, 'All'],
                ],
            });
        });
        $(".chosen").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%",
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
