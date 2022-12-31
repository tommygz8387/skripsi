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
    <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            @include('frontend.guru.impModal')
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
                                Berisi daftar guru yang terlibat dalam kegiatan belajar mengajar
                            </p>
                        </div>
                        <div class="cols">
                        </div>
                        <div class="cols-3">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <!-- Button trigger create modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#createGuruModal">
                                    Add Data
                                </button>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                                        aria-expanded="false">
                                        More
                                    </button>
                                    <div class="dropdown-menu">
                                        <!-- Button trigger import modal -->
                                        <button type="button" class="dropdown-item" data-toggle="modal"
                                            data-target="#importModal">
                                            Import
                                        </button>
                                        <!-- Button trigger export -->
                                        <a href="{{ route('guru.export') }}" class="dropdown-item">
                                            Export
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered table-hover" id="guru">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>No Telepon</th>
                                    <th><span data-bs-toggle="tooltip" data-placement="top" title="Jumlah Ampu Guru per Minggu">Ampu</span></th>
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
                                        <td>{{ $Guru->nip }}</td>
                                        <td>{{ $Guru->nama }}</td>
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
    {{-- <script>
        $(document).ready(function(){
        $('#sub').click(function(){
            var fd = new FormData();
            var files = $('#iguru')[0].files[0];
            fd.append('iguru',files);

            // AJAX request
            $.ajax({
            url: 'ajaxfile.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
                if(response != 0){
                // Show image preview
                $('#preview').append("<img src='"+response+"' width='100' height='100' style='display: inline-block;'>");
                }else{
                alert('file not uploaded');
                }
            }
            });
        });
        });
    </script> --}}
    <!-- Plugin js for this page -->
    <script src="{{ asset('/') }}js/tooltips.js"></script>
    <script src="{{ asset('/') }}vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="{{ asset('/') }}vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="{{ asset('/') }}js/file-upload.js"></script>
    <script>
    $('[data-bs-toggle="tooltip"]').tooltip();
    </script>
    <!-- End plugin js for this page -->
@endsection
