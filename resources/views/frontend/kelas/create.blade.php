@extends('frontend.kelas.index')

@section('title')
    Master Data - Kelas
@endsection

@section('form')
    {{-- form data guru --}}
    <div class="col-md-5 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Tambah Kelas</h4>
                <div class="row justify-content-between mx-0">
                    <p class="card-description">
                        Basic form layout
                    </p>
                </div>
                <hr>
                <form class="forms-sample" method="POST" action="{{ route('kelas.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="namaKelas">Nama Kelas</label>
                        <input type="text" class="form-control" id="namaKelas" placeholder="Nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="kodeKelas">Kode Kelas</label>
                        <input type="text" class="form-control" id="kodeKelas" placeholder="Kode Kelas" name="kode">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </form>
            </div>
        </div>
    </div>
@endsection
