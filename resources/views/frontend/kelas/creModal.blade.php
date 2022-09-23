<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="createModalLabel">Tambah Data Kelas</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form class="forms-sample" method="POST" action="{{ route('kelas.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="namaKelas">Nama Kelas</label>
                <input type="text" class="form-control" id="namaKelas" placeholder="Nama Kelas" name="nama"
                    required>
            </div>
            <div class="form-group">
                <label for="tingkat">Tingkat</label>
                <select class="form-control" aria-label="Default select example" id="tingkat" name="tingkat_id" required>
                    <option selected disabled value="">Pilih Tingkat</option>
                    @foreach ($dataTingkat as $Tingkat)
                        <option value="{{ $Tingkat->id }}">{{ $Tingkat->tingkat }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <select class="form-control" aria-label="Default select example" id="jurusan" name="jurusan_id" required>
                    <option selected disabled value="">Pilih Jurusan</option>
                    @foreach ($dataJurusan as $Jurusan)
                        <option value="{{ $Jurusan->id }}">{{ $Jurusan->jurusan }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </form>
    </div>
</div>
