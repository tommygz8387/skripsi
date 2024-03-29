@extends('frontend.ruang.index')

@section('title')
    Data Opsi - Edit Ruang
@endsection

@section('form')
    {{-- form data guru --}}
    <div class="col-md-5 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Edit Ruang</h4>
                <div class="row justify-content-between mx-0">
                    <p class="card-description">
                        Basic form layout
                    </p>
                </div>
                <hr>
                <form class="forms-sample" method="POST" action="{{ route('ruang.update',['id'=>$edit->id]) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="namaRuang">Nama Ruang</label>
                        <input type="text" class="form-control" id="namaRuang" placeholder="Nama" name="nama" value="{{ $edit->nama }}" required>
                    </div>
                    <div class="form-group">
                        <label for="kodeRuang">Kode Ruang</label>
                        <input type="text" class="form-control" id="kodeRuang" placeholder="Kode Ruang" name="kode" value="{{ $edit->kode }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </form>
            </div>
        </div>
    </div>
@endsection
