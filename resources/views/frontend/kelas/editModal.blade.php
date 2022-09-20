<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="editModalLabel"><strong>Edit Data Kelas</strong></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form class="forms-sample" method="POST" action="{{ route('kelas.update', ['id' => $Kelas->id]) }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="namaKelas">Nama Kelas</label>
                <input type="text" class="form-control" id="namaKelas" placeholder="Nama Kelas" name="nama" value="{{ $Kelas->nama }}" required>
            </div>
            <div class="form-group">
                <label for="tingkat">Tingkat</label>
                <input type="number" class="form-control" id="tingkat" placeholder="Tingkat" name="tingkat" min="1" max="12" value="{{ $Kelas->tingkat }}" required>
            </div>
            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <select class="form-control" aria-label="Default select example" id="jurusan" name="jurusan_id" required>
                    <option selected hidden value="{{ $Kelas->jurusan_id }}">{{ $Kelas->jurusan->jurusan }}</option>
                    @foreach ($dataJurusan as $jurusan)
                        <option value="{{ $jurusan->id }}">{{ $jurusan->jurusan }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </form>
    </div>
</div>
