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
                <input type="text" class="form-control" id="namaKelas" placeholder="Nama Kelas" name="nama">
            </div>
            <div class="form-group">
                <label for="tingkat">Tingkat</label>
                <input type="number" class="form-control" id="tingkat" placeholder="Tingkat" name="tingkat" min="1" max="12">
            </div>
            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <input type="text" class="form-control" id="jurusan" placeholder="Jurusan" name="jurusan">
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </form>
    </div>
</div>
