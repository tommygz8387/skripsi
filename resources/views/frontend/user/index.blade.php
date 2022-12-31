@extends('layouts.app')
@section('title')
    Pengaturan
@endsection
@section('content')
    {{-- form data user --}}
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Profile User</h4>
                <div class="row justify-content-between mx-0">
                    <p class="card-description">
                        Isi password lama dan baru jika ingin mengganti password
                    </p>
                </div>
                <hr>
                <form class="forms-sample" method="POST" action="{{ route('user.update', ['id' => $user->id]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row m-auto">

                        <div class="col-6">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" placeholder="Nama" name="name"
                                    value="{{ $user->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Email" name="email"
                                    value="{{ $user->email }}" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="pass">Password</label>
                                <input type="password" class="form-control" id="pass" placeholder="Password"
                                    name="passBaru" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Upload Foto</label>
                                <input type="file" name="photo" class="file-upload-default" accept="image/*">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled
                                        placeholder="Upload Image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-3 mr-3 mb-3">
                        <button type="submit" class="btn btn-primary mr-2">Save</button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delModal">Hapus User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="delModal" tabindex="-1" aria-labelledby="delModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="delModalLabel"><strong>Hapus User</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        Apakah anda yakin ingin menghapus User {{ $user->name }}?
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('user.delete', ['id' => $user->id]) }}" class="btn btn-primary mr-2">Submit</a>
                    <button type="button" class="btn btn-secondary text-light" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('cus-script')
    <script src="{{ asset('/') }}js/file-upload.js"></script>
@endsection
