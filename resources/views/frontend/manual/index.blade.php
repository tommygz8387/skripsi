@extends('layouts.app')

@section('title')
    Penjadwalan - Jadwal Manual
@endsection

@section('cus-css')
    <style>
        .swal2-popup {
            max-height: 500px !important;
            height: 400px !important;
        }
    </style>
@endsection

@section('content')
    <!-- Modal Tambah -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            @include('frontend.manual.creModal')
        </div>
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            @include('frontend.manual.editModal')
        </div>
    </div>
    <div class="modal fade" id="delModal" tabindex="-1" aria-labelledby="delModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            @include('frontend.manual.delModal')
        </div>
    </div>
    <div class="modal fade" id="resetModal" tabindex="-1" aria-labelledby="resetModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            @include('frontend.manual.resModal')
        </div>
    </div>
    <div class="modal fade" id="seedModal" tabindex="-1" aria-labelledby="seedModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            @include('frontend.manual.seedModal')
        </div>
    </div>
    <div class="row">
        {{-- tabel data mapel --}}
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">List Jadwal Ajar</h4>
                    <div class="row justify-content-between mx-0">
                        <div class="cols-6">
                            <p class="card-description">
                                Berisi daftar jadwal secara keseluruhan
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
                                        <a href="{{ route('manual.export') }}" class="dropdown-item">
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
                                    <th>Kelas</th>
                                    <th>Nama Guru</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Ruang</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                
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
                    url: "{{ route('jkhusus.getSlot') }}",
                    data: {awe : hari_id},
                    cache: false,

                    success: function (msg) {  
                        $('#Jam').html(msg);
                    },
                    error: function (data) {  
                        console.log('error:',data);
                    }
                });
            });
            $('#Guru').on('change',function(){
                let guru_id = $('#Guru').val();

                
                $.ajax({
                    type: 'POST',
                    url: "{{ route('manual.getAmpu') }}",
                    data: {ampu : guru_id},
                    cache: false,

                    success: function (msg) {  
                        $('#Mapel').html(msg);
                    },
                    error: function (data) {  
                        console.log('error:',data);
                    }
                });
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
                processing: true,
                responsive: true,
                serverSide: true,
                ajax: "{{ route('api.manual.index') }}",
                columns: [
                    // {"data": null, "sortable":false, render : function (data, type, row, meta) {
                    //     return meta.row + meta.settings._iDisplayStart + 1
                    // }}, 
                    {data: "id"},
                    {data: "slot.hari.hari"},
                    {data: "slot.waktu.jam_mulai"},
                    {data: "kelas.nama"},
                    {data: "ampu.guru.nama"},
                    {data: "ampu.mapel.nama"},
                    {data: "ruang.nama"},
                    {data: "aksi", name: "aksi"},
                ],
            });
        });
    </script>
    <script>
        function alertz(judul,isi,tipe) {  
            const test = Swal.mixin({
                timer: 3000,
            })
            test.fire(
                judul,
                isi,
                tipe
            );
        }
    </script>
    <script>
        $(document).on('click','.ubah',function () {
            let id = $(this).attr('id')
            // console.log(id);
            var testURL = "/pages/jadwal/manual/"+id;
            $('#form2').attr("action", "/pages/jadwal/manual/"+id)
            
            $.get(testURL, function (data) {
                $('#editModal').modal('show');
                $('#isiHari').val(data.data.slot.hari_id).text(data.data.slot.hari.hari);
                $('#isiJam').val(data.data.slot.waktu_id).text(data.data.slot.waktu.jam_mulai+'-'+data.data.slot.waktu.jam_selesai);
                $('#isiKelas').val(data.data.kelas_id).text(data.data.kelas.nama);
                $('#isiGuru').val(data.data.ampu.guru.id).text(data.data.ampu.guru.nama);
                $('#isiMapel').val(data.data.ampu.mapel.id).text(data.data.ampu.mapel.nama);
                $('#isiRuang').val(data.data.ruang_id).text(data.data.ruang.nama);
                // console.log(data.data.slot.hari.hari);

            })
        })
        $(document).on('click','.hapus',function () {
            let id = $(this).attr('id')
            var testURL = "/pages/jadwal/manual/del"+id;
            
            $.get(testURL, function (data) {
                $('#hapus2').attr("href", "/pages/jadwal/manual/delete/"+id)
                $('#delModal').modal('show');
            })
        })
    </script>
    {{-- <script>
        $(document).on('click','.ubah',function () {
            let id = $(this).attr('id')
            console.log(id);

            // var testURL = "{{ route('manual.edit') }}";
            // $.get(testURL, function (data) {
            //     $('#isiHari').text(data.id);
            // })

            // $.ajax({
            //     url : "/pages/jadwal/manual/"+id,
            //     type : "get",

            //     success : function (res){
            //         console.log(res)
            //     },
            //     error : function (xhr){
            //         console.log(xhr)
            //     },
            // })

            // $('#editModal').modal('show');
        })
    </script> --}}
    {{-- <script>
        $('#awe').on('click',function () {
            // console.log($('#Hari').val())
            $.ajax({
                url : "{{ route('manual.store') }}",
                type : "post",
                data : {
                    hari_id : $('#Hari').val(),
                    waktu_id : $('#Jam').val(),
                    kelas_id : $('#Kelas').val(),
                    guru_id : $('#Guru').val(),
                    mapel_id : $('#Mapel').val(),
                    ruang_id : $('#Ruang').val(),
                    "_token" : "{{ csrf_token() }}",
                },
                success : function (res){
                    alert(res.teks)
                    $('.close').click()
                    $('#tabel').DataTable().ajax.reload()
                    $('#Hari').val(null),
                    $('#Jam').val(null),
                    $('#Kelas').val(null),
                    $('#Guru').val(null),
                    $('#Mapel').val(null),
                    $('#Ruang').val(null),
                },
                error : function (xhr){
                    alert(xhr.teks)
                },
            })
        })
    </script> --}}
    <!-- Plugin js for this page -->
    {{-- <script src="{{ asset('/') }}vendors/chart.js/Chart.min.js"></script> --}}
    <script src="{{ asset('/') }}vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="{{ asset('/') }}vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    {{-- <script src="{{ asset('/') }}js/dataTables.select.min.js"></script>
    <script src="{{ asset('/') }}js/todolist.js"></script>
    <script src="{{ asset('/') }}js/Chart.roundedBarCharts.js"></script> --}}
    <!-- End plugin js for this page -->
@endsection