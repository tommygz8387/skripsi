@extends('frontend.jurusan.index')

@section('title')
    Master Data - Edit Jurusan
@endsection

@section('form')
    {{-- form data guru --}}
    <div class="col-md-5 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Edit Jurusan</h4>
                <div class="row justify-content-between mx-0">
                    <p class="card-description">
                        Basic form layout
                    </p>
                </div>
                <hr>
                <form class="forms-sample" method="POST" action="{{ route('jurusan.update',['id'=>$edit->id]) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="namaJurusan">Nama Jurusan</label>
                        <input type="text" class="form-control" id="namaJurusan" placeholder="Nama Jurusan" name="jurusan" value="{{ $edit->jurusan }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </form>
            </div>
        </div>
    </div>
@endsection
