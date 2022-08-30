@extends('layouts.app')
@section('title')
    Master Data - Guru
@endsection
@section('modals')
    @include('frontend.guru.modal')
@endsection
@section('content')
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

                                    {{-- edit modal --}}
                                    <div class="modal fade" id="editGuruModal{{ $Guru->id }}" tabindex="-1"
                                        aria-labelledby="editGuruModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="editGuruModalLabel"><strong>Edit Data
                                                            Guru</strong></h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="forms-sample" method="POST"
                                                        action="{{ route('guru.update', ['id' => $Guru->id]) }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="namaGuru">Nama</label>
                                                            <input type="text" class="form-control" id="namaGuru"
                                                                placeholder="Nama" name="nama"
                                                                value="{{ $Guru->nama }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nipGuru">Nomor Identitas Pegawai (NIP)</label>
                                                            <input type="number" class="form-control" id="nipGuru"
                                                                placeholder="NIP" name="nip"
                                                                value="{{ $Guru->nip }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="notlp">Nomor Telepon</label>
                                                            <input type="number" class="form-control" id="notlp"
                                                                placeholder="Nomor Telepon" name="no_tlp"
                                                                value="{{ $Guru->no_tlp }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="jmlAmpu">Jumlah Ampu per Minggu</label>
                                                            <input type="number" class="form-control" id="jmlAmpu"
                                                                placeholder="Jumlah Ampu" name="jml_ampu"
                                                                value="{{ $Guru->jml_ampu }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="keterangan">Keterangan</label>
                                                            <input type="text" class="form-control" id="keterangan"
                                                                placeholder="Keterangan" name="keterangan"
                                                                value="{{ $Guru->keterangan }}">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                                        <button type="reset" class="btn btn-danger">Reset</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    {{-- delete modal --}}
                                    <div class="modal fade" id="delGuruModal{{ $Guru->id }}" tabindex="-1"
                                        aria-labelledby="delGuruModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="delGuruModalLabel"><strong>Hapus Data
                                                            Guru</strong></h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        Apakah anda ingin menghapus data {{ $Guru->nama }}?
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="{{ route('guru.delete', ['id' => $Guru->id]) }}"
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
