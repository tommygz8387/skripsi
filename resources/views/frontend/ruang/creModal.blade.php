<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="createModalLabel">Tambah Data Ruang</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form class="forms-sample" method="POST" action="{{ route('ruang.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="namaRuang">Nama Ruang</label>
                <input type="text" class="form-control" id="namaRuang" placeholder="Nama Ruang" name="nama"
                    required>
            </div>
            <div class="form-group">
                <label for="kodeRuang">Kode Ruang</label>
                <input type="text" class="form-control" id="kodeRuang" placeholder="Kode Ruang" name="kode"
                    required>
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </form>
    </div>
</div>
