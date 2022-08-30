@extends('frontend.mapel.index')

@section('form')
    {{-- form data guru --}}
    <div class="col-md-5 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Tambah Mata Pelajaran</h4>
                <div class="row justify-content-between mx-0">
                    <p class="card-description">
                        Basic form layout
                    </p>
                </div>
                <hr>
                <form class="forms-sample" method="POST" action="{{ route('mapel.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="namaMapel">Nama Mata Pelajaran</label>
                        <input type="text" class="form-control" id="namaMapel" placeholder="Nama Mata Pelajaran" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="kodeMapel">Kode Mata Pelajaran</label>
                        <input type="text" class="form-control" id="kodeMapel" placeholder="Kode Mata Pelajaran" name="kode">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </form>
            </div>
        </div>
    </div>
@endsection
