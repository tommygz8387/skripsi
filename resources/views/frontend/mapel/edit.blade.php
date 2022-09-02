@extends('frontend.mapel.index')

@section('title')
    Master Data - Edit Mata Pelajaran
@endsection

@section('form')
    {{-- form data guru --}}
    <div class="col-md-5 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Edit Mata Pelajaran</h4>
                <div class="row justify-content-between mx-0">
                    <p class="card-description">
                        Basic form layout
                    </p>
                </div>
                <hr>
                <form class="forms-sample" method="POST" action="{{ route('mapel.update',['id'=>$edit->id]) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="namaMapel">Nama Mata Pelajaran</label>
                        <input type="text" class="form-control" id="namaMapel" placeholder="Nama Mata Pelajaran" name="nama" value="{{ $edit->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <input type="text" class="form-control" id="jurusan" placeholder="Jurusan" name="jurusan" value="{{ $edit->jurusan }}">
                    </div>
                    <div class="form-group">
                        <label for="ampu10">Jam Ampu Kelas 10</label>
                        <input type="number" class="form-control" id="ampu10" placeholder="Jam Ampu Pada Kelas 10" name="ampu1" value="{{ $edit->ampu1 }}">
                    </div>
                    <div class="form-group">
                        <label for="ampu11">Jam Ampu Kelas 11</label>
                        <input type="number" class="form-control" id="ampu11" placeholder="Jam Ampu Pada Kelas 11" name="ampu2" value="{{ $edit->ampu2 }}">
                    </div>
                    <div class="form-group">
                        <label for="ampu12">Jam Ampu Kelas 12</label>
                        <input type="number" class="form-control" id="ampu12" placeholder="Jam Ampu Pada Kelas 12" name="ampu3" value="{{ $edit->ampu3 }}">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </form>
            </div>
        </div>
    </div>
@endsection
