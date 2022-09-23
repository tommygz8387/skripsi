<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="delJurusanModalLabel"><strong>Hapus Data
                    Jurusan</strong></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                Apakah anda ingin menghapus data {{ $Jurusan->jurusan }}?
            </div>
        </div>
        <div class="modal-footer">
            <a href="{{ route('jurusan.delete', ['id' => $Jurusan->id]) }}" class="btn btn-primary mr-2">Submit</a>
            <button type="button" class="btn btn-secondary text-light" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
