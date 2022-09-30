@extends('layouts.app')
@section('title')
    Jadwal - Kelas
@endsection
@section('content')
    <!-- Modal Tambah -->
    {{-- <div class="modal fade" id="createGuruModal" tabindex="-1" aria-labelledby="createGuruModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            @include('frontend.guru.creModal')
        </div>
    </div> --}}
    <div class="row">
        {{-- tabel data guru --}}
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Jadwal Kelas</h4>
                    <div class="row justify-content-between mx-0">
                        <div class="cols">
                            <p class="card-description">
                                Basic form layout
                            </p>
                        </div>
                        <div class="cols">
                            <!-- Button trigger create modal -->
                            {{-- <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#createGuruModal">
                                Tambah Data
                            </button> --}}
                            {{-- search btn --}}
                            <div class="input-group mb-3">
                                <form class="forms-sample" method="POST" enctype="multipart/form-data" action="{{ route('jadwal.findKelas') }}">
                                    @csrf
                                    <div class="input-group">
                                        <select class="form-control" id="inputGroupSelect04"
                                            aria-label="Example select with button addon" name="kelas_id" required>
                                            <option selected disabled hidden value="">Pilih Kelas</option>
                                            <option value="all">Tampilkan Semua</option>
                                            @foreach ($dataKelas as $Kelas)
                                                <option value="{{ $Kelas->id }}">{{ $Kelas->nama }}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <button class="btn btn-primary cek" type="submit">Cari</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered table-hover" id="guru">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kelas</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Nama Guru</th>
                                    <th>Hari</th>
                                    <th>Jam</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataManual as $Manual)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $Manual->kelas->nama }}</td>
                                        <td>{{ $Manual->mapel->nama }}</td>
                                        <td>{{ $Manual->guru->nama }}</td>
                                        <td>{{ $Manual->slot->hari->hari }}</td>
                                        <td>{{ $Manual->slot->waktu->jam_mulai }}-{{ $Manual->slot->waktu->jam_selesai }}
                                        </td>
                                    </tr>
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
