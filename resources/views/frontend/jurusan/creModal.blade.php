<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="createWaktuModalLabel">Tambah Data Jurusan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form class="forms-sample" method="POST" action="{{ route('jurusan.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="namaJurusan">Nama Jurusan</label>
                <input type="text" class="form-control" id="namaJurusan" placeholder="Nama Jurusan" name="jurusan" required>
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </form>
    </div>
</div>
