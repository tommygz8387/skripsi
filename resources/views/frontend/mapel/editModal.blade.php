<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="editModalLabel"><strong>Edit Data Mata Pelajaran</strong></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form class="forms-sample" method="POST" action="{{ route('mapel.update', ['id' => $Mapel->id]) }}"
            enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="namaMapel">Nama Mata Pelajaran</label>
                <input type="text" class="form-control" id="namaMapel" placeholder="Nama Mata Pelajaran"
                    name="nama" value="{{ $Mapel->nama }}">
            </div>
            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <select class="chosen" aria-label="Default select example" id="jurusan" name="jurusan_id" required>
                    <option selected hidden value="{{ $Mapel->jurusan_id }}">{{ $Mapel->jurusan->jurusan }}</option>
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
